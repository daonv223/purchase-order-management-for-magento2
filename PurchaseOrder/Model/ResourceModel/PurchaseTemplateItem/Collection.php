<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplateItem;

use DaoNguyen\PurchaseOrder\Model\PurchaseTemplateItem as Model;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplateItem as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_template_item_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
