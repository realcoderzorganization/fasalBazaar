<?php
require_once 'model/AdminModelImpl.php';
require_once 'dbUtility/DbConnection.php';
require_once 'LoggersFiles/includes.php';

class AdminModelImplTest extends \PHPUnit\Framework\TestCase
{
    public function testViewTotalUser_Activeuser()
    {
        $obj = new AdminModelImpl();
        $arrData = $obj->ViewTotalUser_Activeuser();
        $val = false;
        if ($arrData[0] >= $arrData[1]) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }

    public function testViewFarmerData()
    {
        $obj = new AdminModelImpl();
        $Data = $obj->ViewFarmerData();
        $val = false;
        if ($Data) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }

    public function testViewRetailerData()
    {
        $obj = new AdminModelImpl();
        $Data = $obj->ViewRetailerData();
        $val = false;
        if ($Data) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }

    public function testDeleteFarmer()
    {
        $con = DbConnection::getConnection();
        $obj = new AdminModelImpl();

        $sql1 = "INSERT INTO fasalbazaar.farmer (name, contact, email, password, status, profileImage) VALUES ('test', 0, 'test@gmail.com', 'test','deactive','profile.png');";
        $con->query($sql1);

        $sql2 = "SELECT farmerID FROM fasalbazaar.farmer WHERE name = 'test' AND password = 'test';";
        $temp2 = $con->query($sql2);

        DbConnection::closeConnection();

        $farmerID = $temp2->fetch_assoc();
        $Data = $obj->DeleteFarmer($farmerID["farmerID"]);
        $val = false;
        if ($Data) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }

    public function testDeleteRetailer()
    {
        $con = DbConnection::getConnection();
        $obj = new AdminModelImpl();

        $sql1 = "INSERT INTO fasalbazaar.retailer (name, contact, email, password, status, profileImage) VALUES ('test', 0, 'test@gmail.com', 'test','deactive','profile.png');";
        $con->query($sql1);

        $sql2 = "SELECT retailerID FROM fasalbazaar.retailer WHERE name = 'test' AND password = 'test';";
        $temp2 = $con->query($sql2);

        DbConnection::closeConnection();

        $retailerID = $temp2->fetch_assoc();
        $Data = $obj->DeleteFarmer($retailerID["retailerID"]);
        $val = false;
        if ($Data) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }

    public function testViewHistory()
    {
        $obj = new AdminModelImpl();
        $Data = $obj->ViewHistory();
        $val = false;
        if ($Data) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }

    public function testViewCrop()
    {
        $obj = new AdminModelImpl();
        $Data = $obj->ViewCrop();
        $val = false;
        if ($Data) {
            $val = true;
        }

        $this->assertEquals(true, $val);
    }
}
