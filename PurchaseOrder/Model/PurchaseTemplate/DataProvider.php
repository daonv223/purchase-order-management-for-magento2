<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\PurchaseTemplate;

use Magento\Ui\DataProvider\AbstractDataProvider;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate\CollectionFactory;

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
