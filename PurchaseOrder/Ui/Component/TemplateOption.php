<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Ui\Component;

use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplate\CollectionFactory;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplateItem\Collection;
use DaoNguyen\PurchaseOrder\Model\ResourceModel\PurchaseTemplateItem\CollectionFactory as ItemCollectionFactory;

class TemplateOption implements \Magento\Framework\Data\OptionSourceInterface
{
    public function __construct(
        private CollectionFactory $templateCollectionFactory,
        private ItemCollectionFactory $itemCollectionFactory
    )
    {
    }

    public function toOptionArray()
    {
        $collection = $this->templateCollectionFactory->create();
        $options = [
            ['value' => '', 'label' => 'Please Select']
        ];
        foreach ($collection as $template) {
            /** @var Collection $itemCollection */
            $itemCollection = $this->itemCollectionFactory->create();
            $itemCollection->addFieldToFilter('template_id', $template->getId());
            $options[] = [
                'label' => $template->getTitle(),
                'value' => $template->getId(),
                'templateData' => $template->getData(),
                'items' => $itemCollection->getData()
            ];
        }
        return $options;
    }
}
