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
  /**
   * @var string
   *
   */
  protected $table = 'hotels';

  /**
   * @var array
   */
  protected $fillable = ['name', 'address'];

  /**
   * @param $id
   * @return $this
   */
  public function setId($id) {
	$this->setAttribute('id', $id);
	return $this;
  }

  /**
   * @param $name
   * @return $this
   */

  public function setName($name) {
	$this->setAttribute('name', $name);
	return $this;
  }

  /**
   * @param $address
   * @return $this
   */
  public function setAddress($address) {
	$this->setAttribute('address', $address);
	return $this;
  }

  /**
   * @return mixed
   */
  public function getId() {
    return $this->getAttribute('id');
  }

  /**
   * @return mixed
   */
  public function getName() {
	return $this->getAttribute('name');
  }

  /**
   * @return mixed
   */
  public function getAddress() {
	return $this->getAttribute('address');
  }
}