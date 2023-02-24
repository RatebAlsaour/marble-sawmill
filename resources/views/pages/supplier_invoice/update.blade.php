@extends('layout.master')

@section('form-route'){{route('supplier-invoices.update', $supplierInvoice->id)}}@endsection
@section('form-method') @method('put') @endsection

@section('title')<h4 class="card-title">{{__('admin.update')}}</h4>@endsection

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! route('supplier-invoices.index') !!}">{{__('common.supplier_invoice')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('admin.view')}}</li>
    </ol>
</nav>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="supplier-invoices-overview-tab" data-toggle="tab" href="#supplier-invoices-overview" role="tab"
           aria-controls="supplier-invoices-overview-tab" aria-selected="true">{{__('common.overview')}}</a>
    </li>
</ul>

<div class="row">
    <div class="tab-content border border-top-0 p-3 w-100" id="myTabContent">
        <div class="tab-pane fade show active" id="supplier-invoices-overview" role="tabpanel" aria-labelledby="supplier-invoices-overview-tab">
            @include('pages.supplier_invoice.form',['supplierInvoice' => $supplierInvoice,'currencies' => $currencies , 'suppliers' => $suppliers , 'countries'=> $countries , 'source' => 'update'])
        </div>
    </div>
</div>
@endsection


