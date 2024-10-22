<?php

namespace DaoNguyen\PurchaseOrder\Model;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class PurchaseOrderItem extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_order_item_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}
