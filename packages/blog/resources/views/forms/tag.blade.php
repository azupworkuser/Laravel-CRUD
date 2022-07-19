<form action="{{$route or route('blog::tags.store')}}" method="POST"  >
    {{csrf_field()}}
    <input type="hidden" name="_method" value="{{$method or 'POST'}}"/>
        <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}" name="slug" id="slug" value="{{old('slug',$model->slug)}}" placeholder="" maxlength="255" required="required" >
          @if($errors->has('slug'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('slug') }}</strong>
    </div>
  @endif 
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{old('name',$model->name)}}" placeholder="" maxlength="150" >
          @if($errors->has('name'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
  @endif 
    </div>


    <div class="form-group text-right ">
        <input type="reset" class="btn btn-default" value="Clear"/>
        <input type="submit" class="btn btn-primary" value="Save"/>

    </div>
</form>