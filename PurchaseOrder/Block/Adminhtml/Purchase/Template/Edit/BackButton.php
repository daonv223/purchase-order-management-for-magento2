<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Block\Adminhtml\Purchase\Template\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class BackButton implements ButtonProviderInterface
{
    public function __construct(private Context $context)
    {
    }

    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    private function getBackUrl()
    {
        return $this->context->getUrlBuilder()->getUrl('*/*/status');
    }
}
