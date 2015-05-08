<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace ContactUs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Doctrine\ORM\Tools\Pagination\Paginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Zend\Paginator\Paginator as ZendPaginator;

class AdminController extends AbstractActionController
{
	
    public function indexAction(){
		$page = $this->params()->fromQuery('page', 1);
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$query = $objectManager->createQuery('SELECT a FROM ContactUs\Entity\ContactUs a ORDER BY a.id DESC');
		$doctrinePaginator = new Paginator($query, $fetchJoinCollection = true);
		$paginator = new ZendPaginator(new DoctrinePaginator($doctrinePaginator));
		$paginator->setCurrentPageNumber( $page );
		$paginator->setItemCountPerPage(10);
		
		$view = new ViewModel();
		$view->paginator = $paginator;
		$view->routeParams = array('route' => 'admin/contactus','urlParams' => array());
		return $view;
    }
	
	
	public function viewAction(){
		$id = $this->params()->fromQuery('id', 1);
		$objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$entity = $objectManager->getRepository('ContactUs\Entity\ContactUs')->find($id);
		
		$view = new ViewModel();
		$view->entity = $entity;
		return $view;
    }
	
	
}
