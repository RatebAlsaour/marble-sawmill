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
                                </div>
                            </div>
                        </div>
                        <table id="clientInvoiceDetails-table"
                               data-display-length='10'
                               class="table table-hover table-bordered table-sm display nowrap datatable_table"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="disabled">#</th>
                                <th>{{__('common.id')}}</th>
                                <th>{{__('common.clientInvoice_id')}}</th>
                                <th>{{__('common.block_symbol')}}</th>
                                <th>{{__('common.hieght')}}</th>
                                <th>{{__('common.width')}}</th>
                                <th>{{__('common.high')}}</th>
                                <th class="disabled">{{__('common.actions')}}</th>
                            </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('pages.client_invoice.details.form_modal',['clientInvoice' =>$clientInvoice ])
@push('custom-scripts')
    <script>
        $(function () {
            $('#clientInvoiceDetails-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                "sDom": SDOM,
                "aLengthMenu": [[100, 10, 75, 100], ["All", 10, 75, 100, "All"]],
                initComplete: datatable_filter,
                buttons: datatableButtons([{
                    className: "btn btn-primary btn-sm",
                    text: "<i class=\"fa fa-plus text-capitalize font-weight-bold\" data-toggle=\"modal\" data-target=\"#add-currency-modal\"> create</i>",
                }], false, false, false),
                ajax: '{!! route('client-invoice-details.index',['clientInvoice'=>$clientInvoice->id]) !!}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'clientInvoice_id', name: 'clientInvoice_id'},
                    {data: 'block_symbol', name: 'block_symbol'},
                    {data: 'hieght', name: 'hieght'},
                    {data: 'width', name: 'width'},
                    {data: 'high', name: 'high'},
                    {data: 'action', name: 'action', orderable:false, searchable:false},
                ],
            });
        });
        deleteAction('clientInvoiceDetails-table', 'client-invoice-details')
    </script>
@endpush
