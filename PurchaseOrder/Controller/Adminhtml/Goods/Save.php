<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Goods;

use DaoNguyen\PurchaseOrder\Model\GoodsReceiveNote;
use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use Magento\Framework\App\Action\HttpPostActionInterface;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        foreach ($data['grn']['items'] as $purchase_item_id => $data) {
            $grn = $this->_objectManager->create(GoodsReceiveNote::class);
            $grn->setItemId($purchase_item_id);
            $grn->setQty($data['qty']);
            $grn->setVendorInvoiceNo($data['no']);
            $grn->save();
        }
        $redirect = $this->resultRedirectFactory->create();
        return $redirect->setPath('*/*/archive');
    }
}
