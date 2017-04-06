<?php
return [
    'service_manager' => [
        'factories' => [
            \Modpack\V1\Rest\Issue\IssueResource::class => \Modpack\V1\Rest\Issue\IssueResourceFactory::class,
            \Modpack\V1\Rest\Repository\RepositoryResource::class => \Modpack\V1\Rest\Repository\RepositoryResourceFactory::class,
            \Modpack\Model\Github\RepositoryService::class => \Modpack\Model\Github\RepositoryServiceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'modpack.rest.issue' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/issue',
                    'defaults' => [
                        'controller' => 'Modpack\\V1\\Rest\\Issue\\Controller',
                    ],
                ],
            ],
            'modpack.rest.repository' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/repository[/:repository_id]',
                    'defaults' => [
                        'controller' => 'Modpack\\V1\\Rest\\Repository\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'modpack.rest.issue',
            1 => 'modpack.rest.repository',
        ],
    ],
    'zf-rest' => [
        'Modpack\\V1\\Rest\\Issue\\Controller' => [
            'listener' => \Modpack\V1\Rest\Issue\IssueResource::class,
            'route_name' => 'modpack.rest.issue',
            'route_identifier_name' => 'issue_id',
            'collection_name' => 'issue',
            'entity_http_methods' => [
                0 => 'POST',
            ],
            'collection_http_methods' => [],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Modpack\V1\Rest\Issue\IssueEntity::class,
            'collection_class' => \Modpack\V1\Rest\Issue\IssueCollection::class,
            'service_name' => 'Issue',
        ],
        'Modpack\\V1\\Rest\\Repository\\Controller' => [
            'listener' => \Modpack\V1\Rest\Repository\RepositoryResource::class,
            'route_name' => 'modpack.rest.repository',
            'route_identifier_name' => 'repository_id',
            'collection_name' => 'repository',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Modpack\V1\Rest\Repository\RepositoryEntity::class,
            'collection_class' => \Modpack\V1\Rest\Repository\RepositoryCollection::class,
            'service_name' => 'Repository',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Modpack\\V1\\Rest\\Issue\\Controller' => 'HalJson',
            'Modpack\\V1\\Rest\\Repository\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Modpack\\V1\\Rest\\Issue\\Controller' => [
                0 => 'application/vnd.modpack.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Modpack\\V1\\Rest\\Repository\\Controller' => [
                0 => 'application/vnd.modpack.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Modpack\\V1\\Rest\\Issue\\Controller' => [
                0 => 'application/vnd.modpack.v1+json',
                1 => 'application/json',
            ],
            'Modpack\\V1\\Rest\\Repository\\Controller' => [
                0 => 'application/vnd.modpack.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Modpack\V1\Rest\Issue\IssueEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'modpack.rest.issue',
                'route_identifier_name' => 'issue_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Modpack\V1\Rest\Issue\IssueCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'modpack.rest.issue',
                'route_identifier_name' => 'issue_id',
                'is_collection' => true,
            ],
            \Modpack\V1\Rest\Repository\RepositoryEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'modpack.rest.repository',
                'route_identifier_name' => 'repository_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Modpack\V1\Rest\Repository\RepositoryCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'modpack.rest.repository',
                'route_identifier_name' => 'repository_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'Modpack\\V1\\Rest\\Issue\\Controller' => [
            'input_filter' => 'Modpack\\V1\\Rest\\Issue\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Modpack\\V1\\Rest\\Issue\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '2',
                            'max' => '10',
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'repository',
                'description' => 'The token of the related repository.',
                'field_type' => 'string',
            ],
            1 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '2',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToNull::class,
                        'options' => [],
                    ],
                ],
                'name' => 'name',
                'description' => 'The author of the issue.',
                'continue_if_empty' => true,
                'allow_empty' => true,
                'field_type' => 'string',
            ],
            2 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '2',
                            'max' => '100',
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'title',
                'description' => 'The title of the issue,',
                'field_type' => 'string',
            ],
            3 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '2',
                            'max' => '5000',
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'description',
                'description' => 'The contents of the issue.',
                'field_type' => 'string',
            ],
        ],
    ],
];
