
@foreach($logs as $key=>$log)
<tr>
    <th>{{$key + 1}}</th>
    <td>{{$log->admin->name}}</td>
    <td><span class="btn-success btn btn-sm">{{$log->method}}</span></td>
    <td>{{ $log->path }}</td>
    <td>{{$log->ip}}</td>
    <td>{{$log->user_agent}}</td>
    <td>{{htmlspecialchars($log->input)}}</td>
    <td>{{$log->created_at}}</td>
    <td><a class="btn btn-danger deleteAction" href="{{route('logs.delete',['id'=>$log->id])}}"><i class="fa fa-trash"></i></a></td>
</tr>
@endforeach
<tr>
 <td colspan="12" align="center">
    <div class="custom-pagination">
        {!! $logs->links($ADMINTEMPLATEROOT.'components.custom-pagination') !!}
    </div>
</td>
</tr>