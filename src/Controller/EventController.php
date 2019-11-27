<?php  

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

class EventController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function Calculator()
    {
        $fb_Url = $this->getParameter('fb link');
        $eventNumber = $this->getParameter('event number');

        $img_Url = 'images/event'. $eventNumber. '.png';

        return $this->render('tools/eventcalculator.html.twig', [
            'fb_url' => $fb_Url,
            'image_url' => $img_Url,
        ]);
    }
}
