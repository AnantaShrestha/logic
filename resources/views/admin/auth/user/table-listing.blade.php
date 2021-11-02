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
    <td>
        <div class="switch-button {{($user->activate == 1) ? 'active' : ''}}">
          <input type="checkbox"  {{($user->activate == 1) ? 'checked' : ''}} class="switch-action" data-id="{{$user->id}}" data-url="{{route('user.activate',['id'=>$user->id])}}" />
          <span class="switch-round-btn"></span>
      </div>
    </td>
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>
        <a class="btn btn-primary" href="{{route('user.edit',['id'=>$user->id])}}"><i class="fa fa-edit"></i></a>
        <a class="btn btn-danger deleteAction" href="{{route('user.delete',['id'=>$user->id])}}"><i class="fa fa-trash"></i></a>
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