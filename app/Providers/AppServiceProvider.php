<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('money', function ($expression) {
            return "<?php echo App\Helpers\FormatHelper::formatMoney($expression); ?>";
        });

        Blade::directive('decimal', function ($expression) {
            return "<?php echo App\Helpers\FormatHelper::formatDecimal($expression); ?>";
        });

        Blade::directive('weight', function ($expression) {
            return "<?php echo App\Helpers\FormatHelper::formatWeight($expression); ?>";
        });
    }
}
