<?php

namespace App\Service;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploaderHelper
{
    public function __construct(string $uploadsPath)
    {
        $this->uploadsPath = $uploadsPath;
    }

    public function uploadArticleImage(UploadedFile $uploadedFile): string
    {
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads/article_image';
        $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $newFilename
        );
        return $newFilename;
    }
}