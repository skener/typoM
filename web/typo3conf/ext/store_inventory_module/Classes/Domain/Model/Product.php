<?php

namespace Module\StoreInventory\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Product
 * @package MyVendor\StoreInventory\Domain\Model
 */
class Product extends AbstractEntity
{

    /**
     * The name of the product
     *
     * @var string
     **/
    protected $name = '';

    /**
     * The description of the product
     *
     * @var string
     **/
    protected $description = '';

    /**
     * The quantity in the store inventory
     *
     * @var int
     **/
    protected $quantity = 0;


    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\Category;
     */
    protected $category;


    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $imageCollection;


    /**
     * @var DateTime
     */
    protected $crdate = null;


    /**
     * @var bool
     */
    protected $deleted = false;

    /**
     * @var DateTime
     */
    protected $tstamp = null;

    /**
     * Product constructor.
     *
     * @param string $name
     * @param string $description
     * @param int $quantity
     */
    public function __construct($name = '', $description = '', $quantity = 0)
    {
        $this->setName($name);
        $this->setDescription($description);
        $this->setQuantity($quantity);
        //$this->crdate  =   new \DateTime();
        //$this->setCrdate($crdate);
        $this->imageCollection = new ObjectStorage();
        date_default_timezone_set('Europe/Kiev');
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name of the product
     *
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $imageCollection
     */
    public function setImageCollection($imageCollection)
    {
        $this->imageCollection = $imageCollection;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImageCollection()
    {
        return $this->imageCollection;
    }

    /**
     * Sets the description of the product
     *
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Gets the description of the product
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the quantity in the store inventory of the product
     *
     * @param int $quantity
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Gets the quantity in the store inventory of the product
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $crdate
     * @return void
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $tstamp
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $tstamp
     * @return void
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }



}
