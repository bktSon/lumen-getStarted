<?php

namespace app\Hotel;

use App\Hotel\Hotel;
use Illuminate\Support\Collection;

class HotelFactory
{
  /**
   * @param $rawData
   * @return \App\Hotel\Hotel
   */
	public function factory($rawData) {
		$hotel = new Hotel();
		$hotel->setHotelId($rawData->id);
	  	$hotel->setName($rawData->name);
	  	$hotel->setAddress($rawData->address);
	  	return $hotel;
	}

  /**
   * @param $rawData
   * @return Collection
   */
    public function factoryList($rawData) {
      $dataList = $rawData->toArray();
      return new Collection(array_map(
          function ($rawData) {
            return $this->factory($rawData) ;
          }, $dataList));
    }
}