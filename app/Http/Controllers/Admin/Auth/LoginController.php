<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Admin\BackendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BackendController{
	public function __construct(){
		parent::__construct();
	}

	public function loginForm(){
		if ($this->guard()->check()) {
			return redirect($this->redirectPath());
		}
		return view($this->ADMINTEMPLATEROOT.'auth.login');
	}

	public function loginProcess(Request $request){
		$this->loginValidator($request->all())->validate();
		$credentials = $request->only([$this->username(), 'password']);
		$remember = $request->get('remember', false);
		if ($this->guard()->attempt($credentials, $remember)) {
			return $this->sendLoginResponse($request);
		}
		return back()->withInput()->withErrors([
			$this->username() => $this->getFailedLoginMessage(),
		]);
	}

	public function getLogout(Request $request)
	{
		$this->guard()->logout();
		$request->session()->invalidate();
		return redirect(route(ADMIN_TEMPLATE_PREFIX.'.login'));
	}

	protected function loginValidator(array $data)
	{
		return \Validator::make($data, [
			$this->username() ?? $this->email() => 'required',
			'password' => 'required',
		]);
	}

	protected function getFailedLoginMessage()
	{
		return \Lang::has('auth.failed')
		? trans('auth.failed')
		: 'These credentials do not match our records.';
	}

	protected function sendLoginResponse(Request $request)
	{
		$request->session()->regenerate();
		return redirect()->intended($this->redirectPath())->with(['success' => trans('admin.login_successful')]);
	}

	protected function redirectPath()
	{
		if (method_exists($this, 'redirectTo')) {
			return $this->redirectTo();
		}
		return property_exists($this, 'redirectTo') ? $this->redirectTo : route(ADMIN_TEMPLATE_PREFIX.'.index');
	}

	protected function username(){
		return 'username';
	}
	protected function email(){
		return 'email';
	}
	protected function guard()
	{
		return Auth::guard('admin');
	}
}