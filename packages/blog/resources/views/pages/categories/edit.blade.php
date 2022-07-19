@extends('laracrud.layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('blog::categories.index')}}">categories</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('blog::categories.show',$model->id)}}">{{$model->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection

@section('tools')
<a href="{{route('blog::categories.create')}}">
    <span class="fa fa-plus"></span> categories
</a>
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('blog::forms.category',[
                'route'=>route('blog::categories.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection