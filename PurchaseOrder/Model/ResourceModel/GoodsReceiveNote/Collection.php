<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel\GoodsReceiveNote;

use DaoNguyen\PurchaseOrder\Model\GoodsReceiveNote as Model;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\GoodsReceiveNote as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'goods_receive_note_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
