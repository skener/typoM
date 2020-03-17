<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Skener.Bks',
            'Bfp',
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
                    bfp {
                        iconIdentifier = bks-plugin-bfp
                        title = LLL:EXT:bks/Resources/Private/Language/locallang_db.xlf:tx_bks_bfp.name
                        description = LLL:EXT:bks/Resources/Private/Language/locallang_db.xlf:tx_bks_bfp.description
                        tt_content_defValues {
                            CType = list
                            list_type = bks_bfp
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'bks-plugin-bfp',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:bks/Resources/Public/Icons/user_plugin_bfp.svg']
			);
		
    }
);
