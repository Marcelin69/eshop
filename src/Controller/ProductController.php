<?php

namespace App\Controller;

use Cocur\Slugify\Slugify;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(
        ProductRepository $procduct
    ): Response
    {
        $slug = new Slugify();

        return $this->render('product/index.html.twig', [
            'products' => $procduct -> findBy(
                ["isPublished"=> true],
                ['name'=> 'ASC']
            ),
            'slug'=> $slug->slugify('Generate a slug')

        ]);
    }

    #[Route('/{id}', name: 'products_show')]
    public function show(
        ProductRepository $procduct,
        HttpFoundationRequest $request
    ): Response
    {
        $id = $request->get('id');
        return $this->render('product/show.html.twig', [
            'product' => $procduct -> find(
               ['id'=>$id]
            ),
        ]);
    }
}
