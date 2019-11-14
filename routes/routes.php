<?php
    return [
        '' => 'UrlController@indexAction',
        'add' => 'UrlController@addAction',
        'delete/([0-9]+)' => 'UrlController@deleteAction/$1',
    ];