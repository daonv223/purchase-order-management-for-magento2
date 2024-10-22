<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Ui\Component\Form;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseOrder\CollectionFactory;

class ViewDataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        private CollectionFactory $puchaseCollectionFactory,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
        $this->collection = $this->puchaseCollectionFactory->create();
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
                $this->loadedData[$purchase->getId()]['purchase_order_items'][] = [
                    'item_name' => $item['item_name'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                    'row_total' => $item['row_total']
                ];
            }
        }
        return $this->loadedData;
    }
}
