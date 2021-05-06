<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use DateTimeZone;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        $currentTime = new \DateTimeImmutable('now', new DateTimeZone('America/Montreal'));

        //$isNewYear = $currentTime->format('d') == '01' and $currentTime->format('m') == '01';
        $isNewYear = $currentTime->format('z') == '0';

        return $this->render('pages/home.html.twig', compact('isNewYear'));
    }

    #[Route('/about', name: 'app_about')]
    public function about()
    {
    	return $this->render('pages/about.html.twig');
    }
}
