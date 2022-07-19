@extends('laracrud.layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item">
        posts
    </li>
@endsection

@section('tools')
    <a href="{{route('blog::posts.create')}}">
        <span class="fa fa-plus"></span> posts
    </a>
@endsection

@section('content')
    @foreach($records as $record)
        @include('blog::cards.post')
    @endforeach
    {!! $records->render() !!}
@endSection