@foreach($users as $key=>$user)
<tr>
    <th>{{$key + 1}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->username}}</td>
    <td>
        @foreach($user->roles as $role)
            <span class="badge badge-success mb-10">{{$role->name}} </span>
        @endforeach
    </td>
    <td>
        @foreach($user->permissions as $permission)
        <span class="badge badge-success mb-10">{{$permission->name}}</span>
        @endforeach
    </td>
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>
        <a class="btn btn-primary" href="{{route('user.edit',['id'=>$user->id])}}">Edit</a>
        <a class="btn btn-danger deleteAction" href="{{route('user.delete',['id'=>$user->id])}}">Delete</a>
    </td>

</tr>
@endforeach
<tr>
 <td colspan="12" align="center">
    <div class="custom-pagination">
        {!! $users->links($ADMINTEMPLATEROOT.'components.custom-pagination') !!}
    </div>
</td>
</tr>