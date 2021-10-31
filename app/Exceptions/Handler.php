<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $exception,$request = null) {
            //$response = parent::render($request, $exception);
           /* switch($response->status()){
                case 400:
                    return view('errors.404');
                    break;
                case 403:
                    return view('errors.403');
                    break;
                case 500:
                    return view('errors.500');
                default :
                    return view('errors.404')

            }*/
        });
    }
}
