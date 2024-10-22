<?php

namespace DaoNguyen\PurchaseOrder\Model\PurchaseOrder\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Vendor implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '', 'label' => 'Default'],
            ['value' => 'US Foods', 'label' => 'US Foods'],
            ['value' => 'McLane Company', 'label' => 'McLane Company'],
            ['value' => 'Sysco', 'label' => 'Sysco']
        ];
    }
}
