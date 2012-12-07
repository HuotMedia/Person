<?php

namespace Person\Form;

use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Form\Element\Select;
use Person\Entity\PersonsEntity;

class PersonsForm {

	public static function factory(PersonsEntity $persons) {
		
		if (null === $persons) {
			$persons = __NAMESPACE__ . '..\Entity\PersonsEntity';
		}

		$builder = new AnnotationBuilder();
		$form = $builder->createForm($persons);
		
		$form->add(
			array(
				'name' 		=> 'persons_fieldset',
				'attributes'=> array(
					'type' => 'Zend\Form\Fieldset',
				),
				'options'	=> array(
					'label'		=> 'Dados Pessoais',
				)
			)	
		);
		
		$form->add(
			array(
				'name' 		=> 'submit',
				'attributes'=> array(
					'type' 	=> 'submit',
					'value'	=> 'Salvar',
					'class' => 'btn btn-primary',	
				)				
			)
		);
// 		$form->add(
// 			array(
// 				'name' 		=> 'cancel',
// 				'attributes'=> array(
// 					'type' 	=> 'button',
// 					'value'	=> 'Cancelar',
// 					'class' => 'btn',
// 					'onclick' => "javascript: window.location.href = '/localization/countries'",	
// 				)
// 			)
// 		);
		$form->get('person_address_postal_code')->setAttribute('onblur', 'javascript: fetchAddressByCep(this.value);');
		if ($persons instanceof PersonsEntity) {
			$form->bind($persons);
		}
		
		return $form;
	} 
}
