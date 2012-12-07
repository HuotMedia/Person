<?php

/**
 * PersonsController
 * 
 * @author
 * @version 
 */

namespace Person\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Person\Entity\PersonsEntity;
use Person\Form\PersonsForm;

class PersonsController extends AbstractActionController {
	
	protected $service;
	
	public function indexAction(){
		$request = $this->getRequest();
		$page    = $request->getQuery()->get('page', 1);
		return array(
			'persons' => $this->service->fetchPersons($page)
		);
	}
	
	public function addAction() {
		$form = PersonsForm::factory(new PersonsEntity());
		$request = $this->getRequest();
		if ($request->isPost()) {
			\Zend\Debug\Debug::dump($this->getRequest()->getPost());exit;
			$data = $request->getPost();
			$form->setData($data);
			if ($form->isValid()) {
				$this->service->savePerson($persons);
				return $this->redirect()->toRoute('person/persons');
			}
		}
		return new ViewModel(array(
			'form' => $form
		));
	}

	
	public function editAction() {
		$person_id = (int) $this->params()->fromRoute('id', 0);
        if (!$person_id) {
            return $this->redirect()->toRoute('person/persons', array(
                'action' => 'add'
            ));
        }
        $person = $this->service->getPerson($person_id);
        $persons = new PersonsEntity();
		$form = PersonsForm::factory($persons);
		$form->bind($person);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
            	$this->service->savePerson($form->getData());
                return $this->redirect()->toRoute('person/persons');
            }
        }
        return array(
            'person_id' => $person_id,
            'form' => $form,
        );
	}
	
	
	public function deleteAction() {
		$person_id = (int) $this->params()->fromRoute('id', 0);
		if (!$person_id) {
			return $this->redirect()->toRoute('person/persons');
		}
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
			if ($del == 'Yes') {
				$person_id = (int) $request->getPost('id');
				$this->service->deletePerson($person_id);
			}
			return $this->redirect()->toRoute('person/persons');
		}
		return array(
			'person_id'	=> $person_id,
			'person' 	=> $this->service->getPerson($person_id),
		);
	}
	
	/**
	 * @return the $service
	 */
	public function getService(){
		return $this->service;
	}

	/**
	 * @param \Person\Service\PersonsService $service
	 */
	public function setService($service){
		$this->service = $service;
	}
}
