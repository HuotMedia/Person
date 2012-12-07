<?php

namespace Person\Factory;

use Person\Table\PersonsTable;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PersonsTableFactory implements FactoryInterface {
	
	public function createService(ServiceLocatorInterface $services) {
		$adapter	= $services->get('Zend\Db\Adapter\Adapter');
		$tableName 	= 'persons';
		$table		= new PersonsTable($adapter, $tableName);
		return $table;
	}
}
