<?php
session_start();
include '../../DB/chanaRegDB.php';

if(isset($_SESSION['adharNo'])){
    // Stay Here
}else{
    header('Location: ../index.php ');
}


$adharNo =  $_SESSION['adharNo'];
$query = "SELECT * FROM farmers WHERE adharNo = '$adharNo'";
$result = mysqli_query($chanaRegDB_Conn,$query);
$row = mysqli_fetch_array($result);

print_r($row);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>मलकापूर तालुका कृषी विकास फार्मर प्रोड्युसर कंपनी लि.</title>
    <style>
    body {
        background-color: #FCFAF8;
    }

    #wrapper {
        border: 1px dashed black;
        width: 400px;
        margin: 0px auto;
        margin-top: 50px;
        padding: 10px;
        border-radius: 10px;
        color: green;
        background-color: white;
    }

    #wrapper h4 {
        text-align: center;
    }
    </style>
</head>

<body>
    <div style="text-align: center;margin-top: 30px;">
        <img style="width: 400px;" class="img-fluid" src="../../images/LOGO1.png">
    </div>
    <div class='container' id="wrapper">
        <h4>नमस्कार शेतकरी बंधू, तुमची नोंद यशस्वी रित्या पूर्ण झाली आहे. </h4>
        <p>पुढील माहिती तुम्हाला एस.एम.एस. द्वारे कळविण्यात येईल.</p>
        <p>नोंदणी क्रमांक : - <?php  echo $row[0]; ?> </p>
    </div>
    <br>
    <br>

    <div class='container' style="text-align:center;">
        <a href="../../index.php" class='btn btn-dark'>Add New Entry</a>
    </div>

    <!-- <div style="text-align:center;">
        <a></a>
    </div> -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 

</body>

</html>