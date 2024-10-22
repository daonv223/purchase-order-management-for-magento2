<?php

namespace DaoNguyen\PurchaseOrder\Model;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrder as ResourceModel;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem\Collection;
use Magento\Framework\Model\AbstractModel;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem\CollectionFactory;

class PurchaseOrder extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'purchase_order_model';

    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        private CollectionFactory $itemCollectionFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }


    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getItems()
    {
        /** @var Collection $itemCollection */
        $itemCollection = $this->itemCollectionFactory->create();
        $itemCollection->addFieldToFilter('purchase_id', $this->getId());
        return $itemCollection->getItems();
    }
}
