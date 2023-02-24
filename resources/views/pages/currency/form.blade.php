<form class="p-4" id="currency-form" action="@yield('form-route')" method="post">
    @csrf
    @yield('form-method')

    <x-input id="currency-name" label="{{ __('common.currency')}}" name="name" :entity="$currency ?? ''"/>

    @if(isset($source) && $source == 'update')
    <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update')}}</button>
    <a id="btn-cancel" href="{{route('currencies.index')}}"
       class="btn btn-light">{{__('admin.cancel')}}</a>
@endif
</form>

@push('plugin-scripts')
    <script>
        $(document).ready(() => {
        @if(isset($source) && $source == 'update')
        $("#currency-form :input").change(function() {
            $("#currency-form").attr("changed",true);
        });
        @endif
        })
    </script>
@endpush
