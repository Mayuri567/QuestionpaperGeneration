<?php
namespace App\Providers;
use App\subject; // write model name here
use Illuminate\Support\ServiceProvider;
class SubjectProvider extends ServiceProvider
{
public function boot()
{
view()->composer('*',function($view){
$view->with('sub', subject::all());
});
}

}