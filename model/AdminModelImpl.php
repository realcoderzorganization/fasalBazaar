<?php
include 'AdminModel.php';
include '../dbUtility/DbConnection.php';
include '../LoggersFiles/includes.php';

class AdminModelImpl implements AdminModel
{
    public function ViewTotalUser_Activeuser()
    {
        //Establish database connection
        $con = DbConnection::getConnection();
        $sql1 = "SELECT * FROM fasalbazaar.farmer;";
        $sql2 = "SELECT * FROM fasalbazaar.retailer;";
        $sql3 = "SELECT retailer.retailerID FROM fasalbazaar.retailer WHERE  retailer.status='active';";
        $sql4 = "SELECT farmer.farmerID FROM fasalbazaar.farmer WHERE farmer.status = 'active';";
        $result1 = $con->query($sql1);
        $result2 = $con->query($sql2);
        $result3 = $con->query($sql3);
        $result4 = $con->query($sql4);

        //Closing database connection
        DbConnection::closeConnection();

        $row1 = mysqli_num_rows($result1) + mysqli_num_rows($result2);
        $row2 = mysqli_num_rows($result3) + mysqli_num_rows($result4);

        //Calling log function to add the action to the log file
        $log = "Admin viewed the active user and total user";
        logger($log);

        $arr = array($row1, $row2);
        return $arr;
    }

    public function ViewFarmerData()
    {
        if (function_exists("info") == TRUE) {
            // info("INFO: Inside the AdminModel & caliing Farmer Data to show list of farmers");
        }

        //Establish database connection
        $con = DbConnection::getConnection();
        $sql = "SELECT farmerID,name,contact,email,status FROM fasalbazaar.farmer";
        $result = $con->query($sql);
        //Calling log function to add the action to the log file
        $log = "Farmer data retrieved by the admin";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();
        return $result;
    }
    public function ViewRetailerData()
    {

        //Establish database connection
        $con = DbConnection::getConnection();
        $sql = "SELECT  retailerID,name,contact,email,status FROM fasalbazaar.retailer;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Retailer data retrieved by the admin";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();

        // Logger::_info("Return the Farmer Data.");
        return $result;
    }
    public function DeleteFarmer($farmerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();
        $sql = "DELETE FROM fasalbazaar.farmer WHERE farmerID=$farmerID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Admin deleted the farmer with farmer Id ($farmerID)";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();
        return $result;
    }
    public function DeleteRetailer($retailerID)
    {
        //Establish database connection
        $con = DbConnection::getConnection();
        $sql = "DELETE FROM fasalbazaar.retailer WHERE retailerID=$retailerID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Admin deleted the retailer with retailer Id ($retailerID)";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();
        return $result;
    }
    public function ViewHistory()
    {
        //Establish database connection
        $con = Dbconnection::getConnection();
        $sql = "SELECT farmer.name,retailer.name,crop.crop,history.quantity,history.totalPrice FROM fasalbazaar.farmer,fasalbazaar.retailer,fasalbazaar.crop,fasalbazaar.history WHERE farmer.farmerID=history.farmerID AND retailer.retailerID=history.retailerID AND crop.cropID=history.cropID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "History data retrieved by the admin";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();
        return $result;
    }
    public function ViewCrop()
    {
        //Establish database connection
        $con = DbConnection::getConnection();
        $sql = "SELECT farmer.name, crop.crop, crop.type, crop.quantity, crop.unitPrice FROM fasalbazaar.crop ,fasalbazaar.farmer WHERE farmer.farmerID=crop.farmerID;";
        $result = $con->query($sql);

        //Calling log function to add the action to the log file
        $log = "Crop data retrieved by the admin";
        logger($log);

        //Closing database connection
        DbConnection::closeConnection();
        return $result;
    }
};
