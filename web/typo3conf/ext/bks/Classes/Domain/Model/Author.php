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
 * Author
 */
class Author extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     */
    protected $name = '';

    /**
     * bookName
     * 
     * @var \Skener\Bks\Domain\Model\Book
     */
    protected $bookName = null;

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the bookName
     * 
     * @return \Skener\Bks\Domain\Model\Book $bookName
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * Sets the bookName
     * 
     * @param \Skener\Bks\Domain\Model\Book $bookName
     * @return void
     */
    public function setBookName(\Skener\Bks\Domain\Model\Book $bookName)
    {
        $this->bookName = $bookName;
    }
}
