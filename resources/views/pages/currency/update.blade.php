@extends('layout.master')

@section('form-route'){{route('currencies.update', $currency->id)}}@endsection
@section('form-method') @method('put') @endsection

@section('title')<h4 class="card-title">{{__('admin.update')}}</h4>@endsection

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! route('currencies.index') !!}">{{__('common.currencies')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('admin.view')}}</li>
    </ol>
</nav>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="currencies-overview-tab" data-toggle="tab" href="#currencies-overview" role="tab"
           aria-controls="currencies-overview-tab" aria-selected="true">{{__('common.overview')}}</a>
    </li>
</ul>
<div class="row">
    <div class="tab-content border border-top-0 p-3 w-100" id="myTabContent">
        <div class="tab-pane fade show active" id="currencies-overview" role="tabpanel" aria-labelledby="currencies-overview-tab">
            @include('pages.currency.form', ['currency' => $currency, 'source' => 'update'])
        </div>
    </div>
</div>
@endsection
