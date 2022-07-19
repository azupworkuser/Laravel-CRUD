@extends('laracrud.layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('blog::categories.index')}}">categories</a>
</li>
<li class="breadcrumb-item">
    {{$record->id}}
</li>

@endsection

@section('tools')

<a href="{{'blog::categories.create'}}">
    <span class="fa fa-plus"></span>
</a>
<a href="{{route('blog::categories.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
<form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('blog::categories.destroy',$record->id)}}"
      method="post"
      style="display: inline">
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <button type="submit" class="btn btn-default cursor-pointer  btn-sm">
        <i class="text-danger fa fa-remove"></i>
    </button>
</form>

@endsection

@section('content')

<div class="row">
    <div class="col-sm-8">
        @include('blog::cards.category')
    </div>
</div>
@endSection