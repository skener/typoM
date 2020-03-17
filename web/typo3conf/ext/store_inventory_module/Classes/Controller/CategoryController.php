<?php


namespace Module\StoreInventory\Controller;


use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Module\StoreInventory\Domain\Repository\CategoryRepository;

class CategoryController extends ActionController
{


    /**
     * @var CategoryRepository
     */
    private $categoryRepository = null;

    /**
     * Inject the book repository
     *
     * @param \Module\StoreInventory\Domain\Repository\CategoryRepository $categoryRepository
     */
    public function injectCategoryRepository(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }



    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('authors', $categories);
    }

    /**
     * action show
     *
     * @param \Module\StoreInventory\Domain\Model\Category $category
     * @return void
     */
    public function showAction(\Module\StoreInventory\Domain\Model\Category $category)
    {
        $this->view->assign('category', $category);
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
     * @param \Module\StoreInventory\Domain\Model\Category $newCategory
     * @return void
     */
    public function createAction(\Module\StoreInventory\Domain\Model\Category $newCategory)
    {
        $this->addFlashMessage(
            'The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->categoryRepository->add($newCategory);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Module\StoreInventory\Domain\Model\Category $category
     * @ignorevalidation $category
     * @return void
     */
    public function editAction(\Module\StoreInventory\Domain\Model\Category $category)
    {
        $this->view->assign('category', $category);
    }

    /**
     * action update
     *
     * @param \Module\StoreInventory\Domain\Model\Category $category
     * @return void
     */
    public function updateAction(\Module\StoreInventory\Domain\Model\Category $category)
    {
        $this->addFlashMessage(
            'The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->categoryRepository->update($category);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Module\StoreInventory\Domain\Model\Category $category
     * @return void
     */
    public function deleteAction(\Module\StoreInventory\Domain\Model\Category $category)
    {
        $this->addFlashMessage(
            'The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html',
            '',
            \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING
        );
        $this->categoryRepository->remove($category);
        $this->redirect('list');
    }
}
