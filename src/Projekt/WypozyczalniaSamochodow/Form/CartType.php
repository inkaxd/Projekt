<?php

namespace Projekt\WypozyczalniaSamochodow\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CartType extends AbstractType{

 public function getName() {
       return 'cart';
   }

   public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
		//coś tutaj trzeba pokombinować
                ->add('sessionID', 'hidden', array(
                    'label' => 'sessionID'
                ));
    }


	public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Projekt\WypozyczalniaSamochodow\Entity\Cart'
        ));
	}
}