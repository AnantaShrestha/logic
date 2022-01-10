<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Mailsetting;
use App\Library\Classes\Admin;
class MailsettingController extends Controller
{
    public function index(){
        $data['mail']=Mailsetting::configuredEmail()->first();
        return view('admin.mailsetting.index')->with($data);
    }
    public function store(Request $request){
        $this->validate($request,
            [
            'driver'=>'required',
            'host'=>'required',
            'port' => 'required',
            'encryption'=>'required',
            'username'=>'required',
            'password'=>'required',
            'name'=>'required',
            'address'=>'required|email',
        ]);
        $data=$request->except('_token');
        $data['admin_id']=Admin::user()->id;
        Mailsetting::updateorCreate($data);
        return redirect()->back()->with('message','Mail setting successfully updated');
    }
}
