<?php

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PurchaseOrder extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_order_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('purchase_order', 'purchase_id');
        $this->_useIsObjectNew = true;
    }
}
