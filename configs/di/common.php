<?php
return array(

    'db-driver' => array(
        'params' => array(
            'params' => array(
                'dbname' => 'test',
                'user' => 'root',
                'password' => '',
                'host' => 'localhost',
                'charset' => 'utf8'
            )
        )
    ),
        
    'Quasar\Db\TableGateway\TableGateway' => array(
        'params' => array(
            'table' => 'cities'
        )
    )
);