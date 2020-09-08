<?php
namespace App\Providers;
use App\course; // write model name here
use Illuminate\Support\ServiceProvider;
class Course1 extends ServiceProvider
{
public function boot()
{
view()->composer('*',function($view){
$view->with('cou', course::all());
});
}

}