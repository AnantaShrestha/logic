<?php
namespace App\Models\Admin;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Role;
use App\Models\Admin\Permission;
class Adminuser extends Model implements AuthenticatableContract{
	use Authenticatable;
	protected $table='admin_user';
	protected $guarded = [];
    protected $hidden  = [
        'password', 'remember_token',
    ];
    protected static $allPermissions = null;
    protected static $allViewPermissions = null;
    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_role', 'admin_id', 'role_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'admin_permission', 'admin_id', 'permission_id');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function saveUser($data){
        return self::create($data);
    }

    public function getUser(){
        return self::with('permissions','roles')->orderBy('created_at','desc')
        ->paginate(PAGINATION_NUMBER);
    }

    public function getTableData($data){
        $query=$data['query'];
        $query=str_replace(" ", "%", $query);
        return self::where('id', 'like', '%'.$query.'%')
        ->orWhere('name', 'like', '%'.$query.'%')
        ->orWhere('username', 'like', '%'.$query.'%')
        ->orderBy('created_at','desc')
        ->with('permissions','roles')
        ->paginate(PAGINATION_NUMBER);
    }

    public function findUser($id){
        return self::findOrFail($id);
    }

    public function updateUser($data,$id){
        $user=$this->findUser($id);
        $user->update($data);
        return $user;
    }
    public function deleteUser($id){
       $user=$this->findUser($id);
       $user->delete();
       return $user;
    }

     /**
     * Get all permissions of user.
     *
     * @return mixed
     */
    public static function allPermissions()
    {
        if (self::$allPermissions === null) {
            $user                 =\Auth::guard('admin')->user();
            self::$allPermissions = $user->roles()->with('permissions')
                ->get()->pluck('permissions')->flatten()
                ->merge($user->permissions);
        }
        return self::$allPermissions;
    }

       /**
     * Get all view permissions of user.
     *
     * @return mixed
     */
    protected static function allViewPermissions()
    {
        if (self::$allViewPermissions === null) {
            $arrView = [];
            $allPermissionTmp = self::allPermissions();
            $allPermissionTmp = $allPermissionTmp->pluck('http_uri')->toArray();
            if ($allPermissionTmp) {
                foreach ($allPermissionTmp as  $actionList) {
                    foreach (explode(',', $actionList) as  $action) {
                        $arrScheme = ['https://', 'http://'];
                        $arrView[] = str_replace($arrScheme, '', url($action));
                    }
                }
            }
            self::$allViewPermissions = $arrView;
        }
        return self::$allViewPermissions;
    }


     /**
     * Check url menu can display
     *
     * @param   [type]  $url  [$url description]
     *
     * @return  [type]        [return description]
     */
    public function checkUrlAllowAccess($url)
    {
        if ($this->isAdministrator()) {
            return true;
        }
        $listUrlAllowAccess = self::allViewPermissions();
        $arrScheme = ['https://', 'http://'];
        $pathCheck = strtolower(str_replace($arrScheme, '', $url));
        if ($listUrlAllowAccess) {
            foreach ($listUrlAllowAccess as  $pathAllow) {
                if ($pathCheck === $pathAllow
                    || $pathCheck  === $pathAllow.'/'
                    || (\Str::endsWith($pathAllow, '*') && ($pathCheck === str_replace('/*', '', $pathAllow) || strpos($pathCheck, str_replace('*', '', $pathAllow)) === 0))
                    || (\Str::endsWith($pathAllow, '{id}') && ($pathCheck === str_replace('/{id}', '', $pathAllow) || strpos($pathCheck, str_replace('{id}', '', $pathAllow)) === 0))
                    ) {
                    return true;
                }
            }
        }
        return false;
    }

    public function isAdministrator(): bool
    {
        return $this->isRole('administrator');
    }

    public function isRole(string $role): bool
    {
        return $this->roles->pluck('slug')->contains($role);
    }

    public function can($ability, $arguments = []): bool
    {
        if ($this->isAdministrator()) {
            return true;
        }

        if ($this->permissions->pluck('slug')->contains($ability)) {
            return true;
        }

        return $this->roles->pluck('permissions')->flatten()->pluck('slug')->contains($ability);
    }
    
    public function cannot(string $permission): bool
    {
        return !$this->can($permission);
    }
}