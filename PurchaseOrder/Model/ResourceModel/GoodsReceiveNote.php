<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class GoodsReceiveNote extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'goods_receive_note_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('goods_receive_note', 'receive_id');
        $this->_useIsObjectNew = true;
    }
}
