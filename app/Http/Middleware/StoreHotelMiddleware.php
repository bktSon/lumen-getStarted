<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 20/04/2017
 * Time: 17:14
 */

namespace app\Http\Middleware;


use App\Hotel\HotelFactory;
use Closure;
use Illuminate\Http\Request;
use Validator;

class StoreHotelMiddleware
{
  /**
   * @param Request $request
   * @param Closure $next
   * @return \Illuminate\Http\JsonResponse|mixed
   */
  public function handle(Request $request, Closure $next)
  {
	$validator = $this->makeValidator($request);

	if ($validator->fails()) {
	  return response()->json([
		  'status' => 'error',
		  'code' => 'DATA_IS_INVALID',
		  'message' => $validator->errors()->all()
	  ]);
	}
	$hotel = $this->makeHotel($request);
	app()->bind(get_class($hotel), function () use ($hotel) {
	  return $hotel;
	});
	return $next($request);
  }

  /**
   * @param Request $request
   * @return \App\Hotel\Hotel
   */
  public function makeHotel(Request $request)
  {
	$hotelFactory = new HotelFactory();
	return $hotelFactory->factoryRequest($request->all());
  }

  /**
   * @param Request $request
   * @return mixed
   */
  public function makeValidator(Request $request)
  {
	$rules = [
		'name' => 'required|unique:hotels|max:255',
		'address' => 'required|max:255'
	];
	return Validator::make($request->all(), $rules, $this->message());
  }

  /**
   * @return array
   */
  public function message()
  {
	return [
		'name.required' => 'Hay nhap ten hotel',
		'name.unique' => 'Ten da ton tai',
		'address.required' => 'Hay nhap address',
	];
  }
}