<?php

namespace Person\Service;

use Zend\Paginator\Adapter\DbSelect;
use Person\Table\PersonsTable;
use Person\Entity\PersonsEntity;

class PersonsService {

	protected $pageSize = 6;

	protected $table;

	public function __construct(PersonsTable $table){
		$this->table = $table;
	}

	/**
	* @param int $pageSize
	* @return PersonsService
	*/
	public function setPageSize($pageSize){
		$this->pageSize = (int) $pageSize;
		return $this;
	}

	/**
	* Get value for page size
	* @return int
	*/
	public function getPageSize(){
		return $this->pageSize;
	}

	public function fetchPersons($page = 1){
		$paginator = $this->table->fetchAll();
		return $paginator;
	}

	public function fetchAll(){
		return $this->table->fetchAll();
	}

	public function getPerson($person_id){
		return $this->table->getPerson($person_id);
	}

	public function savePerson(PersonsEntity $persons){
		$this->table->savePerson($persons);
	}

	public function deletePerson($person_id){
		$this->table->deletePerson($person_id);
	}
}
