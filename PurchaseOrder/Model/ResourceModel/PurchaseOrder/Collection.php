<?php

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrder;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder as Model;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrder as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_order_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
