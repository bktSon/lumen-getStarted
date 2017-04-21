<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 20/04/2017
 * Time: 17:14
 */

namespace app\Http\Middleware;


use App\Hotel\HotelFactory;
use Illuminate\Http\Request;
//use Validator;
use Closure;

class StoreHotelMiddleware
{
  public function handle(Request $request, Closure $next)
  {
	$hotel = $this->makeHotel($request);
	app()->bind(get_class($hotel), function () use ($hotel) {
	  return $hotel;
	});
	return $next($request);
  }

  function makeHotel(Request $request)
  {
    $hotelFactory = new HotelFactory();
    return $hotelFactory->factoryRequest($request->all());
  }
}