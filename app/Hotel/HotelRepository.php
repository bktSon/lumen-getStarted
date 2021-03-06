<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 18/04/2017
 * Time: 18:09
 */

namespace app\Hotel;


use app\Hotel\HotelStrorageEngine\MysqlEngine;

class HotelRepository
{
  /**
   * @var HotelFactory
   */
  protected $factory;

  /**
   * @var MysqlEngine
   *
   */
  protected $engine;

  /**
   * HotelRepository constructor.
   * @param MysqlEngine $engine
   * @param HotelFactory $factory
   */

  public function __construct(MysqlEngine $engine, HotelFactory $factory)
  {
    $this->engine = $engine;
    $this->factory = $factory;
  }

  /**
   * @param $id
   * @return Hotel
   */

  public function getHotel($id)
  {
    $rawData = $this->engine->buildQuery()->find($id);
    return $rawData ? $this->factory->factory($rawData) : null;
  }

  /**
   * @return \Illuminate\Support\Collection|null
   */
  public function getList()
  {
    $rawData = $this->engine->buildQuery()->get();
    return $rawData ? $this->factory->factoryList($rawData) : null;
  }
}


