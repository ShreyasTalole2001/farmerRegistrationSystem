<?php
session_start();
include '../../DB/chanaRegDB.php';
if(isset($_SESSION['adharNo'])){
    // Stay Here
}else{
    header('Location: ../index.php ');
}

$adharNo =  $_SESSION['adharNo'];
$crop = $_SESSION['crop'];
$query = "SELECT * FROM farmers WHERE adharNo = '$adharNo'";
$result = mysqli_query($chanaRegDB_Conn,$query);
$row = mysqli_fetch_array($result);



$mobileNo = $row['mobileNo'];
echo $mobileNo;
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=hG9Yk0USEMNt3g2rfPTJXHp8D6BlZFiVnOqoAx5dscIveQ1jyupgz3A5bejVyRnr0KUDHhPIwMLNc6XJ&sender_id=TXTIND&message=" 
    . urlencode('Your registration no is '. $row[0] . 
                ' 
                Malkapur Taluka Krushi Vikas Farmer Producer Company Ltd.') 
    . "&route=v3&numbers=" . urlencode($mobileNo),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}


header('Location: ./'.$crop.'-RegSuccess.php');
