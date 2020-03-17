<?php

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


