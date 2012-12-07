<?php

namespace Person\Entity;

use Zend\Form\Annotation;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * @Annotation\Name("person_form")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ArraySerializable")
 */
class PersonsEntity implements ArraySerializableInterface
{
	
    /**
     * @Annotation\Name("person_id")
     * @Annotation\Required(false)
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $personId;
    
    /**
     * @Annotation\Name("person_name")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(true)
     * @Annotation\Attributes({"placeholder":"Nome","class":"span5"})
     */
    protected $personName;

    /**
     * @Annotation\Name("person_email")
     * @Annotation\Filter({"name":"Alnum", "options":{"allowWhiteSpace":true}})
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"EmailAddress"})
     * @Annotation\Type("Zend\Form\Element\Email")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"E-mail (ex:usuario@servidor.com)","class":"span5"})
     */
    protected $personEmail;

    /**
     * @Annotation\Name("person_address")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Endereço","class":"span4"})
     */
    protected $personAddress;
    
    /**
     * @Annotation\Name("person_address_number")
     * @Annotation\Filter({"name":"Digits"})
     * @Annotation\Required(false)
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Attributes({"placeholder":"Nº", "class":"span1"})
     */
    protected $personAddressNumber;
    
    /**
     * @Annotation\Name("person_address_complement")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"Digits"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Complemento", "class":"span2"})
     */
    protected $personAddressComplement;

    /**
     * @Annotation\Name("person_address_quarter")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Bairro", "class":"span3"})
     */
    protected $personAddressQuarter;
    
    /**
     * @Annotation\Name("person_address_postal_code")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"Digits"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"CEP", "class":"span2 cep", "maxlength":8})
     */
    protected $personAddressPostalCode;
    
    /**
     * @Annotation\Name("person_address_city")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Cidade","class":"span3", "readonly":"readonly"})
     */
    protected $personAddressCity;

    /**
     * @Annotation\Name("person_address_state")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Estado","class":"span4", "readonly":"readonly"})
     */
    protected $personAddressState;
    
    /**
     * @Annotation\Name("person_address_country")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"País","class":"span1", "readonly":"readonly"})
     */
    protected $personAddressCountry;
    
    /**
     * @Annotation\Name("person_phone")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"Digits"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Telefone", "class":"span2 phone"})
     */
    protected $personPhone;
    
    /**
     * @Annotation\Name("person_cell")
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Filter({"name":"Digits"})
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required(false)
     * @Annotation\Attributes({"placeholder":"Celular", "class":"span2 phone"})
     */
    protected $personCell;

    /**
     * @Annotation\Name("person_type")
     * @Annotation\Filter({"name":"Boolean"})
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Required(false)
     * @Annotation\Options({"empty_option":"Selecione um Tipo", "label":"Tipo de Pessoa","value_options":{"Pessoa Física":0, "Pessoa Jurídica":1}})
     */
    protected $personType;

    /**
     * @Annotation\Name("person_timestamp")
     * @Annotation\Type("Zend\Form\Element\Hidden")
     */
    protected $personTimestamp;
    
    public function exchangeArray(array $array)
    {
    	foreach ($array as $key => $value) {
    		switch (strtolower($key)) {
    			case 'person_id':
    				$this->setPersonId($value);
    				continue;
    			case 'person_name':
    				$this->setPersonName($value);
    				continue;
    			case 'person_email':
    				$this->setPersonEmail($value);
    				continue;
    			case 'person_address':
    				$this->setPersonAddress($value);
    				continue;
    			case 'person_address_number':
    				$this->setPersonAddressNumber($value);
    				continue;
    			case 'person_address_complement':
    				$this->setPersonAddressComplement($value);
    				continue;
    			case 'person_address_quarter':
    				$this->setPersonAddressQuarter($value);
    				continue;
    			case 'person_address_postal_code':
    				$this->setPersonAddressPostalCode($value);
    				continue;
    			case 'person_address_city':
    				$this->setPersonAddressCity($value);
    				continue;
    			case 'person_address_state':
    				$this->setPersonAddressState($value);
    				continue;
    			case 'person_address_country':
    				$this->setPersonAddressCountry($value);
    				continue;
    			case 'person_phone':
    				$this->setPersonPhone($value);
    				continue;
    			case 'person_cell':
    				$this->setPersonCell($value);
    				continue;
    			case 'person_type':
    				$this->setPersonType($value);
    				continue;
    			case 'person_timestamp':
    				$this->setPersonTimestamp($value);
    				continue;
    			default:
    				break;
    		}
    	}
    }
    
    public function getArrayCopy()
    {
    	return array(
    		'person_id'					=> $this->getPersonId(),
    		'person_name'				=> $this->getPersonName(),
    		'person_email'				=> $this->getPersonEmail(),	
    		'pseron_address'			=> $this->getPersonAddress(),	
    		'pseron_address_number'		=> $this->getPersonAddressNumber(),	
    		'pseron_address_complement'	=> $this->getPersonAddressComplement(),	
    		'pseron_address_quarter'	=> $this->getPersonAddressQuarter(),	
    		'pseron_address_postal_code'=> $this->getPersonAddressPostalCode(),	
    		'pseron_address_city'		=> $this->getPersonAddressCity(),	
    		'pseron_address_state'		=> $this->getPersonAddressState(),	
    		'pseron_address_country'	=> $this->getPersonAddressCountry(),	
    		'pseron_phone'				=> $this->getPersonPhone(),	
    		'pseron_cell'				=> $this->getPersonCell(),	
    		'pseron_type'				=> $this->getPersonType(),	
    		'pseron_timestamp'			=> $this->getPersonTimestamp(),	
    	);
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

	/**
	 * @return the $personName
	 */
	public function getPersonName(){
		return $this->personName;
	}

	/**
	 * @param field_type $personName
	 */
	public function setPersonName($personName){
		$this->personName = $personName;
	}

	/**
	 * @return the $personEmail
	 */
	public function getPersonEmail(){
		return $this->personEmail;
	}

	/**
	 * @param field_type $personEmail
	 */
	public function setPersonEmail($personEmail){
		$this->personEmail = $personEmail;
	}

	/**
	 * @return the $personAddress
	 */
	public function getPersonAddress(){
		return $this->personAddress;
	}

	/**
	 * @param field_type $personAddress
	 */
	public function setPersonAddress($personAddress){
		$this->personAddress = $personAddress;
	}

	/**
	 * @return the $personAddressNumber
	 */
	public function getPersonAddressNumber(){
		return $this->personAddressNumber;
	}

	/**
	 * @param field_type $personAddressNumber
	 */
	public function setPersonAddressNumber($personAddressNumber){
		$this->personAddressNumber = $personAddressNumber;
	}

	/**
	 * @return the $personAddressComplement
	 */
	public function getPersonAddressComplement(){
		return $this->personAddressComplement;
	}

	/**
	 * @param field_type $personAddressComplement
	 */
	public function setPersonAddressComplement($personAddressComplement){
		$this->personAddressComplement = $personAddressComplement;
	}

	/**
	 * @return the $personAddressQuarter
	 */
	public function getPersonAddressQuarter(){
		return $this->personAddressQuarter;
	}

	/**
	 * @param field_type $personAddressQuarter
	 */
	public function setPersonAddressQuarter($personAddressQuarter){
		$this->personAddressQuarter = $personAddressQuarter;
	}

	/**
	 * @return the $personAddressPostalCode
	 */
	public function getPersonAddressPostalCode(){
		return $this->personAddressPostalCode;
	}

	/**
	 * @param field_type $personAddressPostalCode
	 */
	public function setPersonAddressPostalCode($personAddressPostalCode){
		$this->personAddressPostalCode = $personAddressPostalCode;
	}

	/**
	 * @return the $personPhone
	 */
	public function getPersonPhone(){
		return $this->personPhone;
	}

	/**
	 * @param field_type $personPhone
	 */
	public function setPersonPhone($personPhone){
		$this->personPhone = $personPhone;
	}

	/**
	 * @return the $personCell
	 */
	public function getPersonCell(){
		return $this->personCell;
	}

	/**
	 * @param field_type $personCell
	 */
	public function setPersonCell($personCell){
		$this->personCell = $personCell;
	}

	/**
	 * @return the $personType
	 */
	public function getPersonType(){
		return $this->personType;
	}

	/**
	 * @param field_type $personType
	 */
	public function setPersonType($personType){
		$this->personType = $personType;
	}

	/**
	 * @return the $personTimestamp
	 */
	public function getPersonTimestamp(){
		return $this->personTimestamp;
	}

	/**
	 * @param field_type $personTimestamp
	 */
	public function setPersonTimestamp($personTimestamp){
		$this->personTimestamp = $personTimestamp;
	}
	/**
	 * @return the $personAddressCity
	 */
	public function getPersonAddressCity(){
		return $this->personAddressCity;
	}

	/**
	 * @param field_type $personAddressCity
	 */
	public function setPersonAddressCity($personAddressCity){
		$this->personAddressCity = $personAddressCity;
	}
	/**
	 * @return the $personAddressState
	 */
	public function getPersonAddressState(){
		return $this->personAddressState;
	}

	/**
	 * @param field_type $personAddressState
	 */
	public function setPersonAddressState($personAddressState){
		$this->personAddressState = $personAddressState;
	}
	/**
	 * @return the $personAddressCountry
	 */
	public function getPersonAddressCountry(){
		return $this->personAddressCountry;
	}

	/**
	 * @param field_type $personAddressCountry
	 */
	public function setPersonAddressCountry($personAddressCountry){
		$this->personAddressCountry = $personAddressCountry;
	}



}
