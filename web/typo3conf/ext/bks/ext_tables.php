<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Skener.Bks',
            'Bkf',
            'Bookf'
        );

        if (TYPO3_MODE === 'BE') {

            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Skener.Bks',
                'web', // Make module a submodule of 'web'
                'bkb', // Submodule key
                '', // Position
                [
                    'Book' => 'list, show, new, create, edit, update, delete','Author' => 'list, show, new, create, edit, update, delete',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:bks/Resources/Public/Icons/user_mod_bkb.svg',
                    'labels' => 'LLL:EXT:bks/Resources/Private/Language/locallang_bkb.xlf',
                ]
            );

        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('bks', 'Configuration/TypoScript', 'BookShop');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bks_domain_model_book', 'EXT:bks/Resources/Private/Language/locallang_csh_tx_bks_domain_model_book.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bks_domain_model_book');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_bks_domain_model_author', 'EXT:bks/Resources/Private/Language/locallang_csh_tx_bks_domain_model_author.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_bks_domain_model_author');

    }
);
