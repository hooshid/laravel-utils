<?php

namespace Hooshid\Utils\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class PublishController extends Controller
{
    public function publish()
    {
        //Artisan::call('cache:clear');
        //echo Artisan::output()."<br>";

        Artisan::call('config:clear');
        echo Artisan::output() . "<br>";

        Artisan::call('route:clear');
        echo Artisan::output() . "<br>";

        Artisan::call('view:clear');
        echo Artisan::output() . "<br>";

        Artisan::call('event:clear');
        echo Artisan::output()."<br>";

        Artisan::call('optimize:clear');
        echo Artisan::output()."<br>";

        if (config('app.env') == "production") {
            echo "<br>cache:<br>";

            Artisan::call('config:cache');
            echo Artisan::output() . "<br>";

            Artisan::call('route:cache');
            echo Artisan::output() . "<br>";

            Artisan::call('view:cache');
            echo Artisan::output() . "<br>";

            Artisan::call('event:generate');
            echo Artisan::output()."<br>";

            Artisan::call('event:cache');
            echo Artisan::output()."<br>";

            Artisan::call('optimize');
            echo Artisan::output()."<br>";
        }

        echo "<br><br>";
        echo "app.debug: " . config('app.debug') . "<br>";
        echo "app.env: " . config('app.env') . "<br>";
    }
}
