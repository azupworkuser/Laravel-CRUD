<form action="{{$route or route('blog::categories.store')}}" method="POST"  >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{$method or 'POST'}}"/>
        <div class="form-group">
        <label for="parent_id">Parent Id</label>
        <input type="text" class="form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id" id="parent_id" value="{{old('parent_id',$model->parent_id)}}" placeholder="" maxlength="255" >
          @if($errors->has('parent_id'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('parent_id') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{old('title',$model->title)}}" placeholder="" maxlength="255" >
          @if($errors->has('title'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('title') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="slug" value="{{old('slug',$model->slug)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('slug'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('slug') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>