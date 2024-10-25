<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\PurchaseTemplate;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate\CollectionFactory;

class ViewDataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    private $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        private CollectionFactory $purchaseTemplateCollectionFactory,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
        $this->collection = $this->purchaseTemplateCollectionFactory->create();
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var PurchaseOrder $purchase */
        foreach ($items as $purchase) {
            $this->loadedData[$purchase->getId()] = $purchase->getData();
            $items = $purchase->getItems();
            foreach ($items as $item) {
                $this->loadedData[$purchase->getId()]['purchase_template_items'][] = [
                    'item_name' => $item['item_name'],
                    'qty' => $item['qty'],
                ];
            }
        }
        return $this->loadedData;
    }
}
