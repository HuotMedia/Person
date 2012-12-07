<?php

namespace Person\Entity;

use Zend\Form\Annotation;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * @Annotation\Name("individual_individual_person_form")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ArraySerializable")
 */
class IndividualsPersonsEntity implements ArraySerializableInterface
{
	
    /**
     * @Annotation\Name("individual_person_id")
     * @Annotation\Required(false)
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $individualPersonId;
    
    /**
     * @Annotation\Name("individual_person_cpf")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(true)
     * @Annotation\Attributes({"placeholder":"CPF","class":"span2 cpf"})
     */
    protected $individualPersonCpf;

    /**
     * @Annotation\Name("individual_person_rg")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"RG","class":"span2"})
     */
    protected $individualPersonRg;

    /**
     * @Annotation\Name("individual_person_rg_expedition_date")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Date")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Data de Expedição","class":"span2"})
     */
    protected $individualPersonRgExpeditionDate;
    
    /**
     * @Annotation\Name("individual_person_rg_expeditor_organ")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Required(false)
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"placeholder":"Órg. Ex.", "class":"span1"})
     */
    protected $individualPersonRgExpeditorOrgan;
    
    /**
     * @Annotation\Name("individual_person_rg_uf")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"UF", "class":"span1"})
     */
    protected $individualPersonRgUf;

    /**
     * @Annotation\Name("individual_person_day")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Dia", "class":"span1"})
     */
    protected $individualPersonDay;
    
    /**
     * @Annotation\Name("individual_person_month")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Mês", "class":"span1"})
     */
    protected $individualPersonMonth;
    
    /**
     * @Annotation\Name("individual_person_year")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Ano","class":"span1"})
     */
    protected $individualPersonYear;

    /**
     * @Annotation\Name("individual_person_gender")
     * @Annotation\Filter({"name":"Boolean"})
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Required(false)
     * @Annotation\Options({"empty_option":"Sexo", "value_options":{0:"Feminino", 1:"Masculino"}})
     */
    protected $individualPersonGender;
    
    /**
     * @Annotation\Name("individual_person_father")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Nome do Pai", "class":"span5"})
     */
    protected $individualPersonFather;

    /**
     * @Annotation\Name("individual_person_mother")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Nome da Mãe", "class":"span5"})
     */
    protected $individualPersonMother;
    
    /**
     * @Annotation\Name("individual_person_birth_place")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Naturalidade", "class":"span4"})
     */
    protected $individualPersonBirthPlace;
    
    /**
     * @Annotation\Name("individual_person_birth_uf")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"UF", "class":"span1"})
     */
    protected $individualPersonBirthUf;

    /**
     * @Annotation\Name("individual_person_nationality")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Nacionalidade", "class":"span3"})
     */
    protected $individualPersonNationality;
    
    /**
     * @Annotation\Name("person_id")
     * @Annotation\Required(false)
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $personId;

    public function exchangeArray(array $array)
    {
    	foreach ($array as $key => $value) {
    		switch (strtolower($key)) {
    			case 'individual_person_id':
    				$this->setIndividualPersonId($value);
    				continue;
    			case 'individual_person_cpf':
    				$this->setIndividualPersonCpf($value);
    				continue;
    			case 'individual_person_rg':
    				$this->setIndividualPersonRg($value);
    				continue;
    			case 'individual_person_rg_expedition_date':
    				$this->setIndividualPersonRgExpeditionDate($value);
    				continue;
    			case 'individual_person_rg_expeditor_organ':
    				$this->setIndividualPersonRgExpeditorOrgan($value);
    				continue;
    			case 'individual_person_rg_uf':
    				$this->setIndividualPersonRgUf($value);
    				continue;
    			case 'individual_person_day':
    				$this->setIndividualPersonDay($value);
    				continue;
    			case 'individual_person_month':
    				$this->setIndividualPersonMonth($value);
    				continue;
    			case 'individual_person_year':
    				$this->setIndividualPersonYear($value);
    				continue;
    			case 'individual_person_gender':
    				$this->setIndividualPersonGender($value);
    				continue;
    			case 'individual_person_father':
    				$this->setIndividualPersonFather($value);
    				continue;
    			case 'individual_person_mother':
    				$this->setIndividualPersonMother($value);
    				continue;
    			case 'individual_person_birth_place':
    				$this->setIndividualPersonBirthPlace($value);
    				continue;
    			case 'individual_person_birth_uf':
    				$this->setIndividualPersonBirthUf($value);
    				continue;
    			case 'individual_person_nationality':
    				$this->setIndividualPersonNationality($value);
    				continue;
    			case 'person_id':
    				$this->setPersonId($value);
    				continue;
    			default:
    				break;
    		}
    	}
    }
    
    public function getArrayCopy()
    {
    	return array(
    		'individual_person_id'					=> $this->getIndividualPersonId(),
    		'individual_person_cpf'					=> $this->getIndividualPersonCpf(),
    		'individual_person_rg'					=> $this->getIndividualPersonRg(),	
    		'individual_person_rg_expedition_date'	=> $this->getIndividualPersonRgExpeditionDate(),	
    		'individual_person_rg_expeditor_organ'	=> $this->getIndividualPersonRgExpeditorOrgan(),	
    		'individual_person_rg_uf'				=> $this->getIndividualPersonRgUf(),	
    		'individual_person_day'					=> $this->getIndividualPersonDay(),	
    		'individual_person_month'				=> $this->getIndividualPersonMonth(),	
    		'individual_person_year'				=> $this->getIndividualPersonYear(),	
    		'individual_person_gender'				=> $this->getIndividualPersonGender(),	
    		'individual_person_father'				=> $this->getIndividualPersonFather(),	
    		'individual_person_mother'				=> $this->getIndividualPersonMother(),	
    		'individual_person_birth_place'			=> $this->getIndividualPersonBirthPlace(),	
    		'individual_person_birth_uf'			=> $this->getIndividualPersonBirthUf(),	
    		'individual_person_nationality'			=> $this->getIndividualPersonNationality(),	
    	);
    }
    
	/**
	 * @return the $individualPersonId
	 */
	public function getIndividualPersonId(){
		return $this->individualPersonId;
	}

	/**
	 * @param field_type $individualPersonId
	 */
	public function setIndividualPersonId($individualPersonId){
		$this->individualPersonId = $individualPersonId;
	}

	/**
	 * @return the $individualPersonCpf
	 */
	public function getIndividualPersonCpf(){
		return $this->individualPersonCpf;
	}

	/**
	 * @param field_type $individualPersonCpf
	 */
	public function setIndividualPersonCpf($individualPersonCpf){
		$this->individualPersonCpf = $individualPersonCpf;
	}

	/**
	 * @return the $individualPersonRg
	 */
	public function getIndividualPersonRg(){
		return $this->individualPersonRg;
	}

	/**
	 * @param field_type $individualPersonRg
	 */
	public function setIndividualPersonRg($individualPersonRg){
		$this->individualPersonRg = $individualPersonRg;
	}

	/**
	 * @return the $individualPersonRgExpeditionDate
	 */
	public function getIndividualPersonRgExpeditionDate(){
		return $this->individualPersonRgExpeditionDate;
	}

	/**
	 * @param field_type $individualPersonRgExpeditionDate
	 */
	public function setIndividualPersonRgExpeditionDate($individualPersonRgExpeditionDate){
		$this->individualPersonRgExpeditionDate = $individualPersonRgExpeditionDate;
	}

	/**
	 * @return the $individualPersonRgExpeditorOrgan
	 */
	public function getIndividualPersonRgExpeditorOrgan(){
		return $this->individualPersonRgExpeditorOrgan;
	}

	/**
	 * @param field_type $individualPersonRgExpeditorOrgan
	 */
	public function setIndividualPersonRgExpeditorOrgan($individualPersonRgExpeditorOrgan){
		$this->individualPersonRgExpeditorOrgan = $individualPersonRgExpeditorOrgan;
	}

	/**
	 * @return the $individualPersonRgUf
	 */
	public function getIndividualPersonRgUf(){
		return $this->individualPersonRgUf;
	}

	/**
	 * @param field_type $individualPersonRgUf
	 */
	public function setIndividualPersonRgUf($individualPersonRgUf){
		$this->individualPersonRgUf = $individualPersonRgUf;
	}

	/**
	 * @return the $individualPersonDay
	 */
	public function getIndividualPersonDay(){
		return $this->individualPersonDay;
	}

	/**
	 * @param field_type $individualPersonDay
	 */
	public function setIndividualPersonDay($individualPersonDay){
		$this->individualPersonDay = $individualPersonDay;
	}

	/**
	 * @return the $individualPersonMonth
	 */
	public function getIndividualPersonMonth(){
		return $this->individualPersonMonth;
	}

	/**
	 * @param field_type $individualPersonMonth
	 */
	public function setIndividualPersonMonth($individualPersonMonth){
		$this->individualPersonMonth = $individualPersonMonth;
	}

	/**
	 * @return the $individualPersonYear
	 */
	public function getIndividualPersonYear(){
		return $this->individualPersonYear;
	}

	/**
	 * @param field_type $individualPersonYear
	 */
	public function setIndividualPersonYear($individualPersonYear){
		$this->individualPersonYear = $individualPersonYear;
	}

	/**
	 * @return the $individualPersonGender
	 */
	public function getIndividualPersonGender(){
		return $this->individualPersonGender;
	}

	/**
	 * @param field_type $individualPersonGender
	 */
	public function setIndividualPersonGender($individualPersonGender){
		$this->individualPersonGender = $individualPersonGender;
	}

	/**
	 * @return the $individualPersonFather
	 */
	public function getIndividualPersonFather(){
		return $this->individualPersonFather;
	}

	/**
	 * @param field_type $individualPersonFather
	 */
	public function setIndividualPersonFather($individualPersonFather){
		$this->individualPersonFather = $individualPersonFather;
	}

	/**
	 * @return the $individualPersonMother
	 */
	public function getIndividualPersonMother(){
		return $this->individualPersonMother;
	}

	/**
	 * @param field_type $individualPersonMother
	 */
	public function setIndividualPersonMother($individualPersonMother){
		$this->individualPersonMother = $individualPersonMother;
	}

	/**
	 * @return the $individualPersonBirthPlace
	 */
	public function getIndividualPersonBirthPlace(){
		return $this->individualPersonBirthPlace;
	}

	/**
	 * @param field_type $individualPersonBirthPlace
	 */
	public function setIndividualPersonBirthPlace($individualPersonBirthPlace){
		$this->individualPersonBirthPlace = $individualPersonBirthPlace;
	}

	/**
	 * @return the $individualPersonBirthUf
	 */
	public function getIndividualPersonBirthUf(){
		return $this->individualPersonBirthUf;
	}

	/**
	 * @param field_type $individualPersonBirthUf
	 */
	public function setIndividualPersonBirthUf($individualPersonBirthUf){
		$this->individualPersonBirthUf = $individualPersonBirthUf;
	}

	/**
	 * @return the $individualPersonNationality
	 */
	public function getIndividualPersonNationality(){
		return $this->individualPersonNationality;
	}

	/**
	 * @param field_type $individualPersonNationality
	 */
	public function setIndividualPersonNationality($individualPersonNationality){
		$this->individualPersonNationality = $individualPersonNationality;
	}

	/**
	 * @return the $personId
	 */
	public function getPersonId(){
		return $this->personId;
	}

	/**
	 * @param field_type $personId
	 */
	public function setPersonId($personId){
		$this->personId = $personId;
	}
}
