<?php
/**
 * @file
 */

namespace TingToon\Cartoon;

class CartoonRenderer {

  /**
   * @var object
   */
  private $data;

  /**
   * @var int
   */
  private $id;

  public function __construct($record) {
    $this->data = json_decode($record['data']);
    $this->id = (int) $record['id'];
  }

  public function getXOf($name) {
    return @$this->data->{$name}->x;
  }

  public function getYOf($name) {
    return @$this->data->{$name}->y;
  }

  public function getTextOf($name) {
    return @$this->data->{"{$name}_text"};
  }

  public function getXYCSSOf($name) {
    return 'top:' . $this->getYOf($name) . 'px;left:' . $this->getXOf($name) . 'px;';
  }

  /**
   * @return int
   */
  public function getId() {
    return $this->id;
  }

}
