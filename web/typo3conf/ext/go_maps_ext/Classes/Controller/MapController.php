<?php

namespace Clickstorm\GoMapsExt\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Marc Hirdes <Marc_Hirdes@gmx.de>, clickstorm GmbH
 *  (c) 2013 Mathias Brodala <mbrodala@pagemachine.de>, PAGEmachine AG
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use Clickstorm\GoMapsExt\Domain\Model\Map;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @package go_maps_ext
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class MapController extends ActionController
{

    /**
     * mapRepository
     *
     * @var \Clickstorm\GoMapsExt\Domain\Repository\MapRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $mapRepository;

    /**
     * addressRepository
     *
     * @var \Clickstorm\GoMapsExt\Domain\Repository\AddressRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $addressRepository;

    /**
     * @var string
     */
    protected $googleMapsLibrary;

    public function initializeAction()
    {
        $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('go_maps_ext');

        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        $addJsMethod = 'addJs';

        if ($extConf['footerJS'] === '1') {
            $addJsMethod = 'addJsFooter';
        }

        $this->googleMapsLibrary = $this->settings['googleMapsLibrary'] ?? '//maps.google.com/maps/api/js?v=weekly';

        if ($this->settings['apiKey']) {
            $this->googleMapsLibrary .= '&key=' . $this->settings['apiKey'];
        }
        if ($this->settings['language']) {
            $this->googleMapsLibrary .= '&language=' . $this->settings['language'];
        }

        if(!$this->settings['preview']['enabled']) {
            $pageRenderer->{$addJsMethod . 'Library'}(
                'googleMaps',
                $this->googleMapsLibrary,
                'text/javascript',
                false,
                false,
                '',
                true
            );
        }

        $pathPrefix =  PathUtility::getAbsoluteWebPath(ExtensionManagementUtility::extPath($this->request->getControllerExtensionKey()));
        if ($extConf['include_library'] === '1') {
            $pageRenderer->{$addJsMethod . 'Library'}(
                'jQuery',
                $pathPrefix . 'Resources/Public/Scripts/jquery.min.js'
            );
        }

        if ($extConf['include_manually'] !== '1') {
            $scripts[] = $pathPrefix . 'Resources/Public/Scripts/markerclusterer_compiled.js';
            $scripts[] = $pathPrefix . 'Resources/Public/Scripts/jquery.gomapsext.js';

            if($this->settings['preview']['setCookieToShowMapAlways']) {
                $scripts[] = $pathPrefix . 'Resources/Public/Scripts/jquery.cookie.js';
            }

            if($this->settings['preview']['enabled']) {
                $scripts[] = $pathPrefix . 'Resources/Public/Scripts/jquery.gomapsext.preview.js';
            }

            foreach ($scripts as $script) {
                $pageRenderer->{$addJsMethod . 'File'}($script);
            }
        }
    }

    /**
     * show action
     *
     * @param Map $map
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     * @throws \TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException
     */
    public function showAction(Map $map = null)
    {
        $categoriesArray = [];

        // get current map
        /* @var Map $map */
        $map = $map ?? $this->mapRepository->findByUid($this->settings['map']);

        // find addresses
        $addresses = $map->getAddresses();

        // no addresses related to the map, try to find some from the storagePid
        if($addresses->count() === 0 && $this->settings['storagePid']) {
            $pid = str_ireplace('this', $GLOBALS['TSFE']->id, $this->settings['storagePid']);
            $addresses = $this->addressRepository->findAllAddresses($map, $pid);
        }

        // get categories
        if ($map->isShowCategories()) {
            foreach ($addresses as $address) {
                /* @var \Clickstorm\GoMapsExt\Domain\Model\Address $address */
                $addressCategories = $address->getCategories();
                /* @var \Clickstorm\GoMapsExt\Domain\Model\Category $addressCategory */
                foreach ($addressCategories as $addressCategory) {
                    $categoriesArray[$addressCategory->getUid()] = $addressCategory;
                }
            }
        }

        $this->view->assignMultiple([
            'request' => $this->request->getArguments(),
            'map' => $map, 'addresses' => $addresses,
            'categories' => $categoriesArray,
            'googleMapsLibrary' => $this->googleMapsLibrary
        ]);
    }
}
