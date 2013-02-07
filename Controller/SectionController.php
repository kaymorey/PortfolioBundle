<?php

namespace Kaymorey\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Kaymorey\PortfolioBundle\Form\Contact;

use Kaymorey\PortfolioBackBundle\Controller\WebController;


class SectionController extends WebController
{
    /**
     * @Route("/", name="portfolio_accueil")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $category = $em->getRepository('KaymoreyPortfolioBackBundle:Category')
            ->findOneByTitle("Pro")->getId();

        $works = $em->getRepository('KaymoreyPortfolioBackBundle:Work')
            ->getWorksByCategory($category);

        $categories = $em->getRepository('KaymoreyPortfolioBackBundle:Category')
            ->findAll();

        $form = $this->createForm(new Contact);

        return $this->render('KaymoreyPortfolioBundle::index.html.twig', array(
            "projets" => $works,
            "categories" => $categories,
            "form" => $form->createView()
        ));
    }

    /**
     * @Route("/contact", name="portfolio_contact")
     */
    public function contactAction()
    {
        $form = $this->createForm(new Contact);
        $request = $this->get('request');
        $form->bind($request);

        if($form->isValid()) {
            $data = $request->request->get('kaymorey_portfoliobundle_contact');
            $name = $data['name'];
            $mail = $data['mail'];
            $subject = $data['subject'];
            $content = $data['message'];
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($mail)
                ->setTo('kmorei77@gmail.com')
                ->setBody($content)
            ;
            $this->get('mailer')->send($message);
        }

        return $this->redirect($this->generateUrl('portfolio_accueil'));
    }
}
