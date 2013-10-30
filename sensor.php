<html>
<head>
<title>Sensor and Response</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

<link href="Metro-UI-CSS-master/css/modern.css" rel="stylesheet">
<link href="Metro-UI-CSS-master/css/modern-responsive.css" rel="stylesheet">
<link href="prettify.css" rel="stylesheet" type="text/css">

<script src="jquery-1.8.3.min.js"></script>

</head>



<script>
//-------------------------------------- _Lu


function changeInputlength(text) 
{ 
		if(text.value)
			text.size=text.value.length/1.1;  
} 


function sendemail(emailadressid,file)
{
	var _validFileExtensions =".xls";
	var emailadress=document.getElementById(emailadressid).value;
	var filename=document.getElementById(file).value;
	var form=document.getElementById('sendemail');


        var filerawdata = document.createElement('a');
        //getting data from our div that contains the HTML table

        var data_type = 'data:application/vnd.ms-excel';
        		
        filerawdata.href = data_type + ', ';     


  	    var table_div = document.getElementById('myDynamicResult');//dynamic result		    
        filerawdata.href = filerawdata.href+table_div.outerHTML; 
  
        var table_div = 0;
        var table_html = 0;

		table_div = document.getElementById('myDynamicTable');//dynamic result 
        filerawdata.href = filerawdata.href + table_div.outerHTML;


	document.getElementById("formData").value=filerawdata.href;

	if(!emailadress)
	{
		alert("Sorry, email address empty!");
		return;
	}
	else
	{
		var r=confirm("Are you sure to send the email and LEAVE this page?");
		if(r==true)
		{
			form.submit();
		}
	}
	

}


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


function nextPerson()
	{
	var questtotalnum=document.getElementById('Questtotalnum');	
		
	var sensorData = new Matrix();																			// picking up the right value for the matrix from HTML															
	var pastDevelopment;
	var futureDevelopment;
	
	
	
		for(var i=0; i<questtotalnum.value; i++)
		{
			pastDevelopment = null;
			futureDevelopment = null;
			
	 		var radios = document.getElementsByName('pi'+(i+1));		
			for (var j = 0; j < radios.length; j++) 
			{
			    if (radios[j].checked)
			    {
			        pastDevelopment = new Number(radios[j].value);
			    }
			}
			 
			var radios = document.getElementsByName('fi'+(i+1));
			for (var j = 0; j < radios.length; j++) 
			{
			    if (radios[j].checked)
			    {
			    	futureDevelopment = new Number(radios[j].value);
			    }
			}
			

			
			sensorData.rows[i] = new Array(document.getElementsByName('et'+(i+1))[0].value,
										   document.getElementsByName('ep'+(i+1))[0].value,
										   pastDevelopment,
										   futureDevelopment)
			
		} 
		

		

	
	myArray.push(sensorData);
	
//	alert(myArray.length);
	
	document.getElementById('count').innerHTML = myArray.length + 1;				// show the number of inquirers
	
	
//	document.getElementById('count').innerHTML++;

//	alert(myArray[0].rows[0][0]); 
//	alert(myArray[0].rows[20][0]); 


/* 		try
		{
		alert(myArray[1].rows[0][0]);
		}
	catch(err)
		{
		
		}  
		try
		{
		alert(myArray[1].rows[20][0]);
		}
	catch(err)
		{
		
		} 
 */

	
	
	 var myTableDiv = document.getElementById("myDynamicTable");				//create dynamic table to store submitted data
     
	 var table = document.createElement('TABLE');
	 table.border='1';
	 table.id='dyna'+ myArray.length;
	 	 

	 
	 var tableCaption = document.createElement('CAPTION');
	 tableCaption.appendChild(document.createTextNode("NO." + myArray.length));
	 table.appendChild(tableCaption);
	 
	 var tableHead = document.createElement('THEAD');
	 table.appendChild(tableHead);
	 var tr = document.createElement('TR');
	 tableHead.appendChild(tr);
	 
     var th = document.createElement('TH');
     var bold = document.createElement('B');
     var attributesrealname=document.getElementById("Attributeid");
     bold.appendChild(document.createTextNode(attributesrealname.value));
     th.appendChild(bold);
     tr.appendChild(th);
     var th = document.createElement('TH');
     var bold = document.createElement('B');
     var Expectationrealname=document.getElementById("Expectationid");     
     bold.appendChild(document.createTextNode(Expectationrealname.value));
     th.appendChild(bold);
     tr.appendChild(th);
     var th = document.createElement('TH');
     var bold = document.createElement('B');
     var Experiencerealname=document.getElementById("Experienceid");      
     bold.appendChild(document.createTextNode(Experiencerealname.value));
     th.appendChild(bold);
     tr.appendChild(th);
     var th = document.createElement('TH');
     var bold = document.createElement('B');
     var PastDevelopmentrealname=document.getElementById("PastDevelopmentid");      
     bold.appendChild(document.createTextNode(PastDevelopmentrealname.value));
     th.appendChild(bold);
     tr.appendChild(th);
     var th = document.createElement('TH');
     var bold = document.createElement('B');
     var Futurerealname=document.getElementById("FutureDevelopmentid");     
     bold.appendChild(document.createTextNode(Futurerealname.value));
     th.appendChild(bold);
     tr.appendChild(th);
     
	 var tableBody = document.createElement('TBODY');
	 table.appendChild(tableBody);
	 
	 for (var i=0; i<questtotalnum.value; i++)
	 {
	       var tr = document.createElement('TR');
	       tableBody.appendChild(tr);
	       
/* 	       for (var j=0; j<4; j++)
	       {
	           var td = document.createElement('TD');
	           td.width='25';
	           td.appendChild(document.createTextNode(sensorData.rows[i][j]));
	           tr.appendChild(td);
	  	   } */
	 
	       var td = document.createElement('TD');	   
	  	   var bold = document.createElement('B');

	  	   var attributename=document.getElementById("Attribute3"+(i+1)+"id");
	  	   bold.appendChild(document.createTextNode(attributename.value));
	  	   
	  	   td.appendChild(bold);
	       tr.appendChild(td);
	       
	       var td = document.createElement('TD');
	  	   td.appendChild(document.createTextNode(sensorData.rows[i][0]));
	       tr.appendChild(td);
	       var td = document.createElement('TD');
	  	   td.appendChild(document.createTextNode(sensorData.rows[i][1]));
	       tr.appendChild(td);
	       
	       var td = document.createElement('TD');       												/////////////////////////////////////////
	       if(sensorData.rows[i][2]=="-1")
	  	   {
	  		   td.appendChild(document.createTextNode("Worse"));
	  	   }
	       else if(sensorData.rows[i][2]=="0")
	       {
	  		   td.appendChild(document.createTextNode("Same"));
	  	   }
	       else if(sensorData.rows[i][2]=="1")
	       {
	  		   td.appendChild(document.createTextNode("Better"));
	  	   }
	  	   tr.appendChild(td);
	  	   
	       var td = document.createElement('TD');
	       if(sensorData.rows[i][3]=="-1")
	  	   {
	  		   td.appendChild(document.createTextNode("Worse"));
	  	   }
	       else if(sensorData.rows[i][3]=="0")
	       {
	  		   td.appendChild(document.createTextNode("Same"));
	  	   }
	       else if(sensorData.rows[i][3]=="1")
	       {
	  		   td.appendChild(document.createTextNode("Better"));
	  	   }
	  	   tr.appendChild(td);
	       tr.appendChild(td);
	  	   
	 
	 
	 }
	    
	 myTableDiv.appendChild(table);
	

	$(".NumberInput").attr("value","");	
	$(".RadioInput").attr("checked",false);	

	} 
	
	
	
	
	

function dele()																//delete previous submitted data(array)
{
	
	if (confirm('Are you sure you want to delete the previous data?')) {
		
		var tables = document.getElementById('dyna'+ myArray.length);		// delete previous dynamic table
		
	    tables.parentNode.removeChild(tables);
		
		
		myArray.pop();
		
		document.getElementById('count').innerHTML = myArray.length + 1;
	
	} else {
	   
	}
	

	//alert(myArray.length);
}

	
	
	



function allValues()
	{
 		var sumExpectation = 0;
		var sumExperience = 0;
		
		var avgExpectation = 0;
		var avgExperience = 0;
		
		var importanceIndex = 0;
		var performanceIndex = 0;
		
		var gapIndex = 0;
		var newGapIndex=0;
 		
		var pastIndex = 0;						// past development index
		var sumPastIndex = 0;
		var newPastIndex = 0;
		
		var futureIndex = 0;					// future development index
		var sumFutureIndex = 0;
		var newFutureIndex = 0;
		
		var expectationIndex=0;
		var newExpectationIndex = 0;
		var sumExpectationIndex = 0;
		var newSumExpectationIndex =0;
		
		var experienceIndex=0;
		var newExperienceIndex=0
		var sumExperienceIndex=0;
		var newSumExperienceIndex = 0;
		
		var expectationList = new Array();
		var stdExpectation = 0;
		
		var experienceList = new Array();
		var stdExperience = 0;
		
		var SDExpectation = 0;
		var SDExperience = 0;
		
		var cfiPast = 0;
		var sumCfiPast = 0;
		var cfiPastPercent = new Array();
		var cfiPastList = new Array();
		
		var cfiFuture = 0;
		var sumCfiFuture=0;
		var cfiFuturePercent = new Array();
		var cfiFutureList = new Array();
		
 		var bcfiPast = 0;
 		var sumBcfiPast = 0;
 		var bcfiPastPercent = new Array();
 		var bcfiPastList = new Array();
		
 		var bcfiFuture = 0;
 		var sumBcfiFuture = 0;
 		var bcfiFuturePercent = new Array();
 		var bcfiFutureList = new Array();

 		var scfiPast = 0;
 		var sumScfiPast = 0;
 		var scfiPastPercent = new Array();
 		var scfiPastList = new Array();
 		
		var scfiFuture = 0;
		var sumScfiFuture = 0;
		var scfiFuturePercent = new Array();
		var scfiFutureList = new Array();
 		
		var newScfiPast = 0;
		var sumNewScfiPast = 0;
		var newScfiPastList = new Array();
		var newScfiPastPercent = new Array();
		
		var newScfiFuture = 0;
		var sumNewScfiFuture = 0;
		var newScfiFutureList = new Array();
		var newScfiFuturePercent = new Array();

		var questtotalnum=document.getElementById('Questtotalnum');	

			for(var j=0; j<questtotalnum.value; j++)
			{
				
				expectationList = [];			
				experienceList = [];
				
				for(var i=0; i<myArray.length; i++)
				{
				
					sumExpectation = sumExpectation + parseInt(myArray[i].rows[j][0]);
					
					sumExperience =  sumExperience + parseInt(myArray[i].rows[j][1]);
					
					sumPastIndex = sumPastIndex + parseInt(myArray[i].rows[j][2]);
					
					sumFutureIndex = sumFutureIndex + parseInt(myArray[i].rows[j][3]);
					
					sumExpectationIndex = sumExpectationIndex + parseInt(Math.pow(myArray[i].rows[j][0]-10,2));
					
					sumExperienceIndex = sumExperienceIndex + parseInt(Math.pow(myArray[i].rows[j][1]-1,2));
					//alert(sumPastIndex);
					newSumExpectationIndex = newSumExpectationIndex + parseInt(Math.pow(myArray[i].rows[j][0]-11,2));
					
					newSumExperienceIndex = newSumExperienceIndex + parseInt(Math.pow(myArray[i].rows[j][1],2));
					
					expectationList.push(myArray[i].rows[j][0]);
					
					experienceList.push(myArray[i].rows[j][1]);
						
				}
				
				
				avgExpectation = sumExpectation/myArray.length;	
				avgExperience = sumExperience/myArray.length;
				
				//alert(avgExpectation);
				
				importanceIndex = avgExpectation/10;
				performanceIndex =avgExperience/10;
				
				//alert(importanceIndex);
				
				gapIndex = Math.abs((avgExperience - avgExpectation)/10-1);
				newGapIndex = Math.pow(2,(avgExpectation-avgExperience)/10);
				
				pastIndex = Math.abs(sumPastIndex/myArray.length*0.9-1);
				futureIndex = Math.abs(sumFutureIndex/myArray.length*0.9-1);
				
				newPastIndex = Math.pow(2,-sumPastIndex/myArray.length);
				newFutureIndex = Math.pow(2,-sumFutureIndex/myArray.length);
				
				expectationIndex = Math.sqrt(sumExpectationIndex/myArray.length);
				experienceIndex = Math.sqrt(sumExperienceIndex/myArray.length);
				
				newExpectationIndex = Math.sqrt(newSumExpectationIndex/myArray.length);
				newExperienceIndex = Math.sqrt(newSumExperienceIndex/myArray.length);
				
			//	var data = new Array(EE, SA, EF);						 // calculate standard deviation for expectation
				var deviation = new Array();
				var sum = 0;
				var devnsum = 0;
				
				var deviation2 = new Array();							// calculate standard deviation for experience
				var sum2 = 0;
				var devnsum2 = 0;
	
				var len = expectationList.length;
				
				for (var i=0; i<len; i++) 
				{
					sum = sum + (parseFloat(expectationList[i],10)); 					// ensure number to base 10
					sum2 = sum2 + (parseFloat(experienceList[i],10)); 
				}
				var mean = (sum/len);						 
				var mean2 = (sum2/len);
				
				for (i=0; i<len; i++) 
				{
					deviation[i] = expectationList[i] - mean;
					deviation[i] = deviation[i] * deviation[i];
					devnsum = devnsum + deviation[i];
					
					deviation2[i] = experienceList[i] - mean2;
					deviation2[i] = deviation2[i] * deviation2[i];
					devnsum2 = devnsum2 + deviation2[i];
				
				
				}
				
				stdExpectation = Math.sqrt(devnsum/(len-1)); 								// Std of expectations and experiences
				stdExperience = Math.sqrt(devnsum2/(len-1));
				
			//	alert(stdExpectation);
			//	alert(stdExperience);
				
				
				SDExpectation = stdExpectation/10+1;
				SDExperience = stdExperience/10+1;
			
		//		alert(SDExpectation);
		//		alert(SDExperience);
				
				cfiPast = stdExpectation*stdExperience/importanceIndex/gapIndex/pastIndex;			// value of each cfi_past
				cfiFuture = stdExpectation*stdExperience/importanceIndex/gapIndex/futureIndex;
				
				bcfiPast = SDExpectation*SDExperience*performanceIndex/importanceIndex/gapIndex/pastIndex;
				bcfiFuture = SDExpectation*SDExperience*performanceIndex/importanceIndex/gapIndex/futureIndex;
				
				scfiPast = expectationIndex*experienceIndex*performanceIndex/importanceIndex/gapIndex/pastIndex;
				scfiFuture = expectationIndex*experienceIndex*performanceIndex/importanceIndex/gapIndex/futureIndex;
				
				newScfiPast = newExpectationIndex* newExperienceIndex*performanceIndex/importanceIndex/newGapIndex/newPastIndex;
				newScfiFuture = newExpectationIndex* newExperienceIndex*performanceIndex/importanceIndex/newGapIndex/newFutureIndex;
				
				
/* 				alert(scfiPast);
				alert(scfiFuture);
				alert(newScfiPast);
				alert(newScfiFuture); */
				
				cfiPastList.push(cfiPast);															//push the outcomes into a array
				cfiFutureList.push(cfiFuture);
				
				bcfiPastList.push(bcfiPast);
				bcfiFutureList.push(bcfiFuture);
				
				scfiPastList.push(scfiPast);
				scfiFutureList.push(scfiFuture);
				
				newScfiPastList.push(newScfiPast);
				newScfiFutureList.push(newScfiFuture);
				
				
		//		alert(cfiFutureList[j]);
				
				sumCfiPast = sumCfiPast + cfiPast;
				sumCfiFuture = sumCfiFuture + cfiFuture;
				
				sumBcfiPast = sumBcfiPast + bcfiPast;
				sumBcfiFuture = sumBcfiFuture + bcfiFuture;
				
				sumScfiPast = sumScfiPast + scfiPast;
				sumScfiFuture = sumScfiFuture + scfiFuture;
				
				sumNewScfiPast = sumNewScfiPast + newScfiPast;
				sumNewScfiFuture = sumNewScfiFuture + newScfiFuture;
		//		alert(sumCfiFuture);
			
				sumExperienceIndex = 0;
				sumExpectationIndex = 0;
				sumFutureIndex = 0;		
				sumPastIndex = 0;
				sumExpectation = 0;
				sumExperience = 0;
			
			
			}
		
 		for(var k=0; k < cfiPastList.length; k++)				// calculate the percentage
		{ 
				
				 

 		//	alert(sumCfiFuture);
			
			cfiPastPercent[k] = cfiPastList[k] / sumCfiPast;			
			cfiFuturePercent[k] = cfiFutureList[k]/sumCfiFuture;
			
			bcfiPastPercent[k] = bcfiPastList[k]/sumBcfiPast;
			bcfiFuturePercent[k] = bcfiFutureList[k]/sumBcfiFuture;
			
			scfiPastPercent[k] = scfiPastList[k]/sumScfiPast;
			scfiFuturePercent[k] = scfiFutureList[k]/sumScfiFuture;
			
			newScfiPastPercent[k] = newScfiPastList[k]/sumNewScfiPast;
			newScfiFuturePercent[k] = newScfiFutureList[k]/sumNewScfiFuture;
		//	alert(bcfiPastPercent[k]);
		//	alert(cfiPastList[k]);
		//	alert(cfiPastPercent);
		
/*  			document.getElementsByName('pcfi'+(k+1))[0].value= cfiPastPercent[k].toFixed(5);  				//put the result to the html
			document.getElementsByName('fcfi'+(k+1))[0].value= cfiFuturePercent[k].toFixed(5);
		
			document.getElementsByName('pbcfi'+(k+1))[0].value= bcfiPastPercent[k].toFixed(5);
			document.getElementsByName('fbcfi'+(k+1))[0].value= bcfiFuturePercent[k].toFixed(5);
			
			document.getElementsByName('p'+(k+1))[0].value= scfiPastPercent[k].toFixed(5);
			document.getElementsByName('f'+(k+1))[0].value= scfiFuturePercent[k].toFixed(5);
			
			document.getElementsByName('np'+(k+1))[0].value= newScfiPastPercent[k].toFixed(5);
			document.getElementsByName('nf'+(k+1))[0].value= newScfiFuturePercent[k].toFixed(5);  */
		}  
	
	//-------------------------------------------------------------------------------------------------------- create dynamic table for result
 		
 		
 		
 		 	var myTableDiv = document.getElementById("myDynamicResult");				
	     
			var table = document.createElement('TABLE');
			table.border='1';
			table.id='dynaResult';
			 	 
	
		 
		 var tableCaption = document.createElement('CAPTION');
		 tableCaption.appendChild(document.createTextNode("Final Result"));
		 table.appendChild(tableCaption);
		 
		 var tableHead = document.createElement('THEAD');
		 table.appendChild(tableHead);
		 var tr = document.createElement('TR');
		 tableHead.appendChild(tr);
		 
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Attributes"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Past-CFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Future-CFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Past-BCFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Future-BCFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Past-SCFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Future-SCFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Past-NSCFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Future-NSCFI"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     
		 var tableBody = document.createElement('TBODY');
		 table.appendChild(tableBody);
		 
		 for (var i=0; i<questtotalnum.value; i++)
		 {
		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr);
		       
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');

		  	   var attributename=document.getElementById("Attribute3"+(i+1)+"id");	

		  	   bold.appendChild(document.createTextNode(attributename.value));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(cfiPastPercent[i].toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(cfiFuturePercent[i].toFixed(5)));
		       tr.appendChild(td);
		       
		       var td = document.createElement('TD');       												/////////////////////////////////////////
		  	   td.appendChild(document.createTextNode(bcfiPastPercent[i].toFixed(5)));
			   tr.appendChild(td);
		  	   
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(bcfiFuturePercent[i].toFixed(5)));
		  	   tr.appendChild(td);
		      
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(scfiPastPercent[i].toFixed(5)));
		  	   tr.appendChild(td);
		      
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(scfiFuturePercent[i].toFixed(5)));
		  	   tr.appendChild(td);
		      
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(newScfiPastPercent[i].toFixed(5)));
		  	   tr.appendChild(td);
		      
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(newScfiFuturePercent[i].toFixed(5)));
		  	   tr.appendChild(td);   
		  	   
  
		  	   tr.appendChild(td);
	 		
	 		}
			   myTableDiv.appendChild(table);
	}
//----------------------------------------------------------------------------------------------------
	 
			
$(document).ready(function() {
    $("#excelExport").click(function(e) {

        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + ":" + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        
  	    var table_div = document.getElementById('myDynamicResult');//dynamic result
		var table_html = table_div.outerHTML.replace(/ /g, '%20');
		
        a.href = data_type + ', ';     
        a.href = a.href + table_html;  
  
        
    /* 	    var table_div = document.getElementById('surfacePlotDiv2');
		var table_html = table_div.outerHTML.replace(/ /g, '%20');	
        a.href = a.href + table_html ;  */
        
 //       a.href = data_type + ', ';
        var table_div = 0;
        var table_html = 0;
/*
		// _lu comment this part and replace it with the alternative

 	    for(var i=1; i<=myArray.length; i++)
	    {
 		    table_div = document.getElementById('dyna'+ i);
 			table_html = table_div.outerHTML.replace(/ /g, '%20');	
		   	a.href = a.href + table_html ;
	            
	    }  
*/		
		table_div = document.getElementById('myDynamicTable');//dynamic result
		table_html = table_div.outerHTML.replace(/ /g, '%20');
		a.href = a.href + table_html ; 




        //setting the file name
        a.download = 'Senor1_' + postfix + '.xls';
  	
        //triggering the function
        
        a.click(); 

        //just in case, prevent default behaviour
        e.preventDefault();
        return a;
    });
});






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
	$(".NumberInput").attr('onkeypress',"return seqOnClick(event);");
	$(".CustText").attr('onkeydown',"return changeInputlength(this);");
	$("input[type=radio]").attr("class","RadioInput");

//	$("table").attr("class","striped");
//	$("table").attr("class","table2");
//	$("input").attr("value","1");
//	$("input").attr("checked","true");

}



</script>




<body onload="loadContent();">

	<?php
  $setIDnum=$_POST[setIDnum];
    if(($setIDnum!='1')&&($setIDnum!='2')&&($setIDnum!='3'))
    	$setIDnum='1';
?>

<form method='POST' action='sensor.php'>
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
<p>
<INPUT TYPE="submit" name="submit" />
</p>
</form>

<form name="companyName" method="post" action="SR" class="margin">
		
		<table>
		<tr>
		<th><i>The List of Questionnaires</i></th>
		</tr>
		<tr>
		<td><a href='index.html'><b>1, MSI and TLI</b></a></td>
		</tr>
		<tr>
		<td><b>2, Sensor and Response Form</b>
				<ul>
		  			<li><b>Form #1</b></li>
		  			<li><a href='sensor2.php'><b>Form #2</b></a></li>
		  		</ul>
		</td>
		</tr>
		</table>

		
		</br>
		
		<h2><input class="CustText" id="text1" name="Name1" size="30" style="font-weight:bold" value="Sense and Respond Questionnaire" /></h2>
		


		<table>
			<tr>
				<td><input class="CustText" id="text2" name="Name1" value="Company Name"/></td>
				<td><input type="text" name="CompanyName"></td>
			</tr>
		</table>
		
</form>

<form name="sensor" method="post" action="SR" class="margin">





<div id="myDynamicTable">


</div>


<?php 

  //--------------------------------------------------------------------------
  // connect MySql to fetch the data
  //--------------------------------------------------------------------------

  $host = "mysql.cc.puv.fi:3306";
  $user = "e1100587";
  $pass = "vxnB9ws3N5M7";

  $databaseName = "e1100587_questionnaire";
  $tableName = "SRForm1";

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

<h2>You are the Inquirer No. <b><span id="count">1</span></b></h2><a href="#dynaResult"><input class="right2" type="button" size="12" value="Calculate Submitted Data" onclick = "allValues();"></a>

		<table id="seqTable" class="table2 striped">
			<tr>
				<th><input class="CustText" id="Setnumid" size='4' style="font-weight:bold" value="Set No." /></th>
				<th><input class="CustText" id="Attributeid" style="font-weight:bold" value="Attributes" /></th>
				<th><input class="CustText" id="Expectationid" size="10" style="font-weight:bold" value="Expectation"  /></th>
				<th><input class="CustText" id="Experienceid" size="10" style="font-weight:bold" value="Experience"  /></th>
				<th><input class="CustText" id="PastDevelopmentid" style="font-weight:bold" value="Past Development"  /></th>
				<th><input class="CustText" id="FutureDevelopmentid" style="font-weight:bold" value="Future Development"  /></th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>(1-10)</td>
				<td>(1-10)</td>
				<td>(Worse/ Same/ Better)</td>
				<td>(Worse/ Same/ Better)</td>
			</tr>


			<?php
			$i=1;$j=0;
			while ($j < $num) {
			$field1_name=mysql_result($result,$j,"UserID");
			$field2_name=mysql_result($result,$j,"QuestID");
			$field3_name=mysql_result($result,$j,"QuestBody");
			$field4_name=mysql_result($result,$j,"SetID");
			$field5_name=mysql_result($result,$j,"QuestTypeID");

			$questbodyidtemp='Attribute3'.($i).'id';

			$etnametemp='et'.($i);
			$epnametemp='ep'.($i);
			$pinametemp='pi'.($i);
			$finametemp='fi'.($i);


echo "      <tr><td>$field4_name</td>";

if($field5_name=="1")//title
echo" 			<td><input class='CustText' size='50' style='font-weight:bold' value=\"$field3_name\"/></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>				
				";
else
	{
	echo"		<td><input class='CustText' id='$questbodyidtemp'  size='50' value=\"$field3_name\"/></td>
				<td><input class='NumberInput' type='text' size='3' name='$etnametemp' ></td>
				<td><input class='NumberInput' type='text' size='3' name='$epnametemp' ></td>
				<td><input type='radio' value='-1' name='$pinametemp'/>Worse<input type='radio' value='0' name='$pinametemp'/>Same<input type='radio' value='1' name='$pinametemp'/>Better</td>
				<td><input type='radio' value='-1' name='$finametemp'/>Worse<input type='radio' value='0' name='$finametemp'/>Same<input type='radio' value='1' name='$finametemp'/>Better</td>			
				";
	echo"</tr>";
	$i++;
	}
	$j++;		}
			$i--;?>
	
		</table>

	<a href="#count"><input class="left" type="button" size="12" value="Submit Data & Start Over" onclick = "nextPerson();"></a>
	<a href="#count"><input class="right" type="button" size="10" value="Delete Previous" onclick = "dele();"></a>

</form>
<?php echo "<input type='hidden' id='Questtotalnum' value='$i'/>"?>
		<br />



<form method="post" action="SR" class="margin">



<div id="myDynamicResult">


</div>


			<table>
				<input type="button" id="excelExport" class="left" size="10" value="Export Excel">				
		</table>
	</form>




	<form id="sendemail" action="sendemail.php" method="POST" enctype="multipart/form-data" class="margin">
	<p><input class="CustText" type="text" id="filename" name="filename" size="60" value="Sense and Respond For Operations Strategy Questionnaire Result Form1" readonly/></p>
	E-mail: <input type="text" id="email" name="email"/>
	<input style="border:1px;color:white" type="text" id="formData" name="formData" /> 	
	<input type="button" class="left" size="10" value="Email the Excel" onclick="sendemail('email','filename')"/>
	</form>	

</body>
</html>
		
