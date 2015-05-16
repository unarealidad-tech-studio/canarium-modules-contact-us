<?php

namespace ContactUs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use ContactUs\Service\ContactUs as ContactUsService;

class ContactUsController extends AbstractActionController
{
    /**
     * @var ContactUsService
     */
    protected $contactUsService;

    public function indexAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $page = $objectManager->getRepository('Page\Entity\Page')->findOneBy(array('title' => 'Contact Us'));

        if (!$page) {
            throw new \ErrorHandler\Exception\NotFoundException('Page not found');
        }

        $form = new \ContactUs\Form\ContactUsForm($objectManager);
        $entity = new \ContactUs\Entity\ContactUs();
        $form->bind($entity);
        $post = $this->request->getPost();
        if ($this->request->isPost()) {
            $form->setData($post);
            if ($form->isValid()) {
                $objectManager->persist($entity);
                $objectManager->flush();

                $this->getContactUsService()->sendUserSuccessEmail(
                    $entity,
                    'contact-us/contact-us/email'
                );

                $this->getContactUsService()->sendAdminSuccessEmail(
                    $entity,
                    'contact-us/contact-us/email-admin'
                );

                $view = new ViewModel();
                $view->setTemplate('contact-us/contact-us/thank-you');
                return $view;
            }
        }

        $view = new ViewModel();
        $view->page = $page;
        $view->form = $form;
        return $view;
    }

    public function getContactUsService()
    {
        if (!$this->contactUsService) {
            $this->contactUsService = $this->getServiceLocator()->get('canariumcontactus_contactus_service');
        }
        return $this->contactUsService;
    }

    public function setContactUsService(ContactUsService $contactUsService)
    {
        $this->contactUsService = $contactUsService;
        return $this;
    }
}
