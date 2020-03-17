<?php
namespace Skener\Bks\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class BookTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Skener\Bks\Domain\Model\Book
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Skener\Bks\Domain\Model\Book();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAuthorReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getAuthor()
        );
    }

    /**
     * @test
     */
    public function setAuthorForIntSetsAuthor()
    {
        $this->subject->setAuthor(12);

        self::assertAttributeEquals(
            12,
            'author',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPriceReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getPrice()
        );
    }

    /**
     * @test
     */
    public function setPriceForStringSetsPrice()
    {
        $this->subject->setPrice('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'price',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAuthorNameReturnsInitialValueForAuthor()
    {
        self::assertEquals(
            null,
            $this->subject->getAuthorName()
        );
    }

    /**
     * @test
     */
    public function setAuthorNameForAuthorSetsAuthorName()
    {
        $authorNameFixture = new \Skener\Bks\Domain\Model\Author();
        $this->subject->setAuthorName($authorNameFixture);

        self::assertAttributeEquals(
            $authorNameFixture,
            'authorName',
            $this->subject
        );
    }
}
