<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Admin\Mailsetting;
use Config;
class MailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $mail = Mailsetting::configuredEmail()->first();
        if (isset($mail->id)){
            $config = array(
                'driver'     => $mail->driver,
                'host'       => $mail->host,
                'port'       => $mail->port,
                'from'       => array(
                    'address' => $mail->address, 
                    'name' => $mail->name
                ),
                'encryption' => $mail->encryption,
                'username'   => $mail->username,
                'password'   => $mail->password
            );
            Config::set('mail', $config);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
