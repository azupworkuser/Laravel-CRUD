@extends('laracrud.layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('blog::tags.index')}}">tags</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('blog::tags.show',$model->id)}}">{{$model->id}}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection

@section('tools')
<a href="{{route('blog::tags.create')}}">
    <span class="fa fa-plus"></span> tags
</a>
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('blog::forms.tag',[
                'route'=>route('blog::tags.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection