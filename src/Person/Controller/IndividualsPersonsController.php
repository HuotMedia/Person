<?php

/**
 * IndividualsPersonsController
 * 
 * @author
 * @version 
 */

namespace Person\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Person\Entity\IndividualsPersonsEntity;
use Person\Form\IndividualsPersonsForm;

class IndividualsPersonsController extends AbstractActionController {
	
	protected $service;
	
	public function indexAction(){
		$request = $this->getRequest();
		$page    = $request->getQuery()->get('page', 1);
		return array(
			'individuals' => $this->service->fetchIndividualsPersons($page)
		);
	}
	
	public function addAction() {
		$individuals = new IndividualsPersonsEntity();
		$form = IndividualsPersonsForm::factory($individuals);
		$request = $this->getRequest();
		if ($request->isPost()) {
			\Zend\Debug\Debug::dump($this->getRequest()->getPost());exit;
			$data = $request->getPost();
			$form->setData($data);
			if ($form->isValid()) {
				$this->service->savePerson($individuals);
				return $this->redirect()->toRoute('individuals');
			}
		}
		return new ViewModel(array(
			'form' => $form
		));
	}

	
	public function editAction() {
		$person_id = (int) $this->params()->fromRoute('id', 0);
        if (!$person_id) {
            return $this->redirect()->toRoute('individuals', array(
                'action' => 'add'
            ));
        }
        $person = $this->service->getPerson($person_id);
        $individuals = new IndividualsPersonsEntity();
		$form = IndividualsPersonsForm::factory($individuals);
		$form->bind($person);
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
            	$this->service->savePerson($form->getData());
                return $this->redirect()->toRoute('individuals');
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
			return $this->redirect()->toRoute('individuals');
		}
		$request = $this->getRequest();
		if ($request->isPost()) {
			$del = $request->getPost('del', 'No');
			if ($del == 'Yes') {
				$person_id = (int) $request->getPost('id');
				$this->service->deletePerson($person_id);
			}
			return $this->redirect()->toRoute('individuals');
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
	 * @param \Person\Service\IndividualsPersonsService $service
	 */
	public function setService($service){
		$this->service = $service;
	}
}
