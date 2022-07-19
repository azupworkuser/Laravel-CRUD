<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                {{$record->id}}
            </div>
            <div class="col-sm-3">
                <div class="btn-group" style="float: left">
                    <a href="{{route('blog::categories.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <a href="{{route('blog::categories.show',$record->id)}}">
    <span class="fa fa-eye"></span>
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
                </div>
            </div>
        </div>
    </div>
    <div class="card-block">
        <table class="table table-bordered table-striped">
            <tbody>
            		<tr>
			<th>Parent Id</th>
			<td>{{$record->parent_id}}</td>
		</tr>
		<tr>
			<th>Title</th>
			<td>{{$record->title}}</td>
		</tr>
		<tr>
			<th>Slug</th>
			<td>{{$record->slug}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
