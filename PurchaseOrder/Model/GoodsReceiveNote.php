<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\GoodsReceiveNote as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class GoodsReceiveNote extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'goods_receive_note_model';

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
