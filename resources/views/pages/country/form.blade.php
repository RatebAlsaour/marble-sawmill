<form class="p-4" id="user-form" action="@yield('formm-route')" method="post">
    @csrf
    @yield('formm-method')


    <x-input id="country-name" label="{{ __('name')}}" name="name" :entity="$country ?? ''" />

    {{--<x-select id="user-programs" label="{{ __('admin.programs')}}" visibility="false" name="programs_ids[]" type="multiple" :resources="$programs" :entity_id="$user_programs_ids ?? 0" />--}}


</form>

@push('plugin-scripts')
    <script>
        $(document).ready(() => {

        @if(isset($source) && $source == 'update')
        $("#user-form :input").change(function() {
            $("#user-form").attr("changed",true);
        });

        $('#btn-cancel').on('click', function (e) {
            if ($("#user-form").attr("changed") === "true") {
                if (confirm("{{__('messages.do_you_want_to_save_the_changes')}}")) {
                    e.preventDefault()
                    $("#user-form").submit();

                }
            }
        })
        @endif



        })
    </script>
@endpush
