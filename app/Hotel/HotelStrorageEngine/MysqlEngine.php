<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 19/04/2017
 * Time: 17:16
 */

namespace app\Hotel\HotelStrorageEngine;

use App\Hotel\HotelStrorageEngine\Engine;
use Illuminate\Database\MySqlConnection;

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
}