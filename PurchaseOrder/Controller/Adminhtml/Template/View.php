<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Controller\Adminhtml\Template;

use DaoNguyen\PurchaseOrder\Model\PurchaseTemplate;
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
        $id = $this->getRequest()->getParam('template_id');
        $model = $this->_objectManager->create(PurchaseTemplate::class);
        $model->load($id);

        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('DaoNguyen_PurchaseOrder::management');
        $resultPage->getConfig()->getTitle()->prepend('Template: ' . $model->getTitle());
        return $resultPage;
    }
}
