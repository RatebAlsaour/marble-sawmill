<x-modal id="add-country-modal" title="{{__('admin.add') . ' ' . __('admin.country')}}" uri="countries" dataTableId="countries-table">
    <x-slot name="body">
        @include('pages.country.form')
    </x-slot>

    <x-slot name="metaJS">
        <script>
            payload = {
                name: "country-name",
            }
            required = {
               name: "country-name",
            }
        </script>
    </x-slot>
</x-modal>

