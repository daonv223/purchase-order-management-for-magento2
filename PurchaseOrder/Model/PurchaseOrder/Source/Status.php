<?php

namespace DaoNguyen\PurchaseOrder\Model\PurchaseOrder\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'draft', 'label' => 'Draft'],
            ['value' => 'pending', 'label' => 'Pending'],
            ['value' => 'approved', 'label' => 'Approved'],
            ['value' => 'sent', 'label' => 'Sent'],
            ['value' => 'rejected', 'label' => 'Rejected'],
            ['value' => 'received', 'label' => 'Received']
        ];
    }
}
