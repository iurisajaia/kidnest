<?php

namespace App\Providers;

use App\Repositories\ActivityRepository;
use App\Repositories\AttendanceRepository;
use App\Repositories\BranchRepository;
use App\Repositories\GroupRepository;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\KidRepositoryInterface;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\KidRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\StaffRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class , UserRepository::class);
        $this->app->bind(KidRepositoryInterface::class , KidRepository::class);
        $this->app->bind(BranchRepositoryInterface::class , BranchRepository::class);
        $this->app->bind(GroupRepositoryInterface::class , GroupRepository::class);
        $this->app->bind(StaffRepositoryInterface::class , StaffRepository::class);
        $this->app->bind(ActivityRepositoryInterface::class , ActivityRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class , AttendanceRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class , PaymentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('role', function ($roles) {
            return "<?php if(auth()->check() &&  in_array(auth()->user()->role->key, {$roles})): ?>";
        });

        Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });


        View::share([
            'current_locale' => app()->getLocale(),
            'available_locales' => config('app.available_locales'),
        ]);
    }
}
