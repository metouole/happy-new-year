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
        $today = new \DateTimeImmutable('now', new DateTimeZone('America/Montreal'));

        //$isNewYear = $currentTime->format('d') == '01' and $currentTime->format('m') == '01';
        $isNewYear = $today->format('z') == '0';

        $nextJanuaryFirst = new \DateTimeImmutable('1st January Next Year', new DateTimeZone('America/Montreal'));

        $daysLeftUntilNextYear = $nextJanuaryFirst->diff($today)->days;

        return $this->render('pages/home.html.twig', compact('isNewYear', 'daysLeftUntilNextYear'));
    }

    #[Route('/about', name: 'app_about')]
    public function about()
    {
    	return $this->render('pages/about.html.twig');
    }
}
