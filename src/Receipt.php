<?php
/**
 * Created by PhpStorm.
 * User: Ulle
 * Date: 17-Jan-19
 * Time: 16:59
 */
namespace TDD;
class Receipt {
    //add a coupon-parameter
    public function total(array $items = [], $coupon) {
        $sum = array_sum($items);
        //use the coupon value on the total
        if (!is_null($coupon)) {
            return $sum - ($sum * $coupon);
        }
        return $sum;
    }
    //add a tax calculation method with two inputs
    public function tax($amount, $tax){
        return ($amount * $tax);
    }
}