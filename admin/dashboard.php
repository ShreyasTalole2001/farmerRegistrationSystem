<?php
session_start();

include '../DB/chanaRegDB.php';

if ($_SESSION['login'] == true) {
} else {
    header('Location: ./login.php ');
}

if (isset($_POST["GenerateZip"])) {
    unlink('../zipFiles/output.zip');
    include './makezip.php';
}



$cropType = mysqli_real_escape_string($chanaRegDB_Conn, $_POST['cropType']);
$_SESSION['cropType'] = $cropType;



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>मलकापूर तालुका कृषी विकास फार्मर प्रोड्युसर कंपनी लि.</title>
    <style>

    </style>
</head>

<body>



    <div style="text-align: center;margin-top: 30px;">
        <img style="width: 400px;" class="img-fluid" src="../images/LOGO1.png">
    </div>

    <div class="container" style="text-align: center;margin-top: 30px;">
        <form method="post" action="export.php">
            <input type="submit" name="export" class="btn btn-success" value="Export Data To Excel" />
        </form>
        <br>
        <form method="post">
            <input type="submit" name="GenerateZip" class="btn btn-success" value="Generate Zip" />
            <a href="../zipFiles/output.zip" download>Download Registered Documents</a>

        </form>
    </div>

    <hr>

    <div class="container">

        <form class="row gx-3 gy-2 align-items-center" method="post">
            <div class="col-4">
                <select class="form-select" col="4" name="cropType">
                    <option selected><?php echo $cropType ?></option>
                    <option value="chana">Chana</option>
                    <option value="toor">Toor</option>
                </select>
            </div>
            <div class="col-4">
                <button class="btn btn-primary">Submit</button>

            </div>
        </form>


        <br>
   
        <!-- This Table fectch data from from `farmer` to print the registered farmers details -->
        <table class="table table-dark table-sm">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Adhar No</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">village</th>
                    <th scope="col">taluka</th>
                    <th scope="col">accountNo</th>
                    <th scope="col">IFSC</th>

                </tr>
            </thead>
            <tbody>

                <?php


                if (isset($cropType)) {
                    // echo $cropType;
                    // echo "<br>";

                    if ($cropType ==  'chana') {
                        $query = "SELECT * FROM `farmers` ORDER BY `id` DESC ";
                        if ($result = mysqli_query($chanaRegDB_Conn, $query)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // print_r($row);
                                $id = $row['id'];
                                $adharNo = $row['adharNo'];
                                $name = $row['name'];
                                $mobileNo = $row['mobileNo'];
                                $taluka = $row['taluka'];
                                $village = $row['village'];
                                $accountNo = $row['accountNo'];
                                $IFSC = $row['IFSC'];


                                print("
                        
                                    <tr>
                                        <th scope='row'>{$id}</th>
                                        <td>{$name}</td>
                                        <td>{$adharNo}</td>
                                        <td>{$mobileNo}</td>
                                        <td>{$village}</td>
                                        <td>{$taluka}</td>
                                        <td>{$accountNo}</td>
                                        <td>{$IFSC}</td>
                                    </tr>

                        ");
                            }
                        }
                    } else if ($cropType == "toor") {
                        echo "No Data for " . $cropType;
                    }
                }

                ?>


            </tbody>
        </table>





    </div>














    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>