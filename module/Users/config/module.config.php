<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Users\\V1\\Rest\\Users\\UsersResource' => 'Users\\V1\\Rest\\Users\\UsersResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'users.rest.users' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/users[/:users_id]',
                    'defaults' => array(
                        'controller' => 'Users\\V1\\Rest\\Users\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'users.rest.users',
        ),
    ),
    'zf-rest' => array(
        'Users\\V1\\Rest\\Users\\Controller' => array(
            'listener' => 'Users\\V1\\Rest\\Users\\UsersResource',
            'route_name' => 'users.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Users\\V1\\Rest\\Users\\UsersEntity',
            'collection_class' => 'Users\\V1\\Rest\\Users\\UsersCollection',
            'service_name' => 'users',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Users\\V1\\Rest\\Users\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Users\\V1\\Rest\\Users\\Controller' => array(
                0 => 'application/vnd.users.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Users\\V1\\Rest\\Users\\Controller' => array(
                0 => 'application/vnd.users.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Users\\V1\\Rest\\Users\\UsersEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'users.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'Users\\V1\\Rest\\Users\\UsersCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'users.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Users\\V1\\Rest\\Users\\Controller' => array(
            'input_filter' => 'Users\\V1\\Rest\\Users\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Users\\V1\\Rest\\Users\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'username',
                'description' => 'The username',
                'error_message' => 'The username is required',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'email',
                'description' => '',
            ),
        ),
    ),
);
