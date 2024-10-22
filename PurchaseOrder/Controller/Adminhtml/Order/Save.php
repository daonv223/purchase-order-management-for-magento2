<?php

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Order;

use Magento\Backend\App\Action\Context;
use Magento\Catalog\Model\ProductRepository;
use Magento\Framework\App\Action\HttpPostActionInterface;
use DaoNguyen\PurchaseOrder\Model\PurchaseOrderFactory;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrder as ResourcePurchaseOrder;
use DaoNguyen\PurchaseOrder\Model\PurchaseOrderItemFactory;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem as ResourcePurchaseOrderItem;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    public function __construct(
        Context $context,
        private PurchaseOrderFactory $purchaseOrderFactory,
        private ResourcePurchaseOrder $resourcePurchaseOrder,
        private PurchaseOrderItemFactory $purchaseOrderItemFactory,
        private ProductRepository $productRepository,
        private ResourcePurchaseOrderItem $resourcePurchaseOrderItem
    ) {
        parent::__construct($context);
    }


    public function execute()
    {
        $redirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        $purchaseOrder = $this->purchaseOrderFactory->create();
        $purchaseOrder->setData('vendor_name', $data['vendor_name']);
        $purchaseOrder->setStatus('draft');
        $this->resourcePurchaseOrder->save($purchaseOrder);
        $poNumber = 'PO000' . $purchaseOrder->getId();
        $purchaseOrder->setData('po_number', $poNumber);
        $this->resourcePurchaseOrder->save($purchaseOrder);
        $items =  $this->getRequest()->getPostValue('purchase_order_items');
        $total = 0;
        foreach ($items as $item) {
            $productId = (int) $item['item_name'];
            $qty = (int) $item['qty'];
            $product = $this->productRepository->getById($productId);

            $purchaseOrderItemModel = $this->purchaseOrderItemFactory->create();
            $purchaseOrderItemModel->setPurchaseId($purchaseOrder->getId());
            $purchaseOrderItemModel->setProductId($productId);
            $purchaseOrderItemModel->setQty($qty);
            $purchaseOrderItemModel->setItemName($product->getName());
            $purchaseOrderItemModel->setPrice($product->getPrice());
            $rowTotal = $product->getPrice() * $qty;
            $total += $rowTotal;
            $purchaseOrderItemModel->setRowTotal($rowTotal);
            $this->resourcePurchaseOrderItem->save($purchaseOrderItemModel);
        }
        $purchaseOrder->setTotal($total);
        $this->resourcePurchaseOrder->save($purchaseOrder);
        return $redirect->setPath('*/*/status');
    }
}
