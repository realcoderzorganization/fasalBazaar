<?php
require_once 'model/RetailerModelImpl.php';
require_once 'dbUtility/DbConnection.php';
require_once 'LoggersFiles/includes.php';

class RetailerModelImplTest extends \PHPUnit\Framework\TestCase
{
    public function testgetRetailerProfile()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->getRetailerProfile(1);

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testupdateRetailerProfile()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->updateRetailerProfile(2, 'retailer1', 6582643175, 'retailer@abc.com');

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testuploadProfileImage()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->uploadProfileImage(1, 'profile.png');

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testremoveProfileImage()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->removeProfileImage(1);

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testbuyCrop()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->buyCrop(2, 2, 1, 1, 1);

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testpurchaseHistory()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->purchaseHistory(2);

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }

    public function testgetCrop()
    {
        $obj = new RetailerModelImpl();
        $data = $obj->getCrop('grain', 'Wheat');

        $var = false;
        if ($data) {
            $var = true;
        }

        $this->assertEquals(true, $var);
    }
}
