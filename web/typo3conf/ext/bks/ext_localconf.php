<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Skener.Bks',
            'Bkf',
            [
                'Book' => 'list, show, new, create, edit, update, delete',
                'Author' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Book' => 'create, update, delete',
                'Author' => 'create, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    bkf {
                        iconIdentifier = bks-plugin-bkf
                        title = LLL:EXT:bks/Resources/Private/Language/locallang_db.xlf:tx_bks_bkf.name
                        description = LLL:EXT:bks/Resources/Private/Language/locallang_db.xlf:tx_bks_bkf.description
                        tt_content_defValues {
                            CType = list
                            list_type = bks_bkf
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'bks-plugin-bkf',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:bks/Resources/Public/Icons/user_plugin_bkf.svg']
			);
		
    }
);
