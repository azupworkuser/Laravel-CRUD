<div class="card card-default">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-9">
                {{$record->id}}
            </div>
            <div class="col-sm-3">
                <div class="btn-group" style="float: left">
                    <a href="{{route('blog::posts.edit',$record->id)}}">
    <span class="fa fa-pencil"></span>
</a>
                    <a href="{{route('blog::posts.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a>
                    <form onsubmit="return confirm('Are you sure you want to delete?')"
      action="{{route('blog::posts.destroy',$record->id)}}"
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
			<th>User Id</th>
			<td>{{$record->user_id}}</td>
		</tr>
		<tr>
			<th>Title</th>
			<td>{{$record->title}}</td>
		</tr>
		<tr>
			<th>Slug</th>
			<td>{{$record->slug}}</td>
		</tr>
		<tr>
			<th>Status</th>
			<td>{{$record->status}}</td>
		</tr>
		<tr>
			<th>Body</th>
			<td>{{$record->body}}</td>
		</tr>
		<tr>
			<th>Category Id</th>
			<td>{{$record->category_id}}</td>
		</tr>
		<tr>
			<th>Image</th>
			<td>{{$record->image}}</td>
		</tr>
		<tr>
			<th>Published At</th>
			<td>{{$record->published_at}}</td>
		</tr>

            </tbody>
        </table>
    </div>
</div>
