<form class="p-4" id="cost-form" action="@yield('form-route')" method="post">
    @csrf
    @yield('form-method')

    <x-input id="cost-type" label="{{ __('common.type')}}" name="type" :entity="$cost ?? ''"/>
    <x-input id="cost-cost" label="{{ __('common.cost')}}" name="cost" :entity="$cost ?? ''" />

    {{--<x-select id="user-programs" label="{{ __('admin.programs')}}" visibility="false" name="programs_ids[]" type="multiple" :resources="$programs" :entity_id="$user_programs_ids ?? 0" />--}}
    @if(isset($source) && $source == 'update')
    <button type="submit" class="btn btn-primary mr-2">{{ __('admin.update')}}</button>
    <a id="btn-cancel" href="{{route('costs.index')}}"
       class="btn btn-light">{{__('admin.cancel')}}</a>
    @endif
</form>

@push('plugin-scripts')
    <script>
        $(document).ready(() => {
        @if(isset($source) && $source == 'update')
        $("#cost-form :input").change(function() {
            $("#cost-form").attr("changed",true);
        });
        @endif
        })
    </script>
@endpush
