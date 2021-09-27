<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginToLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::info('ログインしました', [
            'ユーザー名' => $event->user->name,
            'Email' => $event->user->email,
            'デバイス' => $event->guard,
            '自動保存チェック' => $event->remember,
            'ipアドレス' => request()->ip,
            'OS/ブラウザ' => request()->userAgent()
            ]);
    }
}
