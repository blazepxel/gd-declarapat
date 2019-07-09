<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Blade;

use App\Http\Models\Configuracion;


class AppServiceProvider extends ServiceProvider
{

  public function boot()
  {
    view()->share('tabindex', 0);

    try
    {
      $config =  Configuracion::where('carpeta','=',CARPETA)->first();
    }
    catch(\Illuminate\Database\QueryException $e)
    {
      $config = ['institucion' => null];
    }

    view()->share('config', $config);


    Blade::directive('dMy', function($fecha){
      return "<?php if($fecha){ echo \Date::parse($fecha)->format('d-M-y'); } ?>"; //12-dic-17
    });


    Blade::directive('Y', function($fecha){
      return "<?php echo \Carbon::parse($fecha)->subYear(1)->format('Y'); ?>"; //2017
    });
  }


  public function register()
  {
  }

}
