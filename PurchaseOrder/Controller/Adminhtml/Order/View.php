<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Order;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends Action
{
    public function __construct(Context $context, private PageFactory $resultPageFactory)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('purchase_id');
        $model = $this->_objectManager->create(PurchaseOrder::class);
        $model->load($id);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DaoNguyen_PurchaseOrder::management');
        $resultPage->getConfig()->getTitle()->prepend($model->getPoNumber());
        return $resultPage;
    }
}
