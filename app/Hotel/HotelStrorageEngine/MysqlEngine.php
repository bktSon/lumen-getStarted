<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 19/04/2017
 * Time: 17:16
 */

namespace app\Hotel\HotelStrorageEngine;

use App\Hotel\Hotel;
use Illuminate\Database\MySqlConnection;
use App\Hotel\HotelStrorageEngine\Engine;

/**
 * @property MySqlConnection connection
 */
class MysqlEngine implements Engine
{
  public function __construct(MySqlConnection $connection)
  {
	$this->connection = $connection;
  }

  public function buildQuery()
  {
	return $this->connection
		->table('hotels')
		->select([
			'id',
			'name',
			'address',
		]);
  }

  /**
   * @param $id
   * @return int|null
   */

  public function detroy($id)
  {
	$hotel = $this->connection->table('hotels')->find($id);
	return $hotel ? $this->connection->table('hotels')->delete($id) : null;
  }

  public function store(Hotel $hotel)
  {
	$rawDataToSave = [
		'name' => $hotel->getName(),
		'address' => $hotel->getAddress(),
	];
	if($hotel->getId()) {
		$rawDataToSave['updated_at'] = with(new \DateTime());
		return $this->connection->table('hotels')->where('id', $hotel->getId())->update($rawDataToSave);
	} else {
		$rawDataToSave['created_at'] = with(new \DateTime());
		return $this->connection->table('hotels')->insert($rawDataToSave);
	}
  }
}