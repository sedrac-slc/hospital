<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
            ->subject('Verifica o seu e-mail')
            ->line('Clicka no link abaixo')
            ->action('Verify Email Address', $url)
            ->line('Caso não tens uma conta, deves criar');
        });

        ResetPassword::toMailUsing(function($notifiable, $url){
            $expires = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
            return (new MailMessage)
            ->subject('Pedido de reseta de senha')
            ->line('Foi feito um pedido para resetar a sua senha.')
            ->action('Reseta a senha', $url)
            ->line('O tempo de expiração deste link '.$expires.' minutos.')
            ->line('Caso não fizeste o pedido, podes ignorar esta mensagem.');
        });

    }
}
