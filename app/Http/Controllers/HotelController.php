<?php

namespace app\Http\Controllers;

use App\Hotel\Hotel;
use App\Http\Controllers\Controller;
use App\Hotel\HotelRepository;
use Illuminate\Http\Request;

/**
 * @property HotelRepository hotelRepository
 */
class HotelController extends Controller
{
  /**
   * HotelController constructor.
   *
   * @param HotelRepository $hotelRepository
   */

  public function __construct(HotelRepository $hotelRepository)
  {
	$this->hotelRepository = $hotelRepository;
  }

  /**
   * @param $id
   *
   * @return string
   */

  public function getHotel($id)
  {
	$hotel = $this->hotelRepository->getHotel($id);

	if (!$hotel) {
	  $response = ['code' => 401, 'status' => 'No hotel was found'];
	  return response()->json($response, $response['code']);
	}

	if ($hotel) {
	  $response = ['code' => 200, 'status' => 'Success', 'hotel' => $hotel];
	  return response()->json($response, $response['code']);
	}
  }

  /**
   * @return \Illuminate\Support\Collection|null
   */
  public function getList()
  {
	return $this->hotelRepository->getList();
  }

  /**
   * @param $id
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroy($id)
  {
	$hotel = $this->hotelRepository->destroy($id);

	if (!$hotel) {
	  $response = ['code' => 401, 'status' => 'No hotel was found'];
	  return response()->json($response, $response['code']);
	}

	if ($hotel) {
	  $response = ['code' => 200, 'status' => 'destroy success'];
	  return response()->json($response, $response['code']);
	}
  }

  /**
   * @param Hotel $hotel
   * @return Hotel
   */

  public function store(Hotel $hotel) {
     $this->hotelRepository->store($hotel);
     $response = ['code' => 200, 'status' => 'store success'];
     return response()->json($response, $response['code']);
  }
}


