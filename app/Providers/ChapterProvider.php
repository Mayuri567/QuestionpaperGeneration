<?php
namespace App\Providers;
use App\chapter; // write model name here
use Illuminate\Support\ServiceProvider;
class ChapterProvider extends ServiceProvider
{
public function boot()
{
view()->composer('*',function($view){
$view->with('chap', chapter::all());
});
}

}