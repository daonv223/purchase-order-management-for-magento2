<?php

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Order;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class NewAction extends Action
{
    public function __construct(Context $context, private PageFactory $resultPageFactory)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DaoNguyen_PurchaseOrder::create');
        $resultPage->getConfig()->getTitle()->prepend(__('Create New Purchase Order'));
        return $resultPage;
    }
}
