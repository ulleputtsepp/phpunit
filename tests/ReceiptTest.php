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

    //method for building a mock instance of the Receipt class
    public function testPostTaxTotal() {
        //for test mock use predefined values for the items, tax, coupon
        $items = [1,2,5,8];
        $tax = 0.20;
        $coupon = null;
        //build a mock PHPUnit
        //and add namespace name of the class we want to build
        //doubles need to be saved to a local variable, set it to local $Receipt variable
        $Receipt = $this->getMockBuilder('TDD\Receipt')
            //the call setMethods takes an array of methods (as parameter) to respond to
            ->setMethods(['tax', 'total'])
            ->getMock();
        //methods only called once, correct inputs
        $Receipt->expects($this->once())
            ->method('total')
            ->with($items, $coupon)
            ->will($this->returnValue(10.00));
        $Receipt->expects($this->once())
            ->method('tax')
            ->with(10.00, $tax)
            ->will($this->returnValue(1.00));
        $result = $Receipt->postTaxTotal([1,2,5,8], 0.20, null);
        $this->assertEquals(11.00, $result);
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