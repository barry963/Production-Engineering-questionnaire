<html>
<body>



<?php 
//define the receiver of the email 


$to = $_POST["email"];
$filenametext =$_POST["filename"];

if(!empty($_POST['formData']))
{
$data = $_POST['formData'];

//$fname = "test.xls";//generates random name
$fname = uniqid('result_').".xls";


if($file = fopen("./tempDownload/".$fname, "w"))
	{
		fwrite($file, $data);
		fclose($file);
	}
else
	{
	echo "Sorry, something wrong...please contact the admin";
	}
}

$attachmentfile =$_FILES["resultfile"]["tmp_name"];
$attachmentfiletype=$_FILES["resultfile"]["type"];
$attachmentfilename=$_FILES["resultfile"]["name"];




//define the subject of the email 
$subject = 'Sense and Respond Questionnaire Result'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash 
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n 
$headers = "From: e1100587@vamk.fi\r\nReply-To: e1100587@puv.fi"; 
//add boundary string and mime type specification 
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks

/*
$fp=fopen($attachmentfile,"r");
$read=fread($fp, filesize($attachmentfile)); 
$attachment = chunk_split(base64_encode($read));
*/

$attachment = chunk_split(base64_encode(file_get_contents("./tempDownload/".$fname)));

//define the body of the message. 
ob_start(); //Turn on output buffering 
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<h2><?php echo $filenametext; ?></h2> 
<p>Note that this letter has been sent out automatically and that it cannot be replied to.</p> 

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/vnd.ms-excel; name:<?php echo $fname ; ?> 
Content-disposition: attachment; filename=<?php echo $fname ; ?> 
Content-Transfer-Encoding: base64  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
//copy current buffer contents into $message variable and delete current output buffer 
$message = ob_get_clean(); 
//send the email 
$mail_sent = @mail( $to, $subject, $message, $headers ); 
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent to $to, Filename: $fname " : "Mail failed, please send again"; 
unlink("./tempDownload/".$fname);
?>



</body>
</html>