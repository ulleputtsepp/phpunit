<?php
/**
 * Created by PhpStorm.
 * User: Ulle
 * Date: 17-Jan-19
 * Time: 16:59
 */
namespace TDD;

use \BadMethodCallException; //coupon value >1.00

class Receipt {
    //add a coupon-parameter
    public function total(array $items = [], $coupon) {
        //if statement for exception: coupon value >1.00
        if ($coupon > 1.00) {
            throw new BadMethodCallException('Coupon must be less than or equal to 1.00');
        }
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
    //add a method to calculate the final total of our receipt (total for a collection of items, the tax total, and then sum those two values together)
    public function postTaxTotal($items, $tax, $coupon) {
        $subtotal = $this->total($items, $coupon);
        return $subtotal + $this->tax($subtotal, $tax);
    }
}