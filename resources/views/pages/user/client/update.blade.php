@extends('layout.master')

{{--@section('form-route'){{route('clients.update', $student->id)}}@endsection--}}
@section('form-method') @method('put') @endsection

@section('title')<h4 class="card-title">{{__('admin.update')}}</h4>@endsection

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! route('clients.index') !!}">{{__('common.clients')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('admin.view')}}</li>
    </ol>
</nav>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="clients-overview-tab" data-toggle="tab" href="#clients-overview" role="tab"
           aria-controls="clients-overview-tab" aria-selected="true">{{__('common.overview')}}</a>
    </li>
</ul>

<div class="row">
    <div class="tab-content border border-top-0 p-3 w-100" id="myTabContent">
        <div class="tab-pane fade show active" id="clients-overview" role="tabpanel" aria-labelledby="clients-overview-tab">
            @include('pages.user.client.form', ['user' => $user])
        </div>
    </div>
</div>
@endsection
