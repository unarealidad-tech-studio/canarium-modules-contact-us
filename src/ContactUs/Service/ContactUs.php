<?php

namespace ContactUs\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use ContactUs\Entity\ContactUs as ContactUsEntity;

class ContactUs implements ServiceLocatorAwareInterface
{
    /**
     * @var ServiceLocatorInterface
     */
    protected $serviceLocator;

    protected $module_option;

    protected $mail_service;

    public function sendUserSuccessEmail(ContactUsEntity $dataEntity, $template)
    {
        $moduleOption = $this->getModuleOption();

        // USER
        $mailService = $this->getMailService();
        $mail = $mailService->createHtmlMessage(
            $moduleOption->getEmailSender(),
            $dataEntity->getEmail(),
            $moduleOption->getEmailSubject(),
            $template,
            array('entity' => $dataEntity)
        );

        return $mailService->send($mail);
    }

    public function sendAdminSuccessEmail(ContactUsEntity $dataEntity, $template)
    {
        $moduleOption = $this->getModuleOption();

        $mailService = $this->getMailService();
        $mail = $mailService->createHtmlMessage(
            $moduleOption->getEmailSender(),
            $moduleOption->getEmailAdmin(),
            $moduleOption->getEmailAdminSubject(),
            $template,
            array('entity' => $dataEntity)
        );

        return $mailService->send($mail);
    }

    public function getModuleOption()
    {
        if (empty($this->module_option)) {
            $this->module_option = $this->getServiceLocator()->get('canariumcontactus_module_options');
        }

        return $this->module_option;
    }

    public function getMailService()
    {
        if (empty($this->mail_service)) {
            $this->mail_service = $this->getServiceLocator()->get('goaliomailservice_message');
        }

        return $this->mail_service;
    }

    /**
     * Retrieve service manager instance
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * Set service manager instance
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return User
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

}
