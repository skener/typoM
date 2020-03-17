<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'StoreInventory',
    'description' => 'An extension to manage a stock.',
    'category' => 'Module',
    'author' => 'Skener',
    'author_company' => 'Resultify.',
    'author_email' => 'skenerster@gmail.com',
    'state' => 'alpha',
    'clearCacheOnLoad' => true,
    'version' => '0.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.9.99',
        ]
    ],
    'autoload' => [
        'psr-4' => [
            'Module\\StoreInventory\\' => 'Classes'
        ]
    ],
];
