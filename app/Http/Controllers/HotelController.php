<?php

namespace app\Http\Controllers;

use App\Hotel\HotelRepository;
use App\Http\Controllers\Controller;

/**
 * @property HotelRepository hotelRepository
 */
class HotelController extends Controller
{
  /**
   * HotelController constructor.
   * @param HotelRepository $hotelRepository
   */

  public function __construct(HotelRepository $hotelRepository)
  {
    $this->hotelRepository = $hotelRepository;
  }

  /**
   * @param $id
   * @return string
   */

  public function getHotel($id)
  {
    $hotel = $this->hotelRepository->getHotel ($id);

    if (!$hotel) {
      $response = ['code' => 401, 'status' => 'No hotel was found',];
      return response ()->json ($response, $response['code']);
    }

    if ($hotel) {
      $response = ['code' => 200, 'status' => 'Success', 'hotel' => $hotel];
      return response ()->json ($response, $response['code']);
    }
  }

  /**
   * @return \Illuminate\Support\Collection|null
   */
  public function getList()
  {
    return $this->hotelRepository->getList ();
  }
}