<?php

namespace Aydin0098\User\Tests\Unit;

use Aydin0098\User\Services\VerifyCodeService;
use Tests\TestCase;

class VerifyCodeServiceTest extends TestCase
{

    public function test_generate_code_is_6_digit()
    {
        $code = VerifyCodeService::generate();
        $this->assertIsNumeric($code,'Generated Code is Not Numeric');
        $this->assertLessThanOrEqual(999999,$code,'Generated Code is less than 999999 ');
        $this->assertGreaterThanOrEqual(100000,$code,'Generated Code is Greater than 100000 ');
    }

    public function test_verify_code_can_store()
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store(1,$code,now()->addDay());
        $this->assertEquals($code,cache()->get('verify_code_1'));

    }

}
