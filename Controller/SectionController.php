<?php

namespace Kaymorey\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Kaymorey\PortfolioBackBundle\Controller\WebController;


class SectionController extends WebController
{
	/**
     * @Route("/", name="portfolio_accueil")
     */
    public function indexAction()
    {
    	$proWorks = $this->getWorksByCategory("pro");
        return $this->render('KaymoreyPortfolioBundle::index.html.twig');
    }
}
