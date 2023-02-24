<form class="p-4" id="client-invoice-form" action="@yield('form-route')" method="post">
    @csrf
    @yield('form-method')

    <x-select id="client-invoice-category-id" label="{{ __('common.category')}}" name="category_id" :resources="$categories" :entity="$clientInvoice ?? ''" />

    <x-select id="clientInvoice-client-id" label="{{ __('common.client')}}" name="client_id" :resources="$clients" :entity="$clientInvoice ?? ''" />

    @if(isset($source) && $source == 'update')
    <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update')}}</button>
    <a id="btn-cancel" href="{{route('client-invoices.index')}}"
       class="btn btn-light">{{__('admin.cancel')}}</a>
    @endif
</form>

@push('plugin-scripts')
    <script>
        $(document).ready(() => {

        @if(isset($source) && $source == 'update')
        $("#client-invoice-form :input").change(function() {
            $("#client-invoice-form").attr("changed",true);
        });
        @endif
        })
    </script>
@endpush
