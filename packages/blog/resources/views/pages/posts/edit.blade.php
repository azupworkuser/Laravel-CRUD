@extends('laracrud.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('blog::posts.index')}}">posts</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('blog::posts.show',$model->id)}}">{{$model->id}}</a>
    </li>
    <li class="breadcrumb-item">
        Edit
    </li>
@endsection

@section('tools')
    <a href="{{route('blog::posts.create')}}">
        <span class="fa fa-plus"></span> posts
    </a>
@endsection

@section('content')
    <div class="row">
        <div class='col-md-12'>
            <div class='card'>
                <div class="card-body">
                    @include('blog::forms.post',[
                    'route'=>route('blog::posts.update',$model->id),
                    'method'=>'PUT'
                    ])
                </div>
            </div>
        </div>
    </div>
@endSection