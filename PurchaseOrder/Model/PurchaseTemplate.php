<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrderItem\Collection;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate as ResourceModel;
use Magento\Framework\Model\AbstractModel;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplateItem\CollectionFactory;

class PurchaseTemplate extends AbstractModel
{
    public function __construct(
        private CollectionFactory $itemCollectionFactory,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }



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

    public function getItems()
    {
        /** @var Collection $itemCollection */
        $itemCollection = $this->itemCollectionFactory->create();
        $itemCollection->addFieldToFilter('template_id', $this->getId());
        return $itemCollection->getItems();
    }
}
