<html>
<body>
<?php //get data

$tableRowNum = $_POST["tablerownum"];

//echo $tableRowNum."<br>";

  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  $host = "mysql.cc.puv.fi:3306";
  $user = "e1100587";
  $pass = "vxnB9ws3N5M7";

  $databaseName = "e1100587_questionnaire";
  $tableName = $_POST["tablebasename"];

  $LENGTH_LIMIT = 3;

  //--------------------------------------------------------------------------
  // 1) Connect to mysql database
  //--------------------------------------------------------------------------
  include 'DB.php';
  $con = mysql_connect($host,$user,$pass);
  if (!$con)
  {
    die('Sorry, Could not connect: ' . mysqli_error($con));
  }

  $dbs = mysql_select_db($databaseName, $con);
  
  
  for($i=0;$i<$tableRowNum;$i++)
  {
      $questidtemp=$_POST["questid".$i];
      $setidtemp=$_POST["setid".$i];

      if($_POST["questtypeid".$i]=='1')
        $questtypeidtemp="1";
      else
        $questtypeidtemp="2";

      $questbodytemp=$_POST["questbodyid".$i];

      $sqlcheckquery1 = "SELECT * FROM $tableName WHERE QuestID='$questidtemp' AND QuestBody=\"$questbodytemp\" AND SetID='$setidtemp' AND QuestTypeID= '$questtypeidtemp'"; 
      $sqlcheckquery2 = "SELECT * FROM $tableName WHERE QuestID='$questidtemp' AND SetID='$setidtemp'"; 

      if(mysql_numrows(mysql_query($sqlcheckquery1))==0)//different
        {
            if(mysql_numrows(mysql_query($sqlcheckquery2))==0)
            {
                if(strlen($questbodytemp)>$LENGTH_LIMIT)//insert
                {
                  $sqlinsertquery="INSERT INTO `e1100587_questionnaire`.`$tableName` (`UserID`, `QuestID`, `QuestBody`, `SetID`, `QuestTypeID`) VALUES ('1', '$questidtemp', \"$questbodytemp\", '$setidtemp', '$questtypeidtemp')";
                  mysql_query($sqlinsertquery);
                }
            }
            else
            {
                if(strlen($questbodytemp)>$LENGTH_LIMIT)//update
                {
                  $sqlupdatequery="UPDATE  $tableName SET  QuestTypeID =  '$questtypeidtemp', QuestBody=\"$questbodytemp\" WHERE  UserID ='1' AND  QuestID = '$questidtemp' AND SetID = '$setidtemp' LIMIT 1";
                  mysql_query($sqlupdatequery);
                }
                else//delete
                {
                  $sqldeletequery="DELETE FROM $tableName WHERE UserID ='1' AND  QuestID = '$questidtemp' AND SetID = '$setidtemp' LIMIT 1";
                  mysql_query($sqldeletequery);
                }
            }

        }

  }
  



if($tableName=='SRForm1')
echo "<center>Save completed<br><a href='sensor_admin.php'>Back</a></center>";
else
  if($tableName=='SRForm2')
echo "<center>Save completed<br><a href='sensor2_admin.php'>Back</a></center>";
else
  echo "<center>Something wrong, sorry<br><a href='sensor2_admin.php'>Back</a></center>";

  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  //echo json_encode($array);

  mysqli_close($con);
  ?>


</body>
</html>