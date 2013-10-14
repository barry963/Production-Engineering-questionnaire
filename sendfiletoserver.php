<html>
<body>


<?php

if(!empty($_POST['formData']))
{
$data = $_POST['formData'];
$fname = "test.xls";//generates random name
//header("Content-type: application/vnd.ms-excel");
//header("Content-Disposition: attachment; filename=$fname");
//echo $data;



if($file = fopen("./tempDownload/".$fname, "w"))
	{
		fwrite($file, $data);
		fclose($file);
	}
else
	{
	echo "fuck..";
	}
}

?>

</body>
</html>