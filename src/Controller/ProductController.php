<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: 'product.detail')]
    public function index(Product $product): Response
    {
        return $this->render('product/detail.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product', name: 'menu')]
    public function aboutus(ProductRepository $productRepository): Response
    {
        $template = 'product/product.html.twig';
        $argsArray = ['products' => $productRepository->findAll()];

        return $this->render($template, $argsArray);
    }
}
