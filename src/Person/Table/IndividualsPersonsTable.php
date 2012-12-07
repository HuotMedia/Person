<?php

namespace Person\Table;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator\ArraySerializable as ArraySerializableHydrator;
use Person\Entity\IndividualsPersonsEntity;

class IndividualsPersonsTable extends AbstractTableGateway {

	protected $table		= 'individuals_persons';
	protected $tableName	= 'individuals_persons';

	public function __construct(Adapter $adapter, $tableName = 'individuals_persons')
	{
		$this->adapter 				= $adapter;
		$this->table				= $this->tableName = $tableName;
		$this->resultSetPrototype 	= new HydratingResultSet(
			new ArraySerializableHydrator(),
			new IndividualsPersonsEntity()
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

	public function getIndividualPerson($person_id){
		if (0 !== $person_id) {
			$rowset = $this->select(
				array('person_id' => (int) $person_id)
			);
			$individual_person = $rowset->current();
			if (!$individual_person) {
				throw new \Exception("Could not find row $person_id");
			}
			return $individual_person;
		}
		return null;
	}

	public function saveIndividualPerson(IndividualsPersonsEntity $individual_person){
		$data 					= $person->getArrayCopy();
		$individual_person_id 	= (int) $data['individual_person_id'];
		$editing 				= $this->getIndividualPerson($individual_person);
		if (null === $editing) {
			unset($data['individual_person_id']);
			$this->insert($data);
		} else {
			$this->update($data, array('individual_person_id' => $person_id));
		}
	}

	public function deleteIndividualPerson($individual_person_id){
		$this->delete(array('individual_person_id' => $individual_person_id));
	}
}
