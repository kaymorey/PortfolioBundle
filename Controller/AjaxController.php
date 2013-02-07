<?php

namespace Kaymorey\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Kaymorey\PortfolioBackBundle\Controller\WebController;


class AjaxController extends WebController
{
    /**
     * @Route("/ajax/projets/category/{id}", name="portfolio_load_works_category", defaults={"id" = null}, options={"expose"=true})
     */
    public function loadProjectsAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $works = $em->getRepository('KaymoreyPortfolioBackBundle:Work')
            ->getWorksByCategory($id);
        
        return $this->render('KaymoreyPortfolioBundle:List:projets.html.twig', array(
            "projets" => $works
        ));
    }
}
