<?php
return array(
	'doctrine' => array(
	  'driver' => array(
		'contactus_entities' => array(
		  'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
		  'cache' => 'array',
		  'paths' => array(__DIR__ . '/../src/ContactUs/Entity')
		),

		'orm_default' => array(
		  'drivers' => array(
			'ContactUs\Entity' => 'contactus_entities'
		  )
		)
	)
	),

    'controllers' => array(
        'invokables' => array(
			'ContactUs' => 'ContactUs\Controller\ContactUsController',
			'Admin\ContactUs' => 'ContactUs\Controller\AdminController',
        ),
    ),

	'bjyauthorize' => array(
		'guards' => array(
			'BjyAuthorize\Guard\Controller' => array(
				array('controller' => 'ContactUs', 'roles' => array('user', 'guest')),
                array('controller' => 'Admin\ContactUs', 'roles' => array('user', 'admin')),
			),
		),
	),

	'router' => array(
        'routes' => array(
			'admin' => array(
                'child_routes' => array(
                    'contactus' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/contact-us[/:action[/:id]]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
								'id'     => '[0-9]*',
                            ),
                            'defaults' => array(
								'controller'    => 'Admin\ContactUs',
								'action'        => 'index',
                            ),
                        ),
                    ),
				),
			),

			'contactus' => array(
				'type'    => 'Literal',
				'options' => array(
					'route'    => '/contact-us',
					'defaults' => array(
						'controller'    => 'ContactUs',
						'action'        => 'index',
					),
				),
				'may_terminate' => true,
			),


        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'contact-us' => __DIR__ . '/../view',
        ),
		'template_map' => array(

        ),
    ),
);