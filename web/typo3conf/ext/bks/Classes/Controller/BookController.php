<?php

namespace Skener\Bks\Controller;


use Skener\Bks\Domain\Repository\BookRepository;

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
 * BookController
 */
class BookController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{


    /**
     * @var BookRepository
     */
    private $bookRepository;

/**
* Inject the book repository
*
* @param \Skener\bks\Domain\Repository\BookRepository $bookRepository
*/
    public function injectBookRepository(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        echo 'Books List';
                $books = $this->bookRepository->findAll();
                $this->view->assign('books', $books);

    }

    /**
     * action show
     *
     * @param \Skener\Bks\Domain\Model\Book $book
     * @return void
     */
    public function showAction(\Skener\Bks\Domain\Model\Book $book)
    {
        $this->view->assign('book', $book);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     *
     * @param \Skener\Bks\Domain\Model\Book $newBook
     * @return void
     */
    public function createAction(\Skener\Bks\Domain\Model\Book $newBook)
    {
        $this->addFlashMessage(
            'The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        //debug($newBook);
        $this->bookRepository->add($newBook);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Skener\Bks\Domain\Model\Book $book
     * @ignorevalidation $book
     * @return void
     */
    public function editAction(\Skener\Bks\Domain\Model\Book $book)
    {
        $this->view->assign('book', $book);
    }

    /**
     * action update
     *
     * @param \Skener\Bks\Domain\Model\Book $book
     * @return void
     */
    public function updateAction(\Skener\Bks\Domain\Model\Book $book)
    {
        $this->addFlashMessage(
            'The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->bookRepository->update($book);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Skener\Bks\Domain\Model\Book $book
     * @return void
     */
    public function deleteAction(\Skener\Bks\Domain\Model\Book $book)
    {
        $this->addFlashMessage(
            'The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->bookRepository->remove($book);
        $this->redirect('list');
    }
}
