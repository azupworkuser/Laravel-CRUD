@extends('laracrud.layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    tags
</li>
@endsection

@section('tools')
<a href="{{route('blog::tags.create')}}">
    <span class="fa fa-plus"></span> tags
</a>
@endsection

@section('content')
@foreach($records as $record)
@include('blog::cards.tag')
@endforeach
{!! $records->render() !!}
@endSection