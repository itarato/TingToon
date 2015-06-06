<?php
/**
 * @file
 */

namespace TingToon\Cartoon;

class CartoonRenderer {

  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function getXOf($name) {
    return @$this->data->{$name}->x;
  }

  public function getYOf($name) {
    return @$this->data->{$name}->y;
  }

  public function getTextOf($name) {
    return @$this->data->{"{$name}_text"}->text;
  }

  public function getXYCSSOf($name) {
    return 'top:' . $this->getYOf($name) . 'px;left:' . $this->getXOf($name) . 'px;';
  }

}
