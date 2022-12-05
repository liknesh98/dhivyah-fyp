<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use App\Models\Subject;
use App\Models\Year;
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
    public function boot()
    {


        // Using Closure based composers...
        View::composer('layouts.layout', function ($view) {
            $subjectModel = new Subject();
            $yearModel = new Year();
            $subjects = $subjectModel->get_subject_list();
            $years = $yearModel->get_year_list();
                $view->with('subjects', $subjects);
                $view->with('years', $years);
        });
    }
}
