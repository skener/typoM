<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'Module.StoreInventory',
    'system',
    'StoreInventory',
    '',
    ['StoreInventory' => 'list, new,store, edit, delete, update, show'],
    [
        'access' => 'admin',
        'icon' => 'EXT:beuser/Resources/Public/Icons/module-beuser.svg',
        'labels' => 'LLL:EXT:beuser/Resources/Private/Language/locallang_mod.xlf',
    ]
);

//
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('MyVendor.BackStoreInventory', 'Configuration/TypoScript', 'MyVendor.BackStoreInventory');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_storeinventory_domain_model_product', 'EXT:upload_example/Resources/Private/Language/locallang_csh_tx_storeinventory_domain_model_product.xlf');
