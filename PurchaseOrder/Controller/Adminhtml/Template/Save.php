<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Template;

use DaoNguyen\PurchaseOrder\Model\PurchaseTemplate;
use DaoNguyen\PurchaseOrder\Model\PurchaseTemplateItem;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    public function execute()
    {
        $redirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        $template = $this->_objectManager->create(PurchaseTemplate::class);
        $template->setData('title', $data['title']);
        $template->setData('vendor_name', $data['vendor_name']);
        $template->save();
        $productRepository = $this->_objectManager->get(ProductRepositoryInterface::class);

        $items =  $this->getRequest()->getPostValue('purchase_template_items');
        foreach ($items as $item) {
            $productId = (int) $item['item_name'];
            $qty = (int) $item['qty'];
            $product = $productRepository->getById($productId);

            $purchaseTemplateItem = $this->_objectManager->create(PurchaseTemplateItem::class);
            $purchaseTemplateItem->setTemplateId($template->getId());
            $purchaseTemplateItem->setProductId($productId);
            $purchaseTemplateItem->setQty($qty);
            $purchaseTemplateItem->setItemName($product->getName());
            $purchaseTemplateItem->save();
        }

        return $redirect->setPath('purchase/order/status');
    }
}
