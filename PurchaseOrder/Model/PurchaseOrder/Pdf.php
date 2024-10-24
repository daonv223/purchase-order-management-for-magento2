<?php
declare(strict_types=1);

namespace DaoNguyen\PurchaseOrder\Model\PurchaseOrder;

use DaoNguyen\PurchaseOrder\Model\PurchaseOrder;
use Magento\Sales\Model\Order\Pdf\AbstractPdf;

class Pdf extends AbstractPdf
{
    public function getPdf(PurchaseOrder $purchaseOrder = null)
    {
        $pdf = new \Zend_Pdf();
        $this->_setPdf($pdf);
        $page = $this->newPage();

        $top = $this->y;
        $page->setFillColor(new \Zend_Pdf_Color_GrayScale(0.45));
        $page->setLineColor(new \Zend_Pdf_Color_GrayScale(0.45));
        $page->drawRectangle(25, $top, 570, $top - 65);
        $page->setFillColor(new \Zend_Pdf_Color_GrayScale(1));
        $this->setDocHeaderCoordinates([25, $top, 570, $top - 55]);
        $this->_setFontRegular($page, 10);


        $page->drawText('Purchase Order # ' . $purchaseOrder->getPoNumber(), 35, $top -= 15, 'UTF-8');
        $page->drawText('Date: ' . $purchaseOrder->getCreatedAt(), 35, $top -= 15, 'UTF-8');
        $page->drawText('Vendor Name: ' . $purchaseOrder->getVendorName(), 35, $top -= 15, 'UTF-8');
        $page->drawText('Total: ' . $purchaseOrder->getTotal(), 35, $top -= 15, 'UTF-8');
        $top -= 15;
        $this->y = $top;

        $this->_setFontRegular($page, 10);
        $page->setFillColor(new \Zend_Pdf_Color_Rgb(0.93, 0.92, 0.92));
        $page->setLineColor(new \Zend_Pdf_Color_GrayScale(0.5));
        $page->setLineWidth(0.5);
        $page->drawRectangle(25, $this->y, 570, $this->y - 15);
        $this->y -= 10;
        $page->setFillColor(new \Zend_Pdf_Color_Rgb(0, 0, 0));

        $lines[0][] = ['text' => __('Item Name'), 'feed' => 35];

        $lines[0][] = ['text' => __('Unit Price'), 'feed' => 250, 'align' => 'right'];

        $lines[0][] = ['text' => __('Qty'), 'feed' => 435, 'align' => 'right'];

        $lines[0][] = ['text' => __('Subtotal'), 'feed' => 565, 'align' => 'right'];

        $lineBlock = ['lines' => $lines, 'height' => 5];
        $this->drawLineBlocks($page, [$lineBlock], ['table_header' => true]);

        $this->y -= 10;

        $itemLines = [];
        $i = 0;
        foreach ($purchaseOrder->getItems() as $item) {
            $itemLines[$i][] = ['text' => $item->getItemName(), 'feed' => 35];
            $itemLines[$i][] = ['text' => $item->getPrice(), 'feed' => 250, 'align' => 'right'];
            $itemLines[$i][] = ['text' => $item->getQty(), 'feed' => 435, 'align' => 'right'];
            $itemLines[$i][] = ['text' => $item->getRowTotal(), 'feed' => 565, 'align' => 'right'];
            $i++;
        }
        $lines = ['lines' => $itemLines, 'height' => 20, 'shift' => 5];
        $this->drawLineBlocks($page, [$lines], ['table_header' => true]);
        return $pdf;
    }
}
