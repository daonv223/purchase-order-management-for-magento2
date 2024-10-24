<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Block\Adminhtml\Purchase\Order\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class PrintButton implements ButtonProviderInterface
{
    public function __construct(private Context $context)
    {
    }

    public function getButtonData()
    {
        return [
            'label' => __('Print'),
            'on_click' => 'setLocation(\'' . $this->getPrintUrl() . '\')',
            'class' => 'print',
            'sort_order' => 20
        ];
    }

    private function getPrintUrl()
    {
        return $this->context->getUrlBuilder()->getUrl('*/*/print', ['purchase_id' => $this->context->getRequest()->getParam('purchase_id')]);
    }
}
