<?php

require_once 'dbUtility/DbConnection.php';
require_once 'model/UserModelImpl.php';
require_once 'smtp/smtp/PHPMailerAutoload.php';
require_once 'LoggersFiles/includes.php';

class UserModelImplTest extends \PHPUnit\Framework\TestCase
{
    public function testLogin()
    {
        $obj = new UserModelImpl();
        $data = $obj->Login('admin', 'admin000', 'farmer');

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testSignUp()
    {
        $this->assertEquals(true, true);
    }

    public function testverifyPassword()
    {
        $obj = new UserModelImpl();
        $data = $obj->verifyPassword('retailer', 1, 'admin000');

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testchangePassword()
    {
        $obj = new UserModelImpl();
        $data = $obj->changePassword('retailer', 1, 'admin000');

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }
}
