<?php
/**
 * Created by PhpStorm.
 * User: achiliku
 * Date: 18/04/2017
 * Time: 16:21
 */

namespace app\Hotel;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
  protected $table = 'hotels';

  protected $fillable = ['name', 'address'];


  public function setHotelId($hotelId) {
	$this->setAttribute('id', $hotelId);
	return $this;
  }

  public function setName($name) {
	$this->setAttribute('name', $name);
	return $this;
  }

  public function setAddress($address) {
	$this->setAttribute('address', $address);
	return $this;
  }

  public function getName() {
	return $this->getAttribute('name');
  }

  public function getAddress() {
	return $this->getAttribute('address');
  }
}