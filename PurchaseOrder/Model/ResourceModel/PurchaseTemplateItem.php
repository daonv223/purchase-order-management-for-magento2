<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class PurchaseTemplateItem extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_template_item_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('purchase_template_item', 'item_id');
        $this->_useIsObjectNew = true;
    }
}
