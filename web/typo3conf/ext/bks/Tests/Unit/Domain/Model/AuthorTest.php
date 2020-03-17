<?php
namespace Skener\Bks\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class AuthorTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Skener\Bks\Domain\Model\Author
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Skener\Bks\Domain\Model\Author();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getBookNameReturnsInitialValueForBook()
    {
        self::assertEquals(
            null,
            $this->subject->getBookName()
        );
    }

    /**
     * @test
     */
    public function setBookNameForBookSetsBookName()
    {
        $bookNameFixture = new \Skener\Bks\Domain\Model\Book();
        $this->subject->setBookName($bookNameFixture);

        self::assertAttributeEquals(
            $bookNameFixture,
            'bookName',
            $this->subject
        );
    }
}
