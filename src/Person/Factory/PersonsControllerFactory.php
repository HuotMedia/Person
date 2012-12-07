<?php

namespace Person\Factory;

use Person\Controller\PersonsController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PersonsControllerFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $controllers) {
		$services 			= $controllers->getServiceLocator();
		$persons_service 	= $services->get('persons-service');
		$controller 		= new PersonsController();
		$controller->setService($persons_service);
		return $controller;
	}
}
