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
        $output = $this->Receipt->total($input);
        //võrdleb
        $this->assertEquals(
            //oodatav väärtus
            15,
            $output,
            'When summing the total should equal 15'
        );
    }
}

