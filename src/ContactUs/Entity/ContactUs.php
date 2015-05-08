<?php
namespace ContactUs\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\ServiceManager\ServiceManager;

use Zend\Form\Annotation;

/** 
* @ORM\Entity 
* @ORM\Table(name="contactus")
* @ORM\HasLifecycleCallbacks
*/

class ContactUs {
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $firstname;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $lastname;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $country;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $city;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $postalcode;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $email;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $mobileno;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $phoneno;
	
	/**
     * @ORM\Column(type="string",  nullable=true)
     */
	protected $inquirytype;
	
	/**
     * @ORM\Column(type="text",  nullable=true)
     */
	protected $comments;
	
	/**
	  * @ORM\Column(type="datetime", nullable=true)
	  */
	protected $date = null;
	
	
    public function getId(){
		return $this->id;
	}
	
	public function getDate(){
		return $this->date;
	}
	
	public function setDate($i){
		$this->date = $i;
	}
	
	public function getFirstname(){
		return $this->firstname;
	}
	
	public function setFirstname($i){
		$this->firstname = $i;
	}
	
	public function getLastname(){
		return $this->lastname;
	}
	
	public function setLastname($i){
		$this->lastname = $i;
	}
	
	public function getFullname()
    {
        return $this->firstname.' '.$this->lastname;
    }
	
	public function getCountry(){
		return $this->country;
	}
	
	public function setCountry($i){
		$this->country = $i;
	}
	
	public function getCity(){
		return $this->city;
	}
	
	public function setCity($i){
		$this->city = $i;
	}
	
	public function getPostalcode(){
		return $this->postalcode;
	}
	
	public function setPostalcode($i){
		$this->postalcode = $i;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($i){
		$this->email = $i;
	}
	
	public function getMobileno(){
		return $this->mobileno;
	}
	
	public function setMobileno($i){
		$this->mobileno = $i;
	}
	
	public function getPhoneno(){
		return $this->phoneno;
	}
	
	public function setPhoneno($i){
		$this->phoneno = $i;
	}
	
	public function getInquirytype(){
		return $this->inquirytype;
	}
	
	public function setInquirytype($i){
		$this->inquirytype = $i;
	}
	
	public function getComments(){
		return $this->comments;
	}
	
	public function setComments($i){
		$this->comments = $i;
	}
}