<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table='admin_log';
    protected $guarded=[];

    public function admin(){
        return $this->belongsTo(Adminuser::class,'admin_id');
    }

    public function scopeGetlogs($query){
        return $query->orderBy('created_at','desc')->paginate(PAGINATION_NUMBER);
    }

    public function getTableData($data){
        $query=$data['query'];
        $query=str_replace(" ", "%", $query);
        return self::where('id', 'like', '%'.$query.'%')
        ->orWhere('ip', 'like', '%'.$query.'%')
        ->orWhere('path','like', '%'.$query.'%')
        ->orderBy('created_at','desc')
        ->paginate(PAGINATION_NUMBER);
    }

    public function createLogs($data){
        return self::create($data);
    }

    public function deleteLogs($id){
        return self::where('id',$id)
                ->delete();
    }
}
