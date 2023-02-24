<div class="modal fade" id="{{isset($id) ? $id : 'modal-id'}}" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog {{$modal_size ?? '' }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">{{isset($title) ? $title : 'modal-title'}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow:hidden;">
                {{isset($body) ? $body : 'modal-body'}}

                <img width=" " height="75px" id='loaderImage' src="{{asset('assets/images/ajax-loader.gif')}}"
                     style="display: none; margin: 0 auto; position: absolute; top:50%; left: 50%;"/>
            </div>

            <div class="modal-footer">
                @if(isset($footer))
                    {{$footer}}
                @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('common.cancel')}}</button>
                    <button id="btn-{{isset($id) ? $id : ''}}-submit" type="button"
                            class="btn btn-primary">{{__('common.add')}}</button>
                @endif

            </div>
        </div>
    </div>
</div>

@push('plugin-scripts')
    <script>
        if(typeof binding === 'undefined')
            var binding = {};
        if(typeof payload === 'undefined')
            var payload = {};
        if(typeof required === 'undefined')
            var required = {};
        if(typeof clearableSelects === 'undefined')
            var clearableSelects = {};
    </script>


    @isset($metaJS)
        {{$metaJS}}
    @endisset

    <script>

        $(document).ready(() => {
            var uri = "{{$uri}}"
            var _this = $(this)
            _this.uri = uri

        $('#btn-{{$id}}-submit').on('click', function (e) {
            if (!formValidation()) {
                toastr.warning("{{__('messages.missing_required_fields')}}", "{{__('common.warning')}}");
                return;
            }

            $('#loaderImage').show();

            // Preparing the payload
            let formData = new FormData()
            for (const [key, value] of Object.entries(payload)) {
                //check if the element's type is file
                if($("#" + value).attr('type') === 'file')
                    formData.append(key, $("#" + value)[0].files[0])
                else
                    formData.append(key, $("#" + value).val())
            }

            // check binding
            formBinding()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });


            $.ajax({
                url: `${_this.uri}`,
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (res) {
                    $('#loaderImage').hide();


                    toastr.success("{{__('messages.operation_succeeded')}}", "{{__('common.success')}}");

                    // Reset the form
                    $('#{{$id}}').find("input[type=text], input[type=password], input[type=email], input[type=number], textarea").val("");

                    // Reset Dropdownlist
                    for (const [key, value] of Object.entries(clearableSelects)) {
                        clearDropDownlistById(value);
                    }

                    $('#{{$dataTableId}}').DataTable().ajax.reload();

                    $('#{{$id}}').modal('hide');
                },
                error: function (xhr, status, error) {
                    $('#loaderImage').hide();
                    toastr.error(xhr.responseJSON.message, "{{__('common.error')}}");
                },
            });

        })


        function formValidation() {
            for (const [key, value] of Object.entries(required)) {
                if (!$("#" + value).val()) {
                    return false;
                }
            }
            return true;
        }

        function formBinding() {
            for (const [key, value] of Object.entries(binding)) {
                for (const [key2, value2] of Object.entries(value)) {
                    _this[key] = _this[key].replace(`:${value2}`, $(`#${value2}`).val())
                }
            }
        }

        });
    </script>
@endpush
