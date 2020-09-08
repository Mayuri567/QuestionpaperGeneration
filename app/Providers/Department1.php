<?php
namespace App\Providers;
use App\department; // write model name here
use Illuminate\Support\ServiceProvider;
class Department1 extends ServiceProvider
{
public function boot()
{
view()->composer('*',function($view){
$view->with('dep', department::all());
});
}

}