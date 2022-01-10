<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Library\Classes\Admin;
class Mailsetting extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $table='mailsettings';
    protected $hidden = ['driver','host','port','encryption','username','password'];

    public function scopeConfiguredEmail($query) 
    {
        $user = Admin::user();
        return $query->where('admin_id', $user->id) ?? '';
    }
}
