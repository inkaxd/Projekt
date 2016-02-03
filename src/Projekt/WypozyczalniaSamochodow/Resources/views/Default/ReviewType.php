<?php

namespace Projekt\WypozyczalniaSamochodow\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

}

class ReviewType extends AbstractType{

 public function getName() {
       return 'review';
   }

	public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
				//->add('contact','text',array('mapped'=>false))
                ->add('title', 'text', array(
                    'label' => 'Tytuł'
                ))				
				->add('description', 'textarea', array(
                    'label' => 'Recenzja'
        //        ))
       //         ->add('save', 'submit', array(
         //           'label' => 'Zapisz recencję'
                ));
    }
	
	  public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Projekt\WypozyczalniaSamochodow\Entity\Review'
        ));

}
