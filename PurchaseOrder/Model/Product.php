<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\App\ObjectManager;

class Product implements \Magento\Framework\Data\OptionSourceInterface
{
    public function toOptionArray()
    {
        $objectManager =  ObjectManager::getInstance();
        $productCollection = $objectManager->get(\Magento\Catalog\Model\ResourceModel\Product\CollectionFactory::class)->create();
        $totalValues = $productCollection->getSize();
        $productById = [];
        /** @var  ProductInterface $product */
        foreach ($productCollection as $product) {
            $productId = $product->getId();
            $productById[$productId] = [
                'value' => $productId,
                'label' => $product->getName(),
                'is_active' => $product->getStatus(),
                'path' => $product->getSku(),
                'optgroup' => false
            ];
        }
        return $productById;
    }
}
