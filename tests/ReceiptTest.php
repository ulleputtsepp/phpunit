<?php
/**
 * Created by PhpStorm.
 * User: Ulle
 * Date: 17-Jan-19
 * Time: 17:05
 */
namespace TDD\Test;
require 'vendor\autoload.php';

use PHPUnit\Framework\TestCase;
use TDD\Receipt; //kasuta namespece-s olevat klassi

class ReceiptTest extends TestCase {
    //new instance, enne iga meetodi väljakutsumist
    public function setUp() {
        $this->Receipt = new Receipt();
    }
    //kustutab loodud objekti, unset the instance,
    //runs from one to the next
    public function tearDown() {
        unset($this->Receipt);
    }
    //refactor testTotal
    public function testTotal() {
        $input = [0,2,5,8];
        //add a second input, a coupon
        $coupon = null; //null value will be our dummy object
        $output = $this->Receipt->total($input, $coupon);
        //võrdleb
        $this->assertEquals(
            //oodatav väärtus
            15,
            $output,
            'When summing the total should equal 15'
        );
    }

    //modify the method
    public function testTotalAndCoupon() {
        $input = [0,2,5,8];
        $coupon = 0.20; //real value, 20% off of total
        $output = $this->Receipt->total($input, $coupon);
        $this->assertEquals(
            12,
            $output,
            'When summing the total should equal 12'
        );
    }

    //tax calculation test method
    public function testTax() {
        $inputAmount = 10.00;
        //tax percentage input
        $taxInput = 0.10;
        //call tax method on the Receipt object, returning output
        $output = $this->Receipt->tax($inputAmount, $taxInput);
        $this->assertEquals(
            1.00,
            $output,
            //in case of failure, a message
            'The tax calculaiton should equal 1.00'
        );
    }
}