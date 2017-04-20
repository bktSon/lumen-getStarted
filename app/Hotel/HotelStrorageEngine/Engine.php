<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 19/04/2017
 * Time: 16:05
 */

namespace app\Hotel\HotelStrorageEngine;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Expression;

interface Engine
{
  /**
   * @return mixed
   */
  public function buildQuery();
}