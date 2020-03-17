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
    public function getIdReturnsInitialValueForAuthor()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getId()
        );
    }

    /**
     * @test
     */
    public function setIdForObjectStorageContainingAuthorSetsId()
    {
        $id = new \Skener\Bks\Domain\Model\Author();
        $objectStorageHoldingExactlyOneId = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneId->attach($id);
        $this->subject->setId($objectStorageHoldingExactlyOneId);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneId,
            'id',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addIdToObjectStorageHoldingId()
    {
        $id = new \Skener\Bks\Domain\Model\Author();
        $idObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $idObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($id));
        $this->inject($this->subject, 'id', $idObjectStorageMock);

        $this->subject->addId($id);
    }

    /**
     * @test
     */
    public function removeIdFromObjectStorageHoldingId()
    {
        $id = new \Skener\Bks\Domain\Model\Author();
        $idObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $idObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($id));
        $this->inject($this->subject, 'id', $idObjectStorageMock);

        $this->subject->removeId($id);
    }
}
