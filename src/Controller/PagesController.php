<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use DateTimeZone;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\CalendarService;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(CalendarService $calendar): Response
    {
       
        //$isNewYear = $currentTime->format('d') == '01' and $currentTime->format('m') == '01';
        //$CalendarService = new CalendarService();

        return $this->render('pages/home.html.twig', [
            'isNewYear' =>$calendar->isNewYear(),
            'daysLeftUntilNextYear' => $calendar->daysLeftUntilNextYear()

                    ]);
    }

    #[Route('/about', name: 'app_about')]
    public function about()
    {
    	return $this->render('pages/about.html.twig');
    }
}
