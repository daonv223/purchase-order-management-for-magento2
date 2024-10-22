<?php

namespace DaoNguyen\PurchaseOrder\Model\PurchaseOrder;

use Magento\Ui\DataProvider\AbstractDataProvider;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrder\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $purchaseOrderCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $purchaseOrderCollectionFactory->create();
    }


    public function getData()
    {
        return [];
    }
}
