<?php
/**
 * Created by PhpStorm.
 * User: Ulle
 * Date: 17-Jan-19
 * Time: 16:59
 */
namespace TDD;
class Receipt {
    public function total(array $items = []) {
        return array_sum($items);
    }
    //add a tax calculation method with two inputs
    public function tax($amount, $tax){
        return ($amount * $tax);
    }
}