<?php
namespace Skener\Bks\Domain\Model;


/***
 *
 * This file is part of the "BookShop" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * Book
 */
class Book extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     * 
     * @var string
     */
    protected $title = '';

    /**
     * price
     * 
     * @var string
     */
    protected $price = '';

    /**
     * id
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Skener\Bks\Domain\Model\Author>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $id = null;

    /**
     * Returns the title
     * 
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     * 
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the price
     * 
     * @return string $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Sets the price
     * 
     * @param string $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->id = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a
     * 
     * @param \Skener\Bks\Domain\Model\Author $id
     * @return void
     */
    public function addId($id)
    {
        $this->id->attach($id);
    }

    /**
     * Removes a
     * 
     * @param \Skener\Bks\Domain\Model\Author $idToRemove The Author to be removed
     * @return void
     */
    public function removeId($idToRemove)
    {
        $this->id->detach($idToRemove);
    }

    /**
     * Returns the id
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Skener\Bks\Domain\Model\Author> id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the id
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Skener\Bks\Domain\Model\Author> $id
     * @return void
     */
    public function setId(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $id)
    {
        $this->id = $id;
    }
}
