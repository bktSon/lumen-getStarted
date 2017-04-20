<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 18/04/2017
 * Time: 16:50
 */

namespace app\Hotel;


use App\Hotel\HotelStrorageEngine\MysqlEngine;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\MySqlConnection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Hotel\HotelFactory;


class HotelServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->singleton(MysqlEngine::class, function () {
      $connection = DB::connection();

      if (!$connection instanceof MySqlConnection) {
        throw new BindingResolutionException('Current configuration is not mysql engine');
      }

      return new MysqlEngine($connection);
    });

    $this->app->singleton(HotelRepository::class, function () {
      return new HotelRepository($this->app->make(MysqlEngine::class), new HotelFactory());
    });
  }
}