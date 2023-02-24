<form class="p-4" id="supplier-invoice-form" action="@yield('form-route')" method="post">
    @csrf
    @yield('form-method')
    <x-select id="supplier-invoice-supplier-id" label="{{ __('common.supplier_name')}}" name="supplier_id" :resources="$suppliers" :entity="$supplierInvoice ?? ''"  />

    <x-select id="supplier-invoice-country-id" label="{{ __('common.country_name')}}" name="country_id" :resources="$countries" :entity="$supplierInvoice ?? ''" />

    <x-input id="supplier-invoice-custom-cost" label="{{ __('common.custom_cost')}}" name="custom_cost"  type="number" :entity="$supplierInvoice ?? ''"/>

   <x-input id="supplier-invoice-amount" label="{{ __('common.amount')}}" name="amount" type="number" :entity="$supplierInvoice ?? ''" />

    <x-input id="supplier-invoice-metric-type" label="{{ __('common.metric_type')}}" name="metric_type" type="text" :entity="$supplierInvoice ?? ''"  />

   <x-input id="supplier-invoice-ship-cost" label="{{ __('common.ship_cost')}}" name="ship_cost" type="number" :entity="$supplierInvoice ?? ''" />

  <x-select id="supplier-invoice-currency-id" label="{{ __('common.currency')}}" name="currency_id" :resources="$currencies" :entity="$supplierInvoice ??   ''  " />

{{--    <x-select id="user-programs" label="{{ __('admin.programs')}}" visibility="false" name="programs_ids[]" type="multiple" :resources="$programs" :entity_id="$user_programs_ids ?? 0" />--}}

    @if(isset($source) && $source == 'update')
        <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update')}}</button>
        <a id="btn-cancel" href="{{route('supplier-invoices.index')}}"
           class="btn btn-light">{{__('admin.cancel')}}</a>
    @endif

</form>

@push('plugin-scripts')
    <script>
        $(document).ready(() => {

        @if(isset($source) && $source == 'update')
        $("#supplier-invoice-form :input").change(function() {
            $("#supplier-invoice-form").attr("changed",true);
        });

        @endif
        })
    </script>
@endpush
