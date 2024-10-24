<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class PurchaseTemplate extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_template_model';

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
