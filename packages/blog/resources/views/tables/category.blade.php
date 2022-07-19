<table class="table table-bordered table-striped">
    <thead>
    <tr>
    		<th>Parent Id </th>
		<th>Title </th>
		<th>Slug </th>
		<th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @foreach($records as $record)
    <tr>	 	<td> {{$record->parent_id }} </td>
	 	<td> {{$record->title }} </td>
	 	<td> {{$record->slug }} </td>
	<td><a href="{{route('blog::categories.show',$record->id)}}">
    <span class="fa fa-eye"></span>
</a><a href="{{route('blog::categories.edit',$record->id)}}">
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
</form></td></tr>

    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">
            {{{$records->render()}}}
        </td>
    </tr>
    </tfoot>
</table>