<?php

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrderItem as Model;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_order_item_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
