
<?php
Date_default_timezone_set('Africa/accra');
//set up ddb connection
Include ("connection.php");
$Transid = $_Get["TransID"];
$RequestType = $_Get["RequestType"];
$MSISDN = $_GET["MSISDN"];
$SHORTCODE = $_Get["SHORTCODE"];
$AppID = $_Get["AppID"];
$USSDString = $_Get["USSDstring"];
$CellNumber = $_Get["CellNumber"];
$Token = $_Get["Token"];

$sql="INSERT INTO 'TransID', 'RequestType', 'SHORTCODE','USSDDstring,"
        VALUES
        



switch($RequestType){
    case 1:
    $message"Welcome to Ritcas\n";
    $sql = "Select * FROM menu where status=1";
    $sql = mysql_query($sql);
    while ($tab = mysi_fetch_array($qer)){
        $message. = $tab['participart_idd']. ".tab['name']."\n;
    }
        echo "&TransId=".$Transid."&RequestType=2&MSISDN=".
            $MSISDN."&AppId=".$AppId."&USSDString=".$
            message."&TypeofMessage=0";
        break;
        case2:
        //check balance
        $balance = check_balance($MSISDN);
        //Check if the amount is sufficient
        $sql="select count(*) as isa from participant
            where participant_id=".$details[2] ."and 
            status=1,
        $qer = mysql_query($sql);
        $tab = mysql_fetch_array($qer);
        if ($tab['isa']==0){
            $message=&details[2]."is not in the listt";
        }
        esle{
            if ($balance>0){
                //remove the balance from IN
                change_balance($MSISDN), -1);
                //Update our db bcos message sent
                $sql="Update participant set point +1
                    where participant_id=".$details[2];
                mysql_query($sql);
                //send SMS to the user
                $message = "you have successfully voted for 
                    %".$details[2]."Thank you";
                $sms= "
                    Thank%20you%for%20your%20vote%20has%20been%20
                    submitted";
                rowbin_mail('Ritcas project', $MSISDN, $sms)
                    ;
                $message="you do not have enough 
                balance, please recharge";


            } 
        }
    }    



}


?>

