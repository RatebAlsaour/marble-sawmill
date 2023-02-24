<x-modal id="add-client-invoice-modal" title="{{__('admin.add') . ' ' . __('common.details')}}" uri="client-invoices/1/client-invoice-details" dataTableId="clientInvoiceDetails-table">
    <x-slot name="body">
        @include('pages.client_invoice.details.form',['clientInvoice' =>$clientInvoice ])
    </x-slot>
 <@php

 @endphp
    <x-slot name="metaJS">
        <script>
            payload = {
                block_symbol:"clientInvoiceDatils-block_symbol"
                hieght:"clientInvoiceDatils-hieght"
                width:"clientInvoiceDatils-width"
                high:"clientInvoiceDatils-high"
            }
            required = {
                block_symbol:"clientInvoiceDatils-block_symbol"
                hieght:"clientInvoiceDatils-hieght"
                width:"clientInvoiceDatils-width"
                high:"clientInvoiceDatils-high"
            }
        </script>
    </x-slot>
</x-modal>

