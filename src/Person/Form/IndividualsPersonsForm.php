<?php

namespace Person\Form;

use Zend\Form\Annotation\AnnotationBuilder;
use Zend\Form\Element\Select;
use Person\Entity\IndividualsPersonsEntity;

class IndividualsPersonsForm {

	public static function factory(IndividualsPersonsEntity $individuals_persons) {
		if (null === $individuals_persons) {
			$individuals_persons = __NAMESPACE__ . '..\Entity\IndividualsPersonsEntity';
		}
		$builder = new AnnotationBuilder();
		$form = $builder->createForm($individuals_persons);
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
		if ($individuals_persons instanceof IndividualsPersonsEntity) {
			$form->bind($individuals_persons);
		}
		return $form;
	} 
}
