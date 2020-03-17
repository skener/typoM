<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:store_inventory_module/Resources/Private/Language/locallang_db.xlf:tx_store_inventory_domain_model_product',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'delete' => 'deleted',
        'iconfile' => 'EXT:store_inventory_module/Resources/Public/Icons/Product.svg'
    ],
    'columns' => [
        'name' => [
            'label' => 'LLL:EXT:store_inventory_module/Resources/Private/Language/locallang_db.xlf:tx_store_inventory_domain_model_product.item_label',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'deleted' => [
            'label' => 'deleted',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
//        'categories' => [
//            'label' => 'LLL:EXT:store_inventory/Resources/Private/Language/locallang_db.xlf:tx_storeinventory_domain_model_category',
//            'config' => [
//                'type' => 'input',
//            ]
//        ]
    ],
    'types' => [
        '0' => ['showitem' => 'name, crdate, tstamp, deleted'],
    ]
];
