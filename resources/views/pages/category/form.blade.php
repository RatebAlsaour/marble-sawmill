<form class="p-4" id="category-form" action="@yield('form-route')" method="post">
    @csrf
    @yield('form-method')

    <x-input id="category-name" label="{{ __('common.name')}}" name="name" :entity="$category ?? ''"/>

    @if(isset($source) && $source == 'update')
    <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update')}}</button>
    <a id="btn-cancel" href="{{route('categories.index')}}"
       class="btn btn-light">{{__('admin.cancel')}}</a>
    @endif

</form>

@push('plugin-scripts')
    <script>
        $(document).ready(() => {

        @if(isset($source) && $source == 'update')
        $("#category-form:input").change(function() {
            $("#category-form").attr("changed",true);
        });
        @endif
        })
    </script>
@endpush
