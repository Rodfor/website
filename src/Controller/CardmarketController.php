<?php  

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MkmArticle;


class CardmarketController extends AbstractController
{
    /**
     * @Route("/mkm", name="app_cardmarket")
     */
    public function Cardmarket(MkmArticle $mkmArticle)
    {  
        dd($mkmArticle->getProduct("360177"));

        return $this->render('tools/cardmarket.html.twig', [

        ]);
    }
}
