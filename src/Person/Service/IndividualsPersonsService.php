<?php

namespace Person\Service;

use Zend\Paginator\Adapter\DbSelect;
use Person\Table\IndividualsPersonsTable;
use Person\Entity\IndividualsPersonsEntity;

class IndividualsPersonsService {

	protected $pageSize = 6;

	protected $table;

	public function __construct(IndividualsPersonsTable $table){
		$this->table = $table;
	}

	/**
	* @param int $pageSize
	* @return IndividualsPersonsService
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

	public function fetchIndividualsPersons($page = 1){
		$paginator = $this->table->fetchAll();
		return $paginator;
	}

	public function fetchAll(){
		return $this->table->fetchAll();
	}

	public function getIndividualPerson($person_id){
		return $this->table->getIndividualPerson($person_id);
	}

	public function saveIndividualPerson(IndividualsPersonsEntity $individuals_persons){
		$this->table->saveIndividualPerson($individuals_persons);
	}

	public function deleteIndividualPerson($person_id){
		$this->table->deleteIndividualPerson($person_id);
	}
}
