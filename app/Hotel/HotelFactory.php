<?php

namespace app\Hotel;

use Illuminate\Support\Collection;
use App\Hotel\Hotel;

class HotelFactory
{
  /**
   * @param $rawData
   * @return \App\Hotel\Hotel
   */
  public function factory($rawData)
  {
	$hotel = new Hotel();
	$hotel->setId($rawData->id);
	$hotel->setName($rawData->name);
	$hotel->setAddress($rawData->address);
	return $hotel;
  }

  /**
   * @param $rawData
   * @return Collection
   */
  public function factoryList($rawData)
  {
	$dataList = $rawData->toArray();
	return new Collection(array_map(
		function ($rawData) {
		  return $this->factory($rawData);
		}, $dataList));
  }

  public function factoryRequest($rawData)
  {
	$hotel = new Hotel();
	$hotel
		->setName($rawData['name'])
		->setAddress($rawData['address']);
	return $hotel;
  }
}