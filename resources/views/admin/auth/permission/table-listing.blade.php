@foreach($permissions as $key=>$permission)
<tr>
    <th>{{$key + 1}}</th>
    <td>{{$permission->name}}</td>
    <td><span class="badge badge-primary">Sale</span>
    </td>
    <td>
        <a class="btn btn-primary" href="{{route('permission.edit',['id'=>$permission->id])}}">Edit</a>
        <a class="btn btn-danger" href="{{route('permission.delete',['id'=>$permission->id])}}">Delete</a>
    </td>

</tr>
@endforeach