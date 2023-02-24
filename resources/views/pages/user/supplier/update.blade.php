@extends('layout.master')

{{--@section('form-route'){{route('suppliers.update', $student->id)}}@endsection--}}
@section('form-method') @method('put') @endsection

@section('title')<h4 class="card-title">{{__('admin.update')}}</h4>@endsection

@section('content')

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{!! route('suppliers.index') !!}">{{__('common.suppliers')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{__('admin.view')}}</li>
    </ol>
</nav>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="suppliers-overview-tab" data-toggle="tab" href="#suppliers-overview" role="tab"
           aria-controls="suppliers-overview-tab" aria-selected="true">{{__('common.overview')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="supplier-documents-tab" data-toggle="tab" href="#supplier-documents"
           role="tab"
           aria-controls="student-statistics-tab"
           aria-selected="false">{{__('common.documents')}}</a>
    </li>
</ul>

<div class="row">
    <div class="tab-content border border-top-0 p-3 w-100" id="myTabContent">
        <div class="tab-pane fade show active" id="suppliers-overview" role="tabpanel" aria-labelledby="suppliers-overview-tab">
            @include('pages.user.supplier.form', ['user' => $user])
        </div>



        <div class="tab-pane" id="supplier-documents" role="tabpanel" aria-labelledby="supplier-documents-tab">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                {{--@include('pages.student.statistics', ['user' => $student->user])--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
