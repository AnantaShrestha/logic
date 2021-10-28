<?php
namespace App\Library\Classes;
use App\Library\Classes\Admin;
class Permission{
{
    public static function error()
    {
        $uriCurrent = request()->fullUrl();
        $methodCurrent = request()->method();
        if (strtoupper($methodCurrent) === 'GET') {
            return redirect()->route('admin.deny');
        } else {
            return response()->json([
                'error' => '1',
                'message' => 'Permission Denied',
                'detail' => [
                    'url' => $uriCurrent
                ]
            ]);
        }
    }

}
