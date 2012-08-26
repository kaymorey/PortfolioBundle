<?php

namespace Kaymorey\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
	/**
     * @Route("/{name}", name="portfolio_accueil", defaults={"name"=null})
     */
    public function indexAction($name)
    {
        return $this->render('KaymoreyPortfolioBundle::index.html.twig', array('name' => $name));
    }
}
