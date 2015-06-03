<?php
namespace ContactUs\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Form;

class ContactUsForm extends Form
{
    public function __construct(ObjectManager $objectManager, $captchaConfig=array())
    {
        parent::__construct('contactus-form');

        $this->setHydrator(new DoctrineHydrator($objectManager));

        $fieldset = new ContactUsFieldset($objectManager, $captchaConfig);
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);

    }
}