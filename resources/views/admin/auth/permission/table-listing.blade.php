

        @foreach($permissions as $key=>$permission)
        @php
        $uriArr=explode(',',$permission->http_uri)
        @endphp
        <tr>
            <th>{{$key + 1}}</th>
            <td>{{$permission->name}}</td>
            <td>
                @foreach($uriArr as $uri)
                @php
                $urlArr=explode('/',$uri);
                @endphp
                    @if(!empty($urlArr))
                        <span class="badge badge-success mb-10">{{  (@$urlArr[2] == 'index') ? 'View' : ucfirst($urlArr[2])}} {{ucfirst(@$urlArr[1])}} </span>
                    @endif
                @endforeach
            </td>
            <td>
                <a class="btn btn-primary" href="{{route('permission.edit',['id'=>$permission->id])}}">Edit</a>
                <a class="btn btn-danger" href="{{route('permission.delete',['id'=>$permission->id])}}">Delete</a>
            </td>

        </tr>
        @endforeach
        <tr>
           <td colspan="12" align="center">
                <div class="custom-pagination">
                    {!! $permissions->links($ADMINTEMPLATEROOT.'components.custom-pagination') !!}
                </div>
            </td>
        </tr>