<?php

namespace Module\StoreInventory\Controller;

use Module\StoreInventory\Domain\Model\Product;
use Module\StoreInventory\Domain\Repository\CategoryRepository;
use Module\StoreInventory\Domain\Repository\ProductRepository;
use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Module\StoreInventory\Property\TypeConverter\UploadedFileReferenceConverter;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;

/**
 * Class BackStoreInventoryController
 *
 * @package MyVendor\BackStoreInventory\Controller
 */
class StoreInventoryController extends ActionController
{


    /**
     * @var ProductRepository
     */
    private $productRepository;


    /**
     * Categories
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Module\StoreInventory\Domain\Model\Category>
     */
    protected $categories;

    /**
     * Inject the product repository
     *
     * @param \Module\StoreInventory\Domain\Repository\ProductRepository $productRepository
     */
    public function injectProductRepository(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }




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
     * List Action
     *
     * @return void
     */
    public function listAction()
    {
        $products = $this->productRepository->findAll();
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('products', $products)->assign('categories', $categories);
    }

    public function newAction(Product $products = null)
    {
        $newProduct = new \Module\StoreInventory\Domain\Model\Product();
        $this->view->assign('products', $products)->assign('newProduct', $newProduct);
    }

    public function editAction(Product $product)
    {
        $this->view->assign('product', $product);
    }

    public function updateAction(Product $product)
    {
        $this->productRepository->update($product);
        $this->addFlashMessage('Product was updated.');
        $this->redirect('list', 'StoreInventory');
    }


    /**
     * Show action
     *
     * @param \Module\StoreInventory\Domain\Model\Product $product The offer to be shown
     * @return string The rendered HTML string
     */
    public function showAction(Product $product)
    {
        $this->view->assign('product', $product);
    }


    public function storeAction(Product $product)
    {
        $this->productRepository->add($product);
        $this->addFlashMessage('');
        $this->redirect('list', 'StoreInventory');
    }

    public function deleteAction(Product $product)
    {
        $this->productRepository->remove($product);
        $this->addFlashMessage('Product was removed.');
        $this->redirect('list');
    }


    /**
     * Set TypeConverter option for file upload
     */
    public function initializeStoreAction()
    {
        $this->setTypeConverterConfigurationForImageUpload('product');
    }


    protected function setTypeConverterConfigurationForImageUpload($argumentName)
    {
        $uploadConfiguration = [
            UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => $GLOBALS['TYPO3_CONF_VARS']['GFX']['png'],
            UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/content/',
        ];
        /** @var PropertyMappingConfiguration $newExampleConfiguration */
        $newExampleConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();
        $newExampleConfiguration->forProperty('image')
            ->setTypeConverterOptions(
//                'MyVendor\\StoreInventory\\Domain\\Property\\TypeConverter\\UploadedFileReferenceConverter',
                UploadedFileReferenceConverter::class,
                $uploadConfiguration
            );
        $newExampleConfiguration->forProperty('imageCollection.0')
            ->setTypeConverterOptions(
                UploadedFileReferenceConverter::class,
                $uploadConfiguration
            );
    }

}
