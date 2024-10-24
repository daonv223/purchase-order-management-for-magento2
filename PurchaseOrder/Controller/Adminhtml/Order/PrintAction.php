<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Order;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\App\Filesystem\DirectoryList;

class PrintAction extends Action
{
    public function __construct(private FileFactory $fileFactory, Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $purchaseId = $this->getRequest()->getParam('purchase_id');
        $purchaseOrder = $this->_objectManager->create(PurchaseOrder::class)->load($purchaseId);
        $pdf = $this->_objectManager->create(PurchaseOrder\Pdf::class)->getPdf($purchaseOrder);
        $date = $this->_objectManager->get(
            \Magento\Framework\Stdlib\DateTime\DateTime::class
        )->date('Y-m-d_H-i-s');
        $fileContent = ['type' => 'string', 'value' => $pdf->render(), 'rm' => true];
        return $this->fileFactory->create(
            'invoice' . $date . '.pdf',
            $fileContent,
            DirectoryList::VAR_DIR,
            'application/pdf'
        );
    }
}
