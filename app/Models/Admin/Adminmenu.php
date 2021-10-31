<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
class Adminmenu extends Model
{
    protected $table='admin_menu';

    protected $guarded = [];


    public function saveMenu($data){
        return self::create($data);
    }

    public function findMenu($id){
        return self::findOrFail($id);
    }

    public function updateMenu($data,$id){
        return self::where('id',$id)->update($data);
    }

    public function deleteMenu($id){
        return self::where('id',$id)->delete();
    }

    public function reSort(array $data){
        try{
            \DB::connection(DB_CONNECTION)->beginTransaction();
            foreach ($data as $key => $menu) {
                self::where('id', $key)->update($menu);
            }
            \DB::connection(DB_CONNECTION)->commit();
            return ['error'=>0,'message'=>'Successfully updated'];
        }catch(\Throwable $e){
            \DB::connection(DB_CONNECTION)->rollBack();
            return ['error'=>0,'message'=>$e->getMessage()];
        }
    }
}
