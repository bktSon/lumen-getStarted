<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 19/04/2017
 * Time: 16:05
 */

namespace app\Hotel\HotelStrorageEngine;


interface Engine
{
  /**
   * @return mixed
   */
  public function buildQuery();
}