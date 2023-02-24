<x-modal id="add-cost-modal" title="{{__('admin.add') . ' ' . __('common.cost')}}" uri="costs" dataTableId="costs-table">
    <x-slot name="body">
        @include('pages.cost.form')
    </x-slot>
    <x-slot name="metaJS">
        <script>
            payload = {
                cost: "cost-cost",
                type: "cost-type",
            }
            required = {
               cost: "cost-cost",
                type: "cost-type",
            }
        </script>
    </x-slot>
</x-modal>

