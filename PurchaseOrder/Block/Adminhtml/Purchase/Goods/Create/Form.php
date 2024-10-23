<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Block\Adminhtml\Purchase\Goods\Create;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use DaoNguyen\PurchaseOrder\Model\PurchaseOrderFactory;
use Magento\Framework\Json\Helper\Data as JsonHelper;
use Magento\Directory\Helper\Data as DirectoryHelper;

class Form extends \Magento\Backend\Block\Template
{
    public function __construct(
        private PurchaseOrderFactory $purchaseOrderFactory,
        \Magento\Backend\Block\Template\Context $context,
        array $data = [],
        ?JsonHelper $jsonHelper = null,
        ?DirectoryHelper $directoryHelper = null
    ) {
        parent::__construct($context, $data, $jsonHelper, $directoryHelper);
    }

    public function getSaveUrl()
    {
        return $this->getUrl('*/*/save', ['purchase_id' => $this->getRequest()->getParam('purchase_id')]);
    }

    public function getItems()
    {
        $purchaseId = $this->getRequest()->getParam('purchase_id');
        /** @var PurchaseOrder $purchase */
        $purchase = $this->purchaseOrderFactory->create();
        $purchase->load($purchaseId);
        return $purchase->getItems();
    }

    protected function _beforeToHtml()
    {
        $this->addChild(
            'submit_button',
            \Magento\Backend\Block\Widget\Button::class,
            [
                'label' => __('Create CRN'),
                'class' => 'save submit-button primary',
                'onclick' => 'submitGRN(this);'
            ]
        );

        return parent::_beforeToHtml();
    }
}
