<?php

namespace Person\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;
use Person\Service\IndividualsPersonsService;

class IndividualsPersonsServiceFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $services) {
		$config			= $services->get('config');
		$individuals_persons_table 	= $services->get('individuals-persons-table');
		$service 		= new IndividualsPersonsService($individuals_persons_table);
        return $service;
	}
}
