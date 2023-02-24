<x-modal id="add-supplier-invoice-modal" title="{{__('admin.add') . ' ' . __('admin.supplier_invoice')}}" uri="/supplier-invoices" dataTableId="supplier-invoices-table">
    <x-slot name="body">
        @include('pages.supplier_invoice.form',['currencies' => $currencies , 'suppliers' => $suppliers , 'countries'=> $countries])
    </x-slot>
    <x-slot name="metaJS">
        <script>
            payload = {
                supplier_id : "supplier-invoice-supplier-id",
                country_id : "supplier-invoice-country-id",
                custom_cost : "supplier-invoice-custom-cost",
                ship_cost : "supplier-invoice-ship-cost",
                metric_type : "supplier-invoice-metric-type",
                currency_id : "supplier-invoice-currency-id",
                amount : "supplier-invoice-amount",
            }
            required = {
                supplier_id : "supplier-invoice-supplier-id",
                country_id : "supplier-invoice-country-id",
                custom_cost : "supplier-invoice-custom-cost",
                ship_cost : "supplier-invoice-ship-cost",
                metric_type : "supplier-invoice-metric-type",
                currency_id : "supplier-invoice-currency-id",
                amount : `supplier-invoice-amount`,
            }
        </script>
    </x-slot>
</x-modal>

