<?php

namespace Tests\Unit;

use Aydin0098\User\Rules\MobileValid;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_can_not_be_less_then_11_character()
    {
        $result = (new MobileValid())->passes('','09398933139');
        $this->assertEquals(0,$result);

    }
    public function test_mobile_can_not_be_more_then_11_character()
    {
        $result = (new MobileValid())->passes('','9398933139');
        $this->assertEquals(0,$result);

    }
    public function test_mobile_start_0()
    {
        $result = (new MobileValid())->passes('','3398933139');
        $this->assertEquals(0,$result);

    }
}


