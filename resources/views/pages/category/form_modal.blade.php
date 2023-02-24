<x-modal id="add-category-modal" title="{{__('admin.add') . ' ' . __('common.category')}}" uri="categories" dataTableId="category-table">
    <x-slot name="body">
        @include('pages.category.form')
    </x-slot>

    <x-slot name="metaJS">
        <script>
            payload = {
                name: "category-name"
            }
            required = {
                name: "category-name"
            }
        </script>
    </x-slot>
</x-modal>

