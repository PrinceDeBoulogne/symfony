<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index()
    {
        return $this->render('cart/index.html.twig', [
            'controller_name' => 'CartController',
        ]);
    }

    /**
     * @Route("/test/cart/{id}", name="addToCart")
     * @IsGranted("ROLE_USER")
     */
    public function cartTest(Produit $produit, EntityManagerInterface $em)
    {
        /** @var User $user */
        $user = $this->getUser();
        if (!$user->getCart())
        {
            $cart = new Cart();
            $user->setCart($cart);
        }
        /** @var Cart $cart */
        $cart = $user->getCart();
        $cart->addProduit($produit);
        $em->persist($cart);
        $em->flush();
        dd($cart);
    }

}
