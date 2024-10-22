<?php

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PurchaseOrderItem extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_order_item_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('purchase_order_item', 'item_id');
        $this->_useIsObjectNew = true;
    }
}
