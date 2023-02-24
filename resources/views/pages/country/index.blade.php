@extends('layout.master')
@section('content')
    @include('layout.datatable')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">{{__('common.home')}}</a></li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="d-flex justify-content-between  mb-4 float-right">
                            <div class="row w-100 mx-0">
                                <div class="px-0">
                                    {{--<div class="col-md-3 px-0 btn-group mb-3">--}}
                                    {{--<button class="btn btn-outline-primary dropdown-toggle"--}}
                                    {{--data-toggle="dropdown"--}}
                                    {{--type="button"> {{ __('common.with_selected') }} <span--}}
                                    {{--class="caret"></span></button>--}}
                                    {{--<div class="dropdown-menu" role="menu">--}}
                                    {{--<a class="dropdown-item" href="#"--}}
                                    {{--onclick="action_overview('delete')">{{ __('common.delete') }}</a>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                        </div>

                        <table id="countries-table"
                               data-display-length='10'
                               class="table table-hover table-bordered table-sm display nowrap datatable_table"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('common.id')}}</th>
                                <th>{{__('common.name')}}</th>


                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.country.form_modal')
@stop
@push('custom-scripts')
    <script>
        $(function () {
            $('#countries-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                "sDom": SDOM,
                "aLengthMenu": [[100, 10, 75, 100], ["All", 10, 75, 100, "All"]],
                initComplete: datatable_filter,
                buttons: datatableButtons([{
                    className: "btn btn-primary btn-sm",
                    text: "<i class=\"fa fa-plus text-capitalize font-weight-bold\" data-toggle=\"modal\" data-target=\"#add-country-modal\"> create</i>",
                }], false, false, false),
                ajax: '{!! route('countries.index') !!}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},


                ],
            });
        });

        deleteAction('country-table', 'countries')
    </script>
@endpush
