<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\ObjectManager;

class Product implements \Magento\Framework\Data\OptionSourceInterface
{
    public function toOptionArray()
    {
        $objectManager =  ObjectManager::getInstance();
        $productCollection = $objectManager->get(CollectionFactory::class)->create();
        $productCollection->addAttributeToSelect(ProductInterface::NAME);
        $productById = [];
        /** @var  ProductInterface $product */
        foreach ($productCollection as $product) {
            $productId = $product->getId();
            $productById[] = [
                'value' => $productId,
                'label' => $product->getName()
            ];
        }
        return $productById;
    }
}
