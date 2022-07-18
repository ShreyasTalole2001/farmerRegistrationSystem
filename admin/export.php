<?php  
include '../DB/chanaRegDB.php';

$output = '';
if(isset($_POST["export"]))
{

$fileName = "chana-Booking-data-" . date('Y-m-d') . ".xls";
  header('Content-Type: application/xls');
  header("Content-Disposition: attachment; filename=\"$fileName\""); 
  header("Pragma: no-cache"); 
  header("Expires: 0");
 $query = "SELECT * FROM farmers ORDER BY id ASC";
 $result = mysqli_query($chanaRegDB_Conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>ID</th>  
                         <th>Name</th>  
                         <th>Adhar No</th>  
                         <th>Mobile No</th>  
                         <th>Taluka</th>  
                         <th>Village Code</th>
                         <th>Account No</th>
                         <th>IFSC CODE</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
                     <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["adharNo"].'</td>  
                         <td>'.$row["mobileNo"].'</td>  
                         <td>'.$row["taluka"].'</td>  
                         <td>'.$row["village"].'</td>
                         <td>'.$row["accountNo"].'</td>
                         <td>'.$row["IFSC"].'</td>

                     </tr>
   ';
  }
  $output .= '</table>';
  
  echo $output;
 }
}
?>