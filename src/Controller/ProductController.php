<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use App\Entity\Product;
use App\Form\Product1Type;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;

class ProductController extends AbstractController
{

    #[Route('/product', name: 'product_index', methods: ['GET'])]
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    #[Route('/product/new', name: 'product_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, LoggerInterface $logger): Response
    {
        $product = new Product();
        $form = $this->createForm(Product1Type::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['imageFilename']->getData();
            $logger->info("1- FILE = $uploadedFile");
            if ($uploadedFile != null) {
                $destination = $this->getParameter('kernel.project_dir') . '/public/uploads/menuImages';
                $logger->info("2- dir = $destination");
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $logger->info("3- dir = $originalFilename");
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                $logger->info("4- $newFilename");
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $logger->info("5 - $uploadedFile");
                $product->setImageFilename("uploads/menuImages/" . $newFilename);
            }

            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product/new.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/product/{id}/edit', name: 'product_edit', methods: ['GET', 'POST'])]
    public function edit(LoggerInterface $logger, Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {

        $form = $this->createForm(Product1Type::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $uploadedFile = $form['imageFilename']->getData();
            $logger->info("1- FILE = $uploadedFile");
            if ($uploadedFile != null) {
                $destination = $this->getParameter('kernel.project_dir') . '/public/uploads/menuImages';
                $logger->info("2- dir = $destination");
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $logger->info("3- dir = $originalFilename");
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                $logger->info("4- $newFilename");
                $uploadedFile->move(
                    $destination,
                    $newFilename
                );
                $logger->info("5 - $uploadedFile");

                $product->setImageFilename("uploads/menuImages/" . $newFilename);
            }

            $entityManager->flush();
            return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('product/edit.html.twig', [
            'product' => $product,
            'form' => $form,
        ]);
    }

    #[Route('/product/{id}', name: 'product_delete', methods: ['POST'])]
    public function delete(Request $request, Product $product, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/product/{id}', name: 'product.detail')]
    public function detailindex(Product $product): Response
    {
        return $this->render('product/detail.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/checkout', name: 'checkout')]
    public function checkout(): Response
    {
        $template = 'product/checkout.html.twig';
        $argsArray = [];

        return $this->render($template, $argsArray);
    }


}
