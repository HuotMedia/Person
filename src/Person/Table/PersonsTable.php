<?php

namespace Person\Table;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializableHydrator;
use Person\Entity\PersonsEntity;

class PersonsTable extends AbstractTableGateway {

	protected $table		= 'persons';
	protected $tableName	= 'persons';

	public function __construct(Adapter $adapter, $tableName = 'persons')
	{
		$this->adapter 				= $adapter;
		$this->table				= $this->tableName = $tableName;
		$this->resultSetPrototype 	= new HydratingResultSet(
			new ArraySerializableHydrator(),
			new PersonsEntity()
		);
		$this->resultSetPrototype->buffer();
		$this->initialize();
	}

	public function fetchAll(){
		$select = $this->getSql()->select();
		return new Paginator(
			new DbSelect(
				$select,
				$this->adapter,
				$this->resultSetPrototype	
			)
		);		
	}

	public function getPerson($person_id){
		if (0 !== $person_id) {
			$rowset = $this->select(
				array('person_id' => (int) $person_id)
			);
			$person = $rowset->current();
			if (!$person) {
				throw new \Exception("Could not find row $person_id");
			}
			return $person;
		}
		return null;
	}

	public function savePerson(PersonsEntity $person){
		$data 		= $person->getArrayCopy();
		$person_id 	= (int) $data['person_id'];
		$editing 	= $this->getPerson($person_id);
		if (null === $editing) {
			unset($data['person_id']);
			$this->insert($data);
		} else {
			$this->update($data, array('person_id' => $person_id));
		}
	}

	public function deletePerson($person_id){
		$this->delete(array('person_id' => $person_id));
	}
}
