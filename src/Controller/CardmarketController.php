<?php  

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CardmarketController extends AbstractController
{
    /**
     * @Route("/mkm", name="app_cardmarket")
     */
    public function Cardmarket()
    {
        return $this->render('tools/cardmarket.html.twig', [

        ]);
    }
}
