<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Companies;
use App\Models\Settings;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
		Schema::defaultStringLength(191);
		$o_chat_sc = '';
		View::composer('*', function ($view) use ($auth) {
            if(!empty($auth->user())){
				$o_chat_scx = '';
				if(!empty($auth->user()->company) AND $auth->user()->company > 0){
					$o_cy = Companies::where(['id' => $auth->user()->company])->first();
					$o_chat_sc = !empty($o_cy->chat)?$o_cy->chat:'';
					$o_chat_scx = !empty($o_cy->chat)?$o_cy->chat:'';
				}
				$view->with('o_chat_scx', $o_chat_scx);
			}
        });
		if (Schema::hasTable('settings')) {
			$o_settings = Settings::orderBy('id', 'DESC')->first();
			View::share(['o_settings' => $o_settings,'o_chat_sc' => $o_chat_sc]);
		}
    }
}
