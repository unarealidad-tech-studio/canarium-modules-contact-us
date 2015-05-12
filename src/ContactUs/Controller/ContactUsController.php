<?php

namespace ContactUs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactUsController extends AbstractActionController
{
    public function indexAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $page = $objectManager->getRepository('Page\Entity\Page')->findOneBy(array('title' => 'Contact Us'));

        $form = new \ContactUs\Form\ContactUsForm($objectManager);
        $entity = new \ContactUs\Entity\ContactUs();
        $form->bind($entity);
        $post = $this->request->getPost();
        if ($this->request->isPost()) {
            $form->setData($post);
            if ($form->isValid()) {
                $objectManager->persist($entity);
                $objectManager->flush();

                // USER
                $mailService = $this->getServiceLocator()->get('goaliomailservice_message');
                $mail = $mailService->createHtmlMessage(array('email' => 'info@unarealidad.com','name' =>'UNA REALIDAD'), $entity->getEmail(), 'Thank you', 'contact-us/contact-us/email', array('entity' => $entity) );
                $mailService->send($mail);

                // ADMIN
                $mailService = $this->getServiceLocator()->get('goaliomailservice_message');
                $mail = $mailService->createHtmlMessage(array('email' => 'info@unarealidad.com','name' =>'UNA REALIDAD'), 'jethro.laviste@unarealidad.com', 'Contact Us :: Averilla Y Arrellano', 'contact-us/contact-us/email-admin', array('entity' => $entity) );
                $mailService->send($mail);

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
}
