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
        'description' => [
            'label' => 'LLL:EXT:store_inventory_module/Resources/Private/Language/locallang_db.xlf:tx_store_inventory_domain_model_product.item_description',
            'config' => [
                'type' => 'text',
                'eval' => 'trim'
            ]
        ],
        'quantity' => [
            'label' => 'LLL:EXT:store_inventory_module/Resources/Private/Language/locallang_db.xlf:tx_store_inventory_domain_model_product.stock_quantity',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ]
        ],
//        'image' => array(
//            'exclude' => 1,
//            'label' => 'Image',
//            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
//                'image',
//                array(
//                    'appearance' => array(
//                        'elementBrowserType' => 'file',
//                        'elementBrowserAllowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
//                    ),
//                    'minitems' => 0,
//                    'maxitems' => 1,
//                    // custom configuration for displaying fields in the overlay/reference table
//                    // to use the imageoverlayPalette instead of the basicoverlayPalette
//                    'foreign_match_fields' => array(
//                        'fieldname' => 'image',
//                        'tablenames' => 'tx_myext_domain_model_mymodel',
//                        'table_local' => 'sys_file',
//                    ),
//                    'foreign_types' => array(
//                        '0' => array(
//                            'showitem' => '
//                            --palette--;;imagePalette,
//                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
//                            --palette--;;filePalette',
//                        ),
//                    ),
//                ),
//                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
//            ),
//        ),
//        'image' => array(
//            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.images',
//            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig('image', array(
//                'appearance' => array(
//                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
//                ),
//                // custom configuration for displaying fields in the overlay/reference table
//                // to use the imageoverlayPalette instead of the basicoverlayPalette
//                'foreign_types' => array(
//                )
//            ), $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'])
//        ),
//        'date' => [
//            'label' => 'LLL:EXT:store_inventory/Resources/Private/Language/locallang_db.xlf:tx_storeinventory_domain_model_product.stock_date',
//            'config' => [
//                'type' => 'input',
//                'size' => 4,
//                'eval' => 'int'
//            ]
//        ],
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
        '0' => ['showitem' => 'name, description, quantity, categories, crdate, tstamp'],
    ]
];
