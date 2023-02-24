<x-modal id="add-currency-modal" title="{{__('admin.add') . ' ' . __('common.currency')}}" uri="currencies" dataTableId="curencies-table">
    <x-slot name="body">
        @include('pages.currency.form',['source'=>'update'])
    </x-slot>

    <x-slot name="metaJS">
        <script>
            payload = {
                name: "currency-name"
            }
            required = {
                name: "currency-name"
           }
        </script>
    </x-slot>
</x-modal>

