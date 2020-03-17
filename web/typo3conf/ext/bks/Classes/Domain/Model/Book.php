<?php
namespace Skener\Bks\Domain\Model;


/***
 *
 * This file is part of the "BookManager" Extension for TYPO3 CMS.
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
     * authorName
     * 
     * @var \Skener\Bks\Domain\Model\Author
     */
    protected $authorName = null;

    /**
     * author
     * 
     * @var int
     */
    protected $author = 0;

    /**
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

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
     * Returns the authorName
     * 
     * @return \Skener\Bks\Domain\Model\Author $authorName
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * Sets the authorName
     * 
     * @param \Skener\Bks\Domain\Model\Author $authorName
     * @return void
     */
    public function setAuthorName(\Skener\Bks\Domain\Model\Author $authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * Returns the author
     * 
     * @return int $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     * 
     * @param int $author
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }
}
