<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplateItem as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class PurchaseTemplateItem extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_template_item_model';

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
