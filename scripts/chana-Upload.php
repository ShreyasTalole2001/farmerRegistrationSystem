<?php
session_start();
include '../DB/chanaRegDB.php';

$adharNo = $_SESSION['adharNo'];
$crop = $_SESSION['crop'];

$target_dir = "../chana-NondaniFiles/";
$adharCardImage = $target_dir . basename($_FILES["adharCardImage"]["name"]);
$bankPassBookImage = $target_dir . basename($_FILES["bankPassBookImage"]["name"]);
$satbara1 = $target_dir . basename($_FILES["satbara1"]["name"]);
$satbara2 = $target_dir . basename($_FILES["satbara2"]["name"]);
$satbara3 = $target_dir . basename($_FILES["satbara3"]["name"]);
$satbara4 = $target_dir . basename($_FILES["satbara4"]["name"]);
$satbara5 = $target_dir . basename($_FILES["satbara5"]["name"]);



$name = mysqli_real_escape_string($chanaRegDB_Conn,$_POST['name']);
$taluka = mysqli_real_escape_string($chanaRegDB_Conn,$_POST['taluka']);
$village = mysqli_real_escape_string($chanaRegDB_Conn,$_POST['village']);
$accountNoRevised = mysqli_real_escape_string($chanaRegDB_Conn,$_POST['accountNoRevised']);
$IFSC = mysqli_real_escape_string($chanaRegDB_Conn,$_POST['IFSC']);
$mobileNo = mysqli_real_escape_string($chanaRegDB_Conn,$_POST['mobileNo']);





echo "<br>";
$error='';



if(true){

    $query = "INSERT INTO `farmers`(`adharNo`, `name`, `mobileNo`, `taluka`, `village`, `accountNo`, `IFSC`) VALUES ('$adharNo','$name','$mobileNo','$taluka','$village','$accountNoRevised','$IFSC')";
    mysqli_query($chanaRegDB_Conn,$query);

}

// ADHAR CARD UPLOAD
if($_FILES["adharCardImage"]["name"]){
    $temp = explode(".", $adharCardImage);
    $newfilename = './chana-NondaniFiles/documents/'. $name ." " . $adharNo . "-Adhar-Card" .  '.' . end($temp);
    $adharCardImage = $newfilename;

    if (move_uploaded_file($_FILES["adharCardImage"]["tmp_name"], $adharCardImage)) {
            $errorAdhar = 0;
    } else {
            $errorAdhar = 1;
    }
}

// BANK PASS BOOK UPLOAD
if($_FILES["bankPassBookImage"]["name"]){
    $temp = explode(".", $bankPassBookImage);
    $newfilename = './chana-NondaniFiles/documents/'. $name. " " .$adharNo . "-Bank-Pass-Book" .  '.' . end($temp);
    $bankPassBookImage = $newfilename;

    if (move_uploaded_file($_FILES["bankPassBookImage"]["tmp_name"], $bankPassBookImage)) {
        $errorBank = 0;

        $query = "INSERT INTO `documents`(`adharNo`, `bankPassBook`, `adharCard`) VALUES ( '$adharNo','$bankPassBookImage','$adharCardImage')";
        mysqli_query($chanaRegDB_Conn,$query);

    } else {
        $errorBank = 1;
    }
}

// 7/12 UPLOAD
if($_FILES["satbara1"]["name"]){
    $temp = explode(".", $satbara1);
    $newfilename = './chana-NondaniFiles/satbara/'. $name. " " .$adharNo . "-712-1-" .  '.' . end($temp);
    $satbara1 = $newfilename;

    if (move_uploaded_file($_FILES["satbara1"]["tmp_name"], $satbara1)) {
        $errorSatbara1 = 0;

        // Insert File Name in DataBase
        $query = "INSERT INTO `satbara`(`adharNo`, `satbara`) VALUES ('$adharNo','$satbara1')";
        mysqli_query($chanaRegDB_Conn,$query);

    } else {
        $errorSatbara1 = 1;
    }
}

if($_FILES["satbara2"]["name"]){
    $temp = explode(".", $satbara1);
    $newfilename = './chana-NondaniFiles/satbara/'. $name. " " . $adharNo . "-712-2-" .  '.' . end($temp);
    $satbara2 = $newfilename;

    if (move_uploaded_file($_FILES["satbara2"]["tmp_name"], $satbara2)) {
        $errorSatbara2 = 0;

        // Insert File Name in DataBase
        $query = "INSERT INTO `satbara`(`adharNo`, `satbara`) VALUES ('$adharNo','$satbara2')";
        mysqli_query($chanaRegDB_Conn,$query);
    } else {
        $errorSatbara2 = 1;
    }
}

if($_FILES["satbara3"]["name"]){
    $temp = explode(".", $satbara1);
    $newfilename = './chana-NondaniFiles/satbara/'. $name. " " . $adharNo . "-712-3-" .  '.' . end($temp);
    $satbara3 = $newfilename;

    if (move_uploaded_file($_FILES["satbara3"]["tmp_name"], $satbara3)) {
        $errorSatbara3 = 0;

        // Insert File Name in DataBase
        $query = "INSERT INTO `satbara`(`adharNo`, `satbara`) VALUES ('$adharNo','$satbara3')";
        mysqli_query($chanaRegDB_Conn,$query);
    } else {
        $errorSatbara3 = 1;
    }
}

if($_FILES["satbara4"]["name"]){
    $temp = explode(".", $satbara1);
    $newfilename = './chana-NondaniFiles/satbara/'. $name. " " .$adharNo . "-712-4-" .  '.' . end($temp);
    $satbara4 = $newfilename;

    if (move_uploaded_file($_FILES["satbara4"]["tmp_name"], $satbara4)) {
        $errorSatbara4 = 0;

        // Insert File Name in DataBase
        $query = "INSERT INTO `satbara`(`adharNo`, `satbara`) VALUES ('$adharNo','$satbara4')";
        mysqli_query($chanaRegDB_Conn,$query);
    } else {
        $errorSatbara4 = 1;
    }
}

if($_FILES["satbara5"]["name"]){
    $temp = explode(".", $satbara1);
    $newfilename = './chana-NondaniFiles/satbara/'. $name. " " . $adharNo . "-712-5-" .  '.' . end($temp);
    $satbara5 = $newfilename;

    if (move_uploaded_file($_FILES["satbara5"]["tmp_name"], $satbara5)) {
        $errorSatbara5 = 0;

        // Insert File Name in DataBase
        $query = "INSERT INTO `satbara`(`adharNo`, `satbara`) VALUES ('$adharNo','$satbara5')";
        mysqli_query($chanaRegDB_Conn,$query);
    } else {
        $errorSatbara5 = 1;
    }
}

header('Location: ./success/'.$crop.'-sendSMS.php ');



// $files = array($adharCardImage, $bankPassBookImage, $satbara1, $satbara2, $satbara3, $satbara4, $satbara5);
// foreach($files as $file){
//     echo $file;
//     echo "<br>";
// }

// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
// if($imageFileType != "pdf") {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }

// move_uploaded_file($_FILES["adharCardImage"]["tmp_name"], $adharCardImage);
// move_uploaded_file($_FILES["bankPassBookImage"]["tmp_name"], $bankPassBookImage);
// move_uploaded_file($_FILES["satbara1"]["tmp_name"], $satbara1);

// }
?>