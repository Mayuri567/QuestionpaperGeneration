<?php
namespace App\Providers;
use App\university; // write model name here
use Illuminate\Support\ServiceProvider;
class Dynamicclass extends ServiceProvider
{
public function boot()
{
view()->composer('*',function($view){
$view->with('uni', university::all());
});
}

}