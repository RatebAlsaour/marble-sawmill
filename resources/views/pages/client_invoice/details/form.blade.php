<form class="p-4" id="client-invoice-form" action="@yield('form-route')" method="post">
    @csrf
    @yield('form-method')
    <x-input id="clientInvoiceDatils-block_symbol" label="{{ __('common.block_symbol')}}" name="block_symbol" :entity="$client_invoice_detail ?? ''" />
    <x-input id="clientInvoiceDatils-hieght" label="{{ __('common.hieght')}}" name="hieght" :entity="$client_invoice_detail ?? ''" />
    <x-input id="clientInvoiceDatils-width" label="{{ __('common.width')}}" name="width" :entity="$client_invoice_detail ?? ''" />
    <x-input id="clientInvoiceDatils-high" label="{{ __('common.high')}}" name="high" :entity="$client_invoice_detail ?? ''" />


    @if(isset($source) && $source == 'update')
    <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update')}}</button>
    <a id="btn-cancel" href="{{route('client-invoice-details.index',['clientInvoice'=>$clientInvoice->id])}}"
       class="btn btn-light">{{__('admin.cancel')}}<
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
