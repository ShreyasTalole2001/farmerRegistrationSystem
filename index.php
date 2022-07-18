<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$adharNo = $_POST['adharNo'];
$crop = $_POST['crop'];
$error='';

// echo $crop;

if(strlen($adharNo) != 12){
    $error = "आधार क्रमांक चुकीचा आहे.";
}else{
    $_SESSION['adharNo']= $adharNo;
    $_SESSION['crop']= $crop;


        header('Location: ./form.php');
   


}


}


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



        #notice {
            border: 1px dashed black;
            border-radius: 20px;

            max-width: 500px;
            margin: 0px auto;
            margin-top: 20px;
            padding: 10px;
            background-color: white;
            color: red;
        }

        #adharCardContainer{
            margin: 0px auto;
            max-width: 400px;
            margin-top: 20px;

            
        }
    </style>
</head>

<body>

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img style="width: 200px;" class='img-fluid' src="./images/LOGO1.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-success" href="http://www.malkapurfpc.com" tabindex="-1" aria-disabled="true">Back To Website</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="container" id="wrapper">
        <!-- <div style="text-align: center;margin-top: 30px;">
            <img style="width: 400px;" class="img-fluid" src="./images/LOGO1.png">
        </div> -->
        <h1 style="text-align: center;margin-top: 30px;"> हमीभाव खरेदी नोंदणी</h1>

        <div id="notice">
            <i class="fas fa-exclamation"></i>
            नोंदणी करत असताना Refresh बटन दाबू नका. <br>
            फक्त PDF फाईल अपलोड करा. <br>
            सामूहिक क्षेत्राची एकाच नावाने नोंद होईल. <br>
            दोन किंवा तीन पाणी सातबारा असल्यास एकत्रित PDF करून अपलोड करा. <br>
        </div>

        <div id="adharCardContainer">
            <form class="row gx-3 gy-2 align-items-center" method='post'>
                <div class="col">
                    <input type="text" class="form-control"  pattern="\d*" maxlength="12" placeholder="आधार कार्ड क्रमांक" name='adharNo' required>
                </div> 
                
                <div class="col">
                    <select  class="form-select" name="crop" required>
                        <option selected>SELECT</option>
                        <option value="chana">हरभरा ( चणा )</option>
                        <option value="moong">मुंग</option>
                        <option value="toor">तुर</option>

                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>

                <div style='text-align: center;color:red;'>
                <p><?php  echo $error;  ?></p>

                </div>
            </form>

        </div>

        

        
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>