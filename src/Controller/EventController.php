<?php  

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function Calculator()
    {
        return $this->render('tools/eventcalculator.html.twig', [

        ]);
    }
}
