<?php  

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MkmApi;


class CardmarketController extends AbstractController
{
    /**
     * @Route("/mkm", name="app_cardmarket")
     */
    public function Cardmarket(MkmApi $api)
    {  
        dd($api->get("https://sandbox.cardmarket.com/ws/v2.0/account"));

        return $this->render('tools/cardmarket.html.twig', [

        ]);
    }
}
