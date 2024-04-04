<?php

namespace App\Controller;

use App\Form\Type\IndexType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index()
    {
        $lang = $this->getParameter('lang');
        $form = $this->createForm(IndexType::class, null, [
            'lang' => $lang
        ]);
        return $this->render('base.html.twig', [
            'form' => $form
        ]);
    }
}
