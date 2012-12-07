<?php

namespace Person\Factory;

use Person\Controller\IndividualsPersonsController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndividualsPersonsControllerFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $controllers) {
		$services 						= $controllers->getServiceLocator();
		$individuals_persons_service 	= $services->get('individuals-persons-service');
		$controller 					= new IndividualsPersonsController();
		$controller->setService($individuals_persons_service);
		return $controller;
	}
}
