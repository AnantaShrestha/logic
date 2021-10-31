@foreach($roles as $key=>$role)
<tr>
    <th>{{$key + 1}}</th>
    <td>{{$role->name}}</td>
    <td>
        @foreach($role->permissions as $permission)
        <span class="badge badge-success mb-10">{{$permission->name}}</span>
        @endforeach
    </td>
    <td>{{$role->created_at->diffForHumans()}}</td>
    <td>
        <a class="btn btn-primary" href="{{route('role.edit',['id'=>$role['id']])}}"><i class="fa fa-edit"></i></a>
        <a class="btn btn-danger deleteAction" href="{{route('role.delete',['id'=>$role['id']])}}"><i class="fa fa-trash"></i></a>
    </td>

</tr>
@endforeach
<tr>
 <td colspan="12" align="center">
    <div class="custom-pagination">
        {!! $roles->links($ADMINTEMPLATEROOT.'components.custom-pagination') !!}
    </div>
</td>
</tr>