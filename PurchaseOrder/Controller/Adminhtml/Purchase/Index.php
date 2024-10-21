<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Purchase;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'DaoNguyen_PurchaseOrder::dashboard';

    public function __construct(Context $context, private PageFactory $pageFactory)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('DaoNguyen_PurchaseOrder::dashboard');
        $resultPage->addBreadcrumb(__('Purchase Management'), __('Purchase Management'));
        $resultPage->getConfig()->getTitle()->prepend(__('Purchase Management'));

        return $resultPage;
    }
}
