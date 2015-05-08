<?php
return array(
	'navigation' => array(
         'admin' => array(
			 array(
				'label' => 'Contact Us',
				'route' => 'admin/contactus',
				'resource' => 'admin',
				'controller' => 'Admin\ContactUs',
				'icon' => 'fa fa-file-o',
				'pages' => array(
					array(
						'label' => 'List',
						'route' => 'admin/contactus',
						'controller' => 'Admin\ContactUs',
						'resource' => 'admin',
						'action'     => 'index',
				 		'icon' => 'fa fa-th-list',
					),
				),
             ),
         ),
     ),
);