<?php
return array(
     'doctrine' => array(
           'driver' => array(
                'blog_entity' => array(
                    'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                    'paths' => array(__DIR__ . '/../src/Blog/Entity')
                ),
                'orm_default' => array(
                    'drivers' => array(
                        'Blog\Entity' => 'blog_entity',
                    )
                )
            ),
     ),
     'controllers' => array(
         'invokables' => array(
             'Blog\Controller\Blog' => 'Blog\Controller\BlogController',
         ),
     ),
     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'blog' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/blog[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Blog\Controller\Blog',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
     

    'view_helpers' => array(
        'invokables' => array(
            'showMessages' => 'Blog\View\Helper\ShowMessages',
            'getFirstWords' => 'Blog\View\Helper\GetFirstWords',
    ),
    ),

     'view_manager' => array(
         'template_path_stack' => array(
             'blog' => __DIR__ . '/../view',
         ),
     ),
 );