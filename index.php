<?php
// Reaadds the variables sent via Post from At gataway
$sessionId = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["rext"]

if ($text == ""){
    //This is the first request> Note how we start the response with CON
    $response = "CON what woulld you want tto check \n";
    $response .= "1. My Account No\n";
    $responses .= "2. My Phone Number";
} else if ($text == "1"){
    //Business log for the first level response
    $response = "CON choose account informattion you want to view \n";
    $response .= "1. Account Number \n"
    $response .= "2. Account Balance";
} else if ($text == "2"){
    //Business logic for first level response
    //This is a terminal request. Note how we start with the End
    $response = "End your phone number is".$phoneNumber;
} else if ($text == "1*1"){
    //This is the second level response where the user selected i in the first instance
    $accountNumber = "ACC1001";

    //This is a terminal request, Note how we start the END
    $response = "END Your account Number is ".$accountNumber;

} else if ($text = "1*2") {
    //This is a second to the API. The response depends on the statement that is fulfilled in each instance;
    header('Content-typ; text/plain');
    echo $response; 
}

?>