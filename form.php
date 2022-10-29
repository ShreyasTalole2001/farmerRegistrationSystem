<?php
session_start();

if (isset($_SESSION['adharNo']) && $_SESSION['crop']) {
    // Stay Here
} else {
    // Back to index page
    header('Location: ../index.php ');
}

// To show crop name on heading
if($_SESSION['crop'] == "chana"){
    $cropName = "चना";
}else if($_SESSION['crop'] == "moong"){
    $cropName = "मुंग";
}else{
    $cropName = "तुर";
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #FCFAF8;
        }

        @media only screen and (max-width: 600px) {
            body {
                background-color: white;
            }
        }

        #wrapper {
            max-width: 800px;
            margin-top: 30px;
        }

        .heading {
            color: green;
            font-weight: 700;
        }

        .row {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border: 1px dashed black;
            border-radius: 20px;
        }

        @media only screen and (max-width: 600px) {
            .row {
                border: none;

            }
        }

        #satbara1 {
            display: none;
        }

        #satbara2 {
            display: none;
        }

        #satbara3 {
            display: none;
        }

        #satbara4 {
            display: none;
        }

        #satbara5 {
            display: none;
        }
    </style>
    <title>मलकापूर तालुका कृषी विकास फार्मर प्रोड्युसर कंपनी लि.</title>

    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</head>

<body>

    <!-- Nav Bar -->


    <!-- Main Content FORM -->

    <div class="container" id="wrapper">

        <div style="text-align: center;margin-top: 30px;">
            <img style="width: 400px;" class="img-fluid" src="../images/LOGO1.png">
        </div>
        <h4 style="text-align: center;margin-top: 30px;"> <?php echo $cropName ?> हमीभाव खरेदी नोंदणी 2021 - 2022</h4>

        <form action="./<?php echo $_SESSION['crop'] ?>-script/<?php echo $_SESSION['crop'] ?>-Upload.php" method="post" enctype="multipart/form-data">

           
            <div class="row gx-3 gy-2 align-items-center">
                <h5 class="heading">वैयक्तिक माहिती </h5>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">शेतकरी पूर्ण नाव -
                        इंग्रजी</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">आधार क्रमांक</label>
                    <input type="text" class="form-control" id="adharNo" name="adharNo" value="<?php echo $_SESSION['adharNo']; ?>" readonly>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">आधार कार्ड अपलोड
                        (PDF)</label>
                    <input type="file" class="form-control" name="adharCardImage" id="adharCardImage" accept="application/pdf" onchange="ValidateSingleInput(this);" required>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">मोबाईल नंबर</label>
                    <input type="text" class="form-control" id="mobileNo" name="mobileNo" required>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">तालुका</label>
                    <select name="taluka" class="form-select" required>
                        <option selected>तालुका निवडा</option>
                        <option value="Malkapur">मलकापूर - Malkapur</option>
                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">गाव</label>
                    <select name="village" class="form-select" required>
                        <option selected>गाव निवडा</option>

                        <option value="Aland">आळंद - Aland</option>

                        <option value="Anurabad">अनुराबाद - Anurabad</option>

                        <option value="Bahapura">बहापुरा - Bahapura</option>

                        <option value="Balad Pr. Malkapur"> - Balad Pr. Malkapur</option>

                        <option value="Belad">बेलाड - Belad</option>

                        <option value="Bhadgani">भाडगणी - Bhadgani</option>

                        <option value="Bhalegaon">भालेगाव - Bhalegaon</option>

                        <option value="Bhangura">भानगुरा - Bhangura</option>

                        <option value="Bhorkhod">भोरखेड - Bhorkhod bk I</option>

                        <option value="Chikhali">चिखली - Chikhali</option>

                        <option value="Chinchkhed Bk.">चींचखेड बु. - Chinchkhed Bk.</option>

                        <option value="Chinchol">चिंचाेल - Chinchol</option>

                        <option value="Dasarkhed">दसरखेड - Dasarkhed</option>

                        <option value="Datala">दाताळा - Datala</option>

                        <option value="Deodhaba">देवधाबा - Deodhaba</option>

                        <option value="Dharangaon">धरणगाव - Dharangaon</option>

                        <option value="dhodi I"> - dhodi I</option>

                        <option value="Dhogardi">धाेंगर्डी - Dhogardi</option>

                        <option value="Dhogardi n"> - Dhogardi n</option>

                        <option value="Dudhalgaon Bk.">दुधलगाव बु . - Dudhalgaon Bk.</option>

                        <option value="Dudhalgaon Kh.">दुधलगाव खु . - Dudhalgaon Kh.</option>

                        <option value="Gadegaon">गाडेगांव - Gadegaon</option>

                        <option value="Gadegaon I"> - Gadegaon I</option>

                        <option value="Gahukhed">गहूखेड - Gahukhed</option>

                        <option value="Gaulkhed">गाैलखेड - Gaulkhed</option>

                        <option value="Ghirni">घिर्णी - Ghirni</option>

                        <option value="Ghodi">घोडी - Ghodi</option>

                        <option value="Ghodi n"> - Ghodi n</option>

                        <option value="golkhed I"> - golkhed I</option>

                        <option value="Gorad">गोराड - Gorad</option>

                        <option value="Gundha">गुंढा - Gundha</option>

                        <option value="Harankhed">हरणखेड - Harankhed</option>

                        <option value="Harsoda">हरसोडा - Harsoda</option>

                        <option value="harsoda I"> - harsoda I</option>

                        <option value="hingala dharangaon I"> - hingala dharangaon I</option>

                        <option value="Hingana Dharangaon">हिंगणा धरणगाव - Hingana Dharangaon</option>

                        <option value="Hingana Kazi">हिंगणा काझी - Hingana Kazi</option>

                        <option value="hingana nagapur I"> - hingana nagapur I</option>

                        <option value="Hingana Nagpur">हिंगणा नागापूर - Hingana Nagpur</option>

                        <option value="Jalalabad">जलालाबाद - Jalalabad</option>

                        <option value="jalalabad I"> - jalalabad I</option>

                        <option value="Jambhuldhaba">जांबुळधाबा - Jambhuldhaba</option>

                        <option value="Kalegaon">काळेगाव - Kalegaon</option>

                        <option value="Kamnapur">कमानापूर - Kamnapur</option>

                        <option value="Kamnapur n"> - Kamnapur n</option>

                        <option value="Kamrdipur">कमर्दीपूर - Kamrdipur</option>

                        <option value="Khadki">खडकी - Khadki</option>

                        <option value="Khamkhed Pr.malkapur">खामखेड - Khamkhed Pr.malkapur</option>

                        <option value="Khaparkhed">खापरखेड - Khaparkhed</option>

                        <option value="Khayam"> - Khayam</option>

                        <option value="Khokodi">खाेकाेडी - Khokodi</option>

                        <option value="Kinhi n"> - Kinhi n</option>

                        <option value="Korwad">काेेरवाड - Korwad</option>

                        <option value="Kund Bk">कुंड बु - Kund Bk.</option>

                        <option value="Kund Kh.">कुंड खु - Kund Kh.</option>

                        <option value="Lahe Kh.">लेह खु - Lahe Kh.</option>

                        <option value="Lasura">लासूरा - Lasura</option>

                        <option value=" Liha kh I">‍लिहा खु - Liha kh I</option>

                        <option value="Lonwadi Pr.">लोणवडी - Lonwadi Pr.</option>

                        <option value="Makner">माकनेर - Makner</option>

                        <option value="Malkapur (rural)">मलकापूर ग्रामीण - Malkapur (rural)</option>

                        <option value="Malkapur Urban">मलकापूर शहर - Malkapur Urban</option>

                        <option value="Mhaiswadi">म्हैसवाडी - Mhaiswadi</option>

                        <option value="Morkhed Bk.">मोरखेड बु. - Morkhed Bk.</option>

                        <option value="Morkhed Kh.">मोरखेड खु. - Morkhed Kh.</option>

                        <option value="narvel I"> - narvel I</option>

                        <option value="Narwel">नरवेल - Narwel</option>

                        <option value="Nimbari">निंबारी - Nimbari</option>

                        <option value="nimbari I"> - nimbari I</option>

                        <option value="Nimboli">निंबोळी - Nimboli</option>

                        <option value="Nimkhed">निमखेड - Nimkhed </option>

                        <option value="Panhera">पान्हेरा - Panhera Pr.malkapur</option>

                        <option value="Pimpalkhunta (mahadeo)">पिंपळखुटा महादेव - Pimpalkhunta (mahadeo)</option>

                        <option value="Pimpalkhuta">पिंपळखुटा - Pimpalkhuta Pr.vadner</option>

                        <option value="Rangaon">रणगांव - Rangaon</option>

                        <option value="Rantham">रणथम - Rantham</option>

                        <option value="Rastapur">रास्तापूर - Rastapur</option>

                        <option value="Sawali">सावळी - Sawali</option>

                        <option value="Shivni">शिवणी - Shivni</option>

                        <option value="Siradhon">शिराढोण - Siradhon</option>

                        <option value=" stapur I"> - stapur I</option>

                        <option value="Talaswada">तालसवाडा - Talaswada</option>

                        <option value=" Tandulwadi">तांदुलवाडी - Tandulwadi Pr.malkapur</option>

                        <option value="Telkhed">तेलखेड - Telkhed</option>

                        <option value="Tigarha">तिघ्रा - Tigarha</option>

                        <option value="Umali">उमाळी - Umali</option>

                        <option value="vakodi"> - vakodi I</option>

                        <option value="Wadji">वडजी - Wadji</option>

                        <option value="Wadoda">वडोदा - Wadoda</option>

                        <option value="Waghola">वाघोळा - Waghola</option>

                        <option value="Wagholi">वाघोली - Wagholi</option>

                        <option value="Waghud">वाघूड - Waghud</option>

                        <option value="Wajirabad">वजिराबाद - Wajirabad</option>

                        <option value="Wakodi">वाकोडी - Wakodi</option>

                        <option value="Warkhed">वरखेड - Warkhed</option>

                        <option value="Wiwara">विवरा - Wiwara</option>

                        <option value="Zodga">झोडगा - Zodga</option>

                    </select>
                </div>
            </div>


            <!-- ---------------------- -->

            <div class="row gx-3 gy-2 align-items-center">

                <h5 class="heading">बॅंक / अकाउंट नंबर तपशील </h5>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">अकाउंट नंबर</label>
                    <input type="text" class="form-control" id="accountNo" name="accountNo" required>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">अकाउंट नंबर पुन्हा टाका
                    </label>
                    <input type="text" class="form-control" id="accountNoRevised" name="accountNoRevised" required>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">IFSC कोड </label>
                    <input type="text" class="form-control" id="IFSC" name="IFSC" required>
                </div>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">बॅंक पासबुक अपलोड
                        (PDF)</label>
                    <input type="file" class="form-control" name="bankPassBookImage" accept="application/pdf" onchange="ValidateSingleInput(this);" required>
                </div>

            </div>




            <!-- ---------------------- -->

            <div class="row gx-3 gy-2 align-items-center">
                <h5 class="heading">जमिनीचा 7/12 तपशील</h5>

                <div class="col-sm-4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">एकूण ७/१२ संख्या</label>
                    <select name="satb" class="form-select" id="satbaraSelect" onchange="myFunction()" name="satbaraSelect" required>
                        <option selected>निवडा</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>


                <div class="col-sm-4" id="satbara1">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">७/१२ अपलोड - 1
                        (PDF)</label>
                    <input type="file" class="form-control" name="satbara1" accept="application/pdf" onchange="ValidateSingleInput(this);" required>
                </div>

                <div class="col-sm-4" id="satbara2">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">७/१२ अपलोड - 2
                        (PDF)</label>
                    <input type="file" class="form-control" name="satbara2" accept="application/pdf" onchange="ValidateSingleInput(this);">
                </div>

                <div class="col-sm-4" id="satbara3">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">७/१२ अपलोड - 3
                        (PDF)</label>
                    <input type="file" class="form-control" name="satbara3" accept="application/pdf" onchange="ValidateSingleInput(this);">
                </div>

                <div class="col-sm-4" id="satbara4">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">७/१२ अपलोड - 4
                        (PDF)</label>
                    <input type="file" class="form-control" name="satbara4" accept="application/pdf" onchange="ValidateSingleInput(this);">
                </div>

                <div class="col-sm-4" id="satbara5">
                    <label for="colFormLabelSm" class="col-sm col-form-label col-form-label-sm">७/१२ अपलोड - 5
                        (PDF)</label>
                    <input type="file" class="form-control" name="satbara5" accept="application/pdf" onchange="ValidateSingleInput(this);">
                </div>



            </div>



            <div class="row gx-3 gy-2 align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckChecked">
                        मी मान्य करतो कि, वरील भरेलेली माहिती सत्य आहे. जर खोटी किंवा कागदपत्रे अस्पष्ट आढळली तर
                        <b>मलकापूर तालुका कृषी विकास फार्मर प्रोड्युसर कंपनी लि.</b> ला माझी नोंदणी रद्द करण्याचा अधिकार
                        आहे.

                    </label>
                </div>
                <div style="margin-top: 30px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>


        </form>


    </div>

    <br>
    <br>
    <br>
    <br>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("satbaraSelect").value;
            // console.log(x)

            if (x == 1) {
                document.getElementById("satbara1").style.display = "block";
                document.getElementById("satbara2").style.display = "none";
                document.getElementById("satbara3").style.display = "none";
                document.getElementById("satbara4").style.display = "none";
                document.getElementById("satbara5").style.display = "none";
            } else if (x == 2) {
                document.getElementById("satbara1").style.display = "block";
                document.getElementById("satbara2").style.display = "block";
                document.getElementById("satbara3").style.display = "none";
                document.getElementById("satbara4").style.display = "none";
                document.getElementById("satbara5").style.display = "none";
            } else if (x == 3) {
                document.getElementById("satbara1").style.display = "block";
                document.getElementById("satbara2").style.display = "block";
                document.getElementById("satbara3").style.display = "block";
                document.getElementById("satbara4").style.display = "none";
                document.getElementById("satbara5").style.display = "none";

            } else if (x == 4) {
                document.getElementById("satbara1").style.display = "block";
                document.getElementById("satbara2").style.display = "block";
                document.getElementById("satbara3").style.display = "block";
                document.getElementById("satbara4").style.display = "block";
                document.getElementById("satbara5").style.display = "none";

            } else if (x == 5) {
                document.getElementById("satbara1").style.display = "block";
                document.getElementById("satbara2").style.display = "block";
                document.getElementById("satbara3").style.display = "block";
                document.getElementById("satbara4").style.display = "block";
                document.getElementById("satbara5").style.display = "block";

            }
        }
    </script>

    <!-- File Extension Validator -->
    <script>
        var _validFileExtensions = [".pdf"];

        function ValidateSingleInput(oInput) {
            if (oInput.type == "file") {
                var sFileName = oInput.value;
                if (sFileName.length > 0) {
                    var blnValid = false;
                    for (var j = 0; j < _validFileExtensions.length; j++) {
                        var sCurExtension = _validFileExtensions[j];
                        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() ==
                            sCurExtension.toLowerCase()) {
                            blnValid = true;
                            break;
                        }
                    }

                    if (!blnValid) {
                        alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(
                            ", "));
                        oInput.value = "";
                        return false;
                    }
                }
            }
            return true;
        }
    </script>

</body>

</html>