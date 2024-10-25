define([
    'ko',
    'Magento_Ui/js/form/element/select',
    'uiRegistry'
], function (ko, Component, uiRegistry) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            let self = this;
            this.value.subscribe(function (value) {
                if (value !== undefined) {
                    const options = self.options();
                    let option;
                    for (let i = 0; i < options.length; i++) {
                        if (options[i].value == value) {
                            option = options[i];
                            break;
                        }
                    }
                    uiRegistry.get('purchase_order_form.purchase_order_form.general.vendor_name').value(option.templateData.vendor_name);
                    const items = option.items;

                    let records = [];
                    for (let i = 0; i < items.length; i++) {
                        records.push({
                            qty: parseInt(items[i].qty),
                            record_id: i,
                            item_name: items[i].product_id
                        });
                    }
                    uiRegistry.get('purchase_order_form.purchase_order_form.purchase_order_items_container.purchase_order_items').recordData(records);
                    for (let i = 0; i < items.length; i++) {
                        uiRegistry.get('purchase_order_form.purchase_order_form.purchase_order_items_container.purchase_order_items').addChild(
                            {
                                qty: items[i].qty,
                                item_name: items[i].product_id
                            },
                            i
                        )
                    }

                }
            });
            return this;
        }
    });
});
