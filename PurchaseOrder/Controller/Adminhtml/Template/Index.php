<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Template;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    public function __construct(Context $context, private PageFactory $resultPageFactory)
    {
        parent::__construct($context);
    }


    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DaoNguyen_PurchaseOrder::po_template');
        $resultPage->getConfig()->getTitle()->prepend(__('PO Template'));
        return $resultPage;
    }
}
