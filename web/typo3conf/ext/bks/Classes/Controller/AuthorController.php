<?php
namespace Skener\Bks\Controller;


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
 * AuthorController
 */
class AuthorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $authors = $this->authorRepository->findAll();
        $this->view->assign('authors', $authors);
    }

    /**
     * action show
     * 
     * @param \Skener\Bks\Domain\Model\Author $author
     * @return void
     */
    public function showAction(\Skener\Bks\Domain\Model\Author $author)
    {
        $this->view->assign('author', $author);
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
     * @param \Skener\Bks\Domain\Model\Author $newAuthor
     * @return void
     */
    public function createAction(\Skener\Bks\Domain\Model\Author $newAuthor)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->authorRepository->add($newAuthor);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \Skener\Bks\Domain\Model\Author $author
     * @ignorevalidation $author
     * @return void
     */
    public function editAction(\Skener\Bks\Domain\Model\Author $author)
    {
        $this->view->assign('author', $author);
    }

    /**
     * action update
     * 
     * @param \Skener\Bks\Domain\Model\Author $author
     * @return void
     */
    public function updateAction(\Skener\Bks\Domain\Model\Author $author)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->authorRepository->update($author);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \Skener\Bks\Domain\Model\Author $author
     * @return void
     */
    public function deleteAction(\Skener\Bks\Domain\Model\Author $author)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->authorRepository->remove($author);
        $this->redirect('list');
    }
}
