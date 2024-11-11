<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use App\Helpers\StringHelper;
use App\Helpers\IconHelper;

class AppServiceProvider extends ServiceProvider {
	public function register(): void {
		$loader = AliasLoader::getInstance();
		$loader->alias('StringHelper',StringHelper::class);
		$loader->alias('IconHelper',IconHelper::class);
	}

	public function boot(): void {

	}
}
