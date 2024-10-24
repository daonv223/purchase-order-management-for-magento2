<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate;

use DaoNguyen\PurchaseOrder\Model\PurchaseTemplate as Model;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_template_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
