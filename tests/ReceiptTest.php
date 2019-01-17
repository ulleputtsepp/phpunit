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
use TDD\Receipt;

class ReceiptTest extends TestCase {
    public function testTotal() {
        $Receipt = new receipt();
        $this->assertEquals(
            14,
            $Receipt->total([0,2,5,8]),
            'When summing the total should equal 15'
        );
    }
}