<?php

namespace Kaymorey\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Contact extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => ' ',
                'attr' => array('placeholder' => 'Nom')
            ))
            ->add('mail', 'email', array(
                'label' => ' ',
                'attr' => array('placeholder' => 'Email')
            ))
            ->add('subject', 'text', array(
                'label' => ' ',
                'attr' => array('placeholder' => 'Objet')
            ))
            ->add('message', 'textarea', array(
                'label' => ' ',
                'attr' => array(
                    'placeholder' => 'Message',
                    'rows' => "5",
                    'cols' => '30'
                )
            ))
        ;
    }

    public function getName()
    {
        return 'kaymorey_portfoliobundle_contact';
    }
}