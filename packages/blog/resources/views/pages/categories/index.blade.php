@extends('laracrud.layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    categories
</li>
@endsection

@section('tools')
<a href="{{route('blog::categories.create')}}">
    <span class="fa fa-plus"></span> categories
</a>
@endsection

@section('content')
@foreach($records as $record)
@include('blog::cards.category')
@endforeach
{!! $records->render() !!}
@endSection