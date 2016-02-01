<?php

namespace Projekt\WypozyczalniaSamochodow\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfType extends AbstractType{

 public function getName() {
       return 'configuration';
   }

   public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder		
                ->add('data1', 'text', array(
				'mapped' => false,
				'label' => 'Termin odbioru',))
		
				->add('data2', 'text', array(
				'mapped' => false,
				'label' => 'Termin zwrotu',))
						
				->add('param3', 'choice', array(                   
					'label' => 'Czy chcesz wybrać dodatkowe ubezpieczenie w cenie 50zł?',
					'choices'  => array(		
						'TAK' =>  'TAK',
						'NIE' =>  'NIE',
						)))
				
				->add('param4', 'choice', array(                   
					'label' => 'Odbiór samochodu z innego miejsca niż nasza filia*',
					'choices'  => array(		
						'TAK' =>  'TAK',
						'NIE' =>  'NIE',
						)))
						
				->add('param5', 'choice', array(                   
					'label' => 'Ilu kierowców będzie jeździło autem?*',
					'choices'  => array(		
						'1' =>  '1',
						'2' =>  '2',
						'3' =>  '3',
						'4' =>  '4',
						)))
						
						;
    }


	public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Projekt\WypozyczalniaSamochodow\Entity\Cart'
        ));
	}
}