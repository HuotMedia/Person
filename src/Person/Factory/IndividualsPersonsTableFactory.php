<?php

namespace Person\Factory;

use Person\Table\IndividualsPersonsTable;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndividualsPersonsTableFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $services) {
		$adapter	= $services->get('Zend\Db\Adapter\Adapter');
		$tableName 	= 'individuals_persons';
		$table		= new IndividualsPersonsTable($adapter, $tableName);
		return $table;
	}
}
