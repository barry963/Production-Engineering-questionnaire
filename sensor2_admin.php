<?php
	require_once('auth.php');
?>

<html>
<head>
<title>Sensor and Response Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

<link href="Metro-UI-CSS-master/css/modern.css" rel="stylesheet">
<link href="Metro-UI-CSS-master/css/modern-responsive.css" rel="stylesheet">
<link href="prettify.css" rel="stylesheet" type="text/css">

<script src="jquery-1.8.3.min.js"></script>
<script src="highchart/highcharts.js"></script>
<script src="highchart/highcharts-more.js"></script>
<script src="highchart/modules/exporting.js"></script>

</head>



<script>
//---------------------------- _lu
<?php
  $setIDnum=$_POST[setIDnum];
    if(($setIDnum!='1')&&($setIDnum!='2')&&($setIDnum!='3'))
    	$setIDnum='1';
?>


function changeInputlength(text) 
{ 
		if(text.value)
			text.size=text.value.length;  
} 

function SubmitPhp()
{
	var table=document.getElementById("seqTable");
	var indexNum = table.rows.length-2;
	document.getElementsByName("tablerownum")[0].value=indexNum;
	document.getElementsByName("sensor")[0].submit();
}

function AddListTableRow()
{
	var number = document.getElementById("QuestAdd");
	var table=document.getElementById("seqTable");
	var indexNum = table.rows.length-1;
	for(var i=0;i<number.value;i++)
	{
		var row=table.insertRow("-1");
		var cell1=row.insertCell(0);
		var cell2=row.insertCell(1);
		var cell3=row.insertCell(2);
		var cell4=row.insertCell(3);
		var cell5=row.insertCell(4);
		var cell6=row.insertCell(5);
		var cell7=row.insertCell(6);
		var cell8=row.insertCell(7);

		cell1.innerHTML ="<input class='CustText' name='questid"+(indexNum+i-1)+"' type='text' size='3' value='"+(indexNum+i)+"' readonly/>";
		cell2.innerHTML ="<input class='CustText' name='setid"+(indexNum+i-1)+"' type='text' size='3' value='"+<?php echo $setIDnum?>+"' readonly/>";

		cell3.innerHTML="<input class='UnitType' name='questtypeid"+(indexNum+i-1)+"' type='checkbox' value='1'/>";

		cell4.innerHTML="<input class='CustText' name='questbodyid"+(indexNum+i-1)+"' size='50'/>";
		cell5.innerHTML="<input class='NumberInput' type='text' size='3'>";
		cell6.innerHTML="<input class='NumberInput' type='text' size='3'>";
		
	    cell7.innerHTML="<input type='radio' value='-1' />Worse<input type='radio' value='0' />Same<input type='radio' value='1' />Better";

	    cell8.innerHTML="<input type='radio' value='-1' />Worse<input type='radio' value='0' />Same<input type='radio' value='1' />Better";	    
	}
	loadContent();
}

$(document).ready(function() {//checkbox event handling, improve in the future
    //set initial state.

    $("input[type='checkbox']").change(function() {
        if($(this).is(":checked")) 
        {       	
        }
        else
        {       	
        }        
    });
});

//----------------------------------------------------------

function seqOnClick(evt)											// this function limites the input value within 1 and 10
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 31 && (charCode < 48 || charCode > 57) )
		return false;
	var expectedValue = (evt.srcElement.value*10+(charCode-48)) ;
	if( expectedValue >10 || expectedValue < 1)
	{
		//alert("The value must between 1 and 10");
		return false;
	}
} 

//----------------------------------------------------------

function Matrix() {													// this function defines matrix
	
	this.rows = new Array();
}



function sum(someArray)												// calculate the sum of array
{
	var total = 0;
	for (var i = 0; i < someArray.length; i++) {
			total += parseFloat(someArray[i]);
		}
		return total;
}


//-----------------------------------------------------------


	var myArray = new Array(); 																				//define a public array

	
	
	

 	


function hideDiv() { 
	if (document.getElementById) { 
	document.getElementById('myDynamicResult').style.visibility = 'hidden'; 
	} 
	} 






//--------------------------------------------------------------------------------------- Test

var grid = $('#datagrid');  
//var options = grid.datagrid('getPager').data("pagination").options;  
//var curr = options.pageNumber;  
//var total = options.total;  
//var max = Math.ceil(total/options.pageSize);  






//----------------------------------------------------------

function loadContent()														// Jqury to define the HTML
{
//	$("input").attr('required','required');
	//$("#seqTable input").attr('onkeypress',"return EmptyAlert(this);");
	$(".NumberInput").attr('onkeypress',"return seqOnClick(event);");
	$(".CustText").attr('onkeyup',"return changeInputlength(this);");
	$("input[type=radio]").attr("class","RadioInput");

//	$("table").attr("class","striped");
//	$("table").attr("class","table2");
//	$("input").attr("value","1");
//	$("input").attr("checked","true");

}



</script>




<body onload="loadContent();">
<form name="companyName" method="post" action="SR2" class="margin">
		
		<table>
		<tr>
		<th><i>The List of Questionnaires</i></th>
		</tr>
		<tr>
		<td><a href='index.html'><b>1, MSI and TLI</b></a></td>
		</tr>
		<tr>
		<td><b>2, Sensor and Response Form Administrator Page</b>
				<ul>
		  			<li><a href='sensor_admin.php'><b>Form #1</b></a></li>
		  			<li><b>Form #2</b></li>
		  		</ul>
		</td>
		</tr>
		<tr>
		<td><a href='index.html'><b>Back to user page</b></a></td>
		</tr>		
		</table>

		
<!-- 		<h2><i>The List of Questionnaires</i></h2>
		<ol>
		  <li><h2><a href='http://app.cc.puv.fi/e0900766_questionnaire2/index.html'><b>MSI and TLI</b></a></h2></li>
		  <li><h2>Sensor and Response</h2>
		  		<ul>
		  			<li><h2>Form #1</h2></li>
		  			<li><h2>Form #2</h2></li>
		  		</ul>
		  </li>
		  
		</ol>

		</br> -->
		<br/>
		
		<h2><input class="CustText" id="text1" name="Name1" size="50" style="font-weight:bold" value="Sense and Respond For Operations Strategy Questionnaire" /></h2>
		


		<table>
			<tr>
				<td><input class="CustText" id="text2" name="Name1" value="Company Name"/></td>
				<td><input type="text" name="CompanyName"></td>
			</tr>
		</table>
		
</form>

<form method='POST' action='sensor2_admin.php' class='margin'>
<select name='setIDnum' >
<?php
  if($setIDnum=='2')
  echo"
  <option value='1' >Preset 1</option> 
  <option value='2' selected> Preset 2</option>
  <option value='3' > Preset 3</option>";
  else
  	  if($setIDnum=='3')
  echo"
  <option value='1' >Preset 1</option> 
  <option value='2' > Preset 2</option>
  <option value='3' selected> Preset 3</option>";
    else
  echo"
  <option value='1' selected>Preset 1</option> 
  <option value='2' > Preset 2</option>
  <option value='3' > Preset 3</option>";
?>
</select>

<INPUT TYPE="submit" name="submit" />

</form>

<form name="sensor" method="post" action="writetoMySql.php" class="margin">



<?php 

  //--------------------------------------------------------------------------
  // connect MySql to fetch the data
  //--------------------------------------------------------------------------

  $host = "mysql.cc.puv.fi:3306";
  $user = "e1100587";
  $pass = "vxnB9ws3N5M7";

  $databaseName = "e1100587_questionnaire";
  $tableName = "SRForm2";

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

  $sqlquery = "SELECT * FROM $tableName WHERE setID='$setIDnum' ORDER BY QuestID ASC";
  //--------------------------------------------------------------------------
  // 2) Query database for data
  //--------------------------------------------------------------------------
  $result = mysql_query($sqlquery);          //query
  //$array = mysql_fetch_row($result);       //fetch result    
  $num=mysql_numrows($result);
  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  //echo json_encode($array);
  mysqli_close($con);
  ?>




		<table id="seqTable" class="table2 striped">
			<tr>
				<th>No.</th>
				<th>Set No.</th>
				<th>Subtitle</th>
				<th><input class="CustText" id="Attributeid" style="font-weight:bold" value="Attributes" /></th>
				<th><input class="CustText" id="Expectationid" size="10" style="font-weight:bold" value="Expectation"  /></th>
				<th><input class="CustText" id="Experienceid" size="10" style="font-weight:bold" value="Experience"  /></th>
				<th><input class="CustText" id="PastDevelopmentid" style="font-weight:bold" value="Past Development"  /></th>
				<th><input class="CustText" id="FutureDevelopmentid" style="font-weight:bold" value="Future Development"  /></th>
			</tr>
			<tr>
				<td></td>				
				<td></td>
				<td></td>
				<td></td>
				<td>(1-10)</td>
				<td>(1-10)</td>
				<td>(Worse/ Same/ Better)</td>
				<td>(Worse/ Same/ Better)</td>
			</tr>

<?php
			$i=0;while ($i < $num) {
			$field1_name=mysql_result($result,$i,"UserID");
			$field2_name=mysql_result($result,$i,"QuestID");
			$field3_name=mysql_result($result,$i,"QuestBody");
			$field4_name=mysql_result($result,$i,"SetID");
			$field5_name=mysql_result($result,$i,"QuestTypeID");

			$questidtemp='questid'.$i;
			$setidtemp='setid'.$i;
			$questtypeidtemp='questtypeid'.$i;
			$questbodyidtemp='questbodyid'.$i;

echo "      <tr><td><input class='CustText' name='$questidtemp' type='text' size='3' value='$field2_name' readonly/></td>
			<td><input class='CustText' name='$setidtemp' type='text' size='3' value='$field4_name' readonly/></td>";

if($field5_name=="1")//title
echo"  			<td><input  class='UnitType' name='$questtypeidtemp' type='checkbox' checked='checked' value=\"1\" ></td>
				<td><input class='CustText' name='$questbodyidtemp' size='50' style='font-weight:bold' value=\"$field3_name\"/></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>				
				";
else
	echo"  		<td><input  class='UnitType' name='$questtypeidtemp' type='checkbox' value=\"1\"></td>
				<td><input class='CustText' name='$questbodyidtemp'  size='50' value=\"$field3_name\"/></td>
				<td><input class='NumberInput' type='text' size='3'></td>
				<td><input class='NumberInput' type='text' size='3'></td>
				<td><input type='radio' value='-1' />Worse<input type='radio' value='0' />Same<input type='radio' value='1' />Better</td>
				<td><input type='radio' value='-1' />Worse<input type='radio' value='0' />Same<input type='radio' value='1' />Better</td>			
			
				";
echo"</tr>";
			$i++;}
			?>

		</table>

	<input type='text' size="3" id="QuestAdd"> Lines<input class="left" type="button" size="10" value="Add questions" onclick ="AddListTableRow()">
	
	<input  size="1" type="hidden" name="tablerownum" readonly/>
		<input  size="1" type="hidden" name="tablebasename" value="SRForm2" readonly/>
	<a href="#count"><input class="right" type="button" size="10" value="Save this set" onclick="SubmitPhp()"></a>
</form>

		<br />


		

		


	</form>

</body>
</html>
		
