<x-modal id="add-client-invoice-modal" title="{{__('admin.add') . ' ' . __('common.clientInvoice')}}" uri="client-invoices" dataTableId="client-invoices-table">
    <x-slot name="body">
        @include('pages.client_invoice.form', ['clients' => $clients ,'categories'=>$categories])
    </x-slot>

    <x-slot name="metaJS">
        <script>
            payload = {
                client_id: "clientInvoice-client-id",
                category_id: "client-invoice-category-id"
            }
            required = {
                client_id: "clientInvoice-client-id",
                category_id: "client-invoice-category-id"
            }
        </script>
    </x-slot>
</x-modal>

