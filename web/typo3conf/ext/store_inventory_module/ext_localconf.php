<?php
defined('TYPO3_MODE') || die('Access denied.');
call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Module.StoreInventory',
            'Pi1',
            [
                'StoreInventory' => 'list,new,store, edit, delete',
                'Category' => 'list,new,store, edit, delete'
            ],
            // non-cacheable actions
            [
                'StoreInventory' => 'list,new,store, edit, delete',
                'Category' => 'list,new,store, edit, delete'
            ]
        );


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            'module.tx_storeinventory {
        view {
            templateRootPaths {
                0 = EXT:store_inventory_module/Resources/Private/Templates/
                1 = {$module.tx_storeinventory.view.templateRootPath}
            }
            partialRootPaths {
                0 = EXT:store_inventory_module/Resources/Private/Partials/
                1 = {$module.tx_storeinventory.view.partialRootPath}
            }
            layoutRootPaths {
                0 = EXT:store_inventory_module/Resources/Private/Layouts/
                1 = {$module.tx_storeinventory.view.layoutRootPath}
            }
        }
persistence {
            storagePid = {$module.tx_storeinventory.persistence.storagePid}
        }
    }'
        );
    }
);

