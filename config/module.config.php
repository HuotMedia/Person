<?php

return array(
    
	'controllers' => array(
        'invokables' => array(
        ),
		'factories' => array(
            'Person\Controller\Persons' 			=> 'Person\Factory\PersonsControllerFactory',
            'Person\Controller\IndividualsPersons'	=> 'Person\Factory\IndividualsPersonsControllerFactory',
		)
    ),
	
	'router' => array(
        'routes' => array(
            'persons' => array(
                'type'    => 'Segment',
                'options' => array(
                	'route'    => '/persons[/:action][/:id]',
                    'constraints' => array(
                    	'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' 	=> 'Person\Controller\Persons',
                        'action'     	=> 'index',
					),
            	),
            ),
            'individuals' => array(
                'type'    => 'Segment',
                'options' => array(
                	'route'    => '/individuals[/:action][/:id]',
                    'constraints' => array(
                    	'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' 	=> 'Person\Controller\IndividualsPersons',
                        'action'     	=> 'index',
					),
            	),
            ),
        ),
    ),
	
	'service_manager' => array(
		'factories' => array(
			'persons-service'				=> 'Person\Factory\PersonsServiceFactory',
			'persons-table' 				=> 'Person\Factory\PersonsTableFactory',
			'individuals-persons-service'	=> 'Person\Factory\IndividualsPersonsServiceFactory',
			'individuals-persons-table' 	=> 'Person\Factory\IndividualsPersonsTableFactory',
		),
	),
	
	'person' => array(
		'adapter' 	=> 'Zend\Db\Adapter\Adapter',
	),
	
    'view_manager' => array(
        'template_path_stack' => array(
            'Person' => __DIR__ . '/../view',
        ),
    ),
);
