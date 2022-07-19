@extends('laracrud.layouts.app')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('blog::categories.index')}}">categories</a>
</li>
<li>
    Create
</li>
@endsection
@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card bg-white'>
            <div class="card-body">
                @include('blog::forms.category')
            </div>
        </div>
    </div>
</div>
@endSection