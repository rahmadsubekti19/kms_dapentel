<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Route;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('user', auth()->user());
        $view->with('sop', Route::currentRouteName());
    }
}