<?php

namespace Person\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Person\Service\PersonsService;

class PersonsServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $services) {
		$config			= $services->get('config');
		$persons_table 	= $services->get('persons-table');
		$service 		= new PersonsService($persons_table);
        return $service;
	}
}
