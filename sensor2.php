<html>
<head>
<title>Sensor and Response</title>
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


function changeInputlength(text) 
{ 
		if(text.value)
			text.size=text.value.length/1.1;  
		else
			alert("Empty Cell!");
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
	
		
	var sensorData = new Matrix();																			// picking up the right value for the matrix from HTML															
	var pastDevelopment;
	var futureDevelopment;
	
	var questtotalnum=document.getElementById('Questtotalnum');		
	
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
		

		
	
 	/* sensorData.rows[0] = new Array(document.getElementsByName("et01")[0].value,"ep01","pi01","fi01");
	
//	sensorData.rows[0] = new Array("et01","ep01","pi01","fi01");
	sensorData.rows[1] = new Array("et02","ep02","pi02","fi02");
	sensorData.rows[2] = new Array("et03","ep03","pi03","fi03");
	sensorData.rows[3] = new Array("et04","ep04","pi04","fi04");
	sensorData.rows[4] = new Array("et05","ep05","pi05","fi05");
	sensorData.rows[5] = new Array("et06","ep06","pi06","fi06");
	sensorData.rows[6] = new Array("et07","ep07","pi07","fi07");
	sensorData.rows[7] = new Array("et08","ep08","pi08","fi08");
	sensorData.rows[8] = new Array("et09","ep09","pi09","fi09");
	sensorData.rows[9] = new Array("et10","ep10","pi10","fi10");
	sensorData.rows[10] = new Array("et11","ep11","pi11","fi11");
	sensorData.rows[11] = new Array("et12","ep12","pi12","fi12");
	sensorData.rows[12] = new Array("et13","ep13","pi11","fi11");
	sensorData.rows[13] = new Array("et14","ep14","pi14","fi14");
	sensorData.rows[14] = new Array("et15","ep15","pi15","fi15");
	sensorData.rows[15] = new Array("et16","ep16","pi16","fi16");
	sensorData.rows[16] = new Array("et17","ep17","pi17","fi17");
	sensorData.rows[17] = new Array("et18","ep18","pi18","fi18");
	sensorData.rows[18] = new Array("et19","ep19","pi19","fi19");
	sensorData.rows[19] = new Array("et20","ep20","pi20","fi20");
	sensorData.rows[20] = new Array("et21","ep21","pi21","fi21");  */
	
	//alert(sensorData.rows[0][0]); 
	
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

	  	   var attributename=document.getElementById("Attribute"+(i+1)+"id");	 
	  	   
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

	
	
	var newScfiPastQuality = 0;
	var newScfiPastCost = 0;
	var newScfiPastTime = 0;
	var newScfiPastFlex = 0;
	
	var newScfiFutureQuality = 0;
	var newScfiFutureCost = 0;
	var newScfiFutureTime = 0;
	var newScfiFutureFlex = 0;
	
	var pastMsiQuality = 0;
	var pastMsiCost = 0;
	var pastMsiTime = 0;
	var pastMsiFlex = 0;
	
	var futureMsiQuality = 0;
	var futureMsiCost = 0;
	var futureMsiTime = 0;
	var futureMsiFlex = 0;



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
		

		
		cfiPastList = [];
		cfiFutureList = [];
		
		bcfiPastList = [];
		bcfiFutureList = [];
		
		scfiPastList = [];
		scfiFutureList = [];
		
		newScfiPastList = [];
		newScfiFutureList = [];
		
		var questtotalnum=document.getElementById('Questtotalnum');	
		
			for(var j=4; j<questtotalnum.value; j++)
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
				newSumExpectationIndex = 0;
				newSumExperienceIndex = 0;
			
			}
		
/* 		alert(newScfiPastList[15]);
		alert(newScfiPastList[16]);
		alert(newScfiPastList[17]);
		alert(newScfiPastList[18]);
		alert(newScfiPastList[19]); */
	
		
		newScfiPastQuality = (newScfiPastList[0] + newScfiPastList[1] + newScfiPastList[2] + newScfiPastList[3] + newScfiPastList[4])/sumNewScfiPast;
		newScfiPastCost = (newScfiPastList[5] + newScfiPastList[6] + newScfiPastList[7] + newScfiPastList[8] + newScfiPastList[9])/sumNewScfiPast;
		newScfiPastTime = (newScfiPastList[10] + newScfiPastList[11] + newScfiPastList[12] + newScfiPastList[13] + newScfiPastList[14])/sumNewScfiPast;
		newScfiPastFlex = (newScfiPastList[15] + newScfiPastList[16] + newScfiPastList[17] + newScfiPastList[18] + newScfiPastList[19])/sumNewScfiPast;
			
		newScfiFutureQuality = (newScfiFutureList[0] + newScfiFutureList[1] + newScfiFutureList[2] + newScfiFutureList[3] +newScfiFutureList[4])/sumNewScfiFuture;
		newScfiFutureCost = (newScfiFutureList[5] + newScfiFutureList[6] + newScfiFutureList[7] + newScfiFutureList[8] +newScfiFutureList[9])/sumNewScfiFuture;
		newScfiFutureTime = (newScfiFutureList[10] + newScfiFutureList[11] + newScfiFutureList[12] + newScfiFutureList[13] +newScfiFutureList[14])/sumNewScfiFuture;
		newScfiFutureFlex = (newScfiFutureList[15] + newScfiFutureList[16] + newScfiFutureList[17] + newScfiFutureList[18] +newScfiFutureList[19])/sumNewScfiFuture;
		
		
		document.getElementsByName('npq')[0].value= newScfiPastQuality.toFixed(5);
		document.getElementsByName('npc')[0].value= newScfiPastCost.toFixed(5);
		document.getElementsByName('npt')[0].value= newScfiPastTime.toFixed(5);
		document.getElementsByName('npf')[0].value= newScfiPastFlex.toFixed(5);
		
		document.getElementsByName('nfq')[0].value= newScfiFutureQuality.toFixed(5);
		document.getElementsByName('nfc')[0].value= newScfiFutureCost.toFixed(5);
		document.getElementsByName('nft')[0].value= newScfiFutureTime.toFixed(5);
		document.getElementsByName('nff')[0].value= newScfiFutureFlex.toFixed(5);
		

//-----------------------------------------------------------------------------------------------------------------	
		
		sumCfiPast = 0;
		sumCfiFuture = 0;
		
		sumBcfiPast = 0;
		sumBcfiFuture = 0;
		
		sumScfiPast = 0;
		sumScfiFuture = 0;
		
		sumNewScfiPast = 0;
		sumNewScfiFuture = 0;
		
		cfiPastList = [];
		cfiFutureList = [];
		
		bcfiPastList = [];
		bcfiFutureList = [];
		
		scfiPastList = [];
		scfiFutureList = [];
		
		newScfiPastList = [];
		newScfiFutureList = [];
	
	
		
		
		for(var j=0; j<4; j++)														// calculate the first four elements
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
			newSumExpectationIndex = 0;
			newSumExperienceIndex = 0;
		
		}
		
		
		pastMsiQuality = newScfiPastList[0]/sumNewScfiPast;
		pastMsiCost = newScfiPastList[1]/sumNewScfiPast;
		pastMsiTime = newScfiPastList[2]/sumNewScfiPast;
		pastMsiFlex = newScfiPastList[3]/sumNewScfiPast;
		
		futureMsiQuality = newScfiFutureList[0]/sumNewScfiFuture;
		futureMsiCost = newScfiFutureList[1]/sumNewScfiFuture;
		futureMsiTime = newScfiFutureList[2]/sumNewScfiFuture;
		futureMsiFlex = newScfiFutureList[3]/sumNewScfiFuture;
		
		document.getElementsByName('pmsiq')[0].value= pastMsiQuality.toFixed(5);
		document.getElementsByName('pmsic')[0].value= pastMsiCost.toFixed(5);
		document.getElementsByName('pmsit')[0].value= pastMsiTime.toFixed(5);
		document.getElementsByName('pmsif')[0].value= pastMsiFlex.toFixed(5);
		
		document.getElementsByName('fmsiq')[0].value= futureMsiQuality.toFixed(5);
		document.getElementsByName('fmsic')[0].value= futureMsiCost.toFixed(5);
		document.getElementsByName('fmsit')[0].value= futureMsiTime.toFixed(5);
		document.getElementsByName('fmsif')[0].value= futureMsiFlex.toFixed(5);
	
	}

 	
 	
	 
function graphMaker()
{
		var Qp = 0;
		var Cp = 0;
		var Tp = 0;
		var Fp = 0;
		
		var Qf = 0;
		var Cf = 0;
		var Tf = 0;
		var Ff = 0;
		
		
		Qp = parseFloat(document.getElementsByName('pmsiq2')[0].value);
		Cp = parseFloat(document.getElementsByName('pmsic2')[0].value);
		Tp = parseFloat(document.getElementsByName('pmsit2')[0].value);
		Fp = parseFloat(document.getElementsByName('pmsif2')[0].value);
		
		Qf = parseFloat(document.getElementsByName('fmsiq2')[0].value);
		Cf = parseFloat(document.getElementsByName('fmsic2')[0].value);
		Tf = parseFloat(document.getElementsByName('fmsit2')[0].value);
		Ff = parseFloat(document.getElementsByName('fmsif2')[0].value);
	
		
		
		
		
		
		//----------------------------------------------------------------------------------------------------------	bar chart
		
		$(function () {
		    var chart;
		    $(document).ready(function() {
		        chart = new Highcharts.Chart({
		            chart: {
		                renderTo: 'barChart',
		                type: 'column'
		            },
		            title: {
		                text: 'Operations Strategy'
		            },
		            subtitle: {
		                text: ''
		            },
		            xAxis: {
		                categories: [
		                    'Quality',
		                    'Cost',
		                    'Time',
		                    'Flexibility'
		                ]
		            },
		            yAxis: {
		                max: 0.8,
		            	min: 0,
		                title: {
		                    text: 'Percentage '
		                }
		            },
		            legend: {
		                layout: 'vertical',
		                backgroundColor: '#FFFFFF',
		                align: 'left',
		                verticalAlign: 'top',
		                x: 50,
		                y: 10,
		                floating: true,
		                shadow: true
		            },
		            tooltip: {
		                formatter: function() {
		                    return ''+
		                        this.x +': '+ this.y +' ';
		                }
		            },
		            plotOptions: 
		            {
		                column: {
		                    pointPadding: 0.2,
		                    borderWidth: 0
		                		}
		            },
		                series: [
		                         {
					                name: 'P-MSI(Check)',
					                data: [pastMsiQuality, pastMsiCost, pastMsiTime, pastMsiFlex]
		    
		            			 }, {
					                name: 'F-MSI(Check)',
					                data: [futureMsiQuality, futureMsiCost, futureMsiTime, futureMsiFlex]
		    
		          				  }, {
		               				name: 'P-MSI',
		               				data: [Qp, Cp, Tp, Fp]
		    
		          				  }, {
					                name: 'F-MSI',
					                data: [Qf, Cf, Tf, Ff]
		          				 
		          				  }, {
			               		    name: 'P-NSCFI',
			               			data: [newScfiPastQuality, newScfiPastCost, newScfiPastTime, newScfiPastFlex]
		          				 
		          				  }, {
			               			name: 'F-NSCFI',
			               			data: [newScfiFutureQuality, newScfiFutureCost, newScfiFutureTime, newScfiFutureFlex]
		          				  
					    
		            }]
		        });
		    });
		    
		});
	
	//---------------------------------------------------------------------------------------------------------- calculation for P, A, D
	
	var Pp = 0;	
	var Ap = 0;
	var Dp = 0;
	
	var Pf = 0;
	var Af = 0;
	var Df = 0;
	
	
 /* 	 newScfiPastQuality = 0.24758705;
	 newScfiPastCost = 0.246640769;
	 newScfiPastTime = 0.243467081;
	 newScfiPastFlex = 0.2623051;    */
	
	var npPros = 0;
	var npAnaly = 0;
	var npDefen = 0;
	var npQCT = newScfiPastQuality + newScfiPastCost + newScfiPastTime;
	
/*       newScfiFutureQuality = 0.282702098;
	 newScfiFutureCost = 0.266645284;
	 newScfiFutureTime = 0.216933792;
	 newScfiFutureFlex = 0.233718825;  */  
	
	var nfPros = 0;
	var nfAnaly = 0;
	var nfDefen = 0;
	var nfOCT = newScfiFutureQuality + newScfiFutureCost + newScfiFutureTime;
	
	//------------------------------------------------------------------------------------------------------------------------- P, A, D for MSI
	
		Pp = 1-(1-Math.pow(Qp/(Qp+Cp+Tp),1/3))*(1-0.9*(Tp/(Qp+Cp+Tp)))*(1-0.9*(Cp/(Qp+Cp+Tp)))*Math.pow(Fp,1/3);
		Ap = 1-(1-Fp)*Math.pow(Math.abs((0.95*(Qp/(Qp+Cp+Tp))-0.285)*(0.95*(Tp/(Qp+Cp+Tp))-0.285)*(0.95*(Cp/(Qp+Cp+Tp))-0.285)),1/3);
		Dp = 1-(1-Math.pow(Cp/(Qp+Cp+Tp),1/3))*(1-0.9*Tp/(Qp+Cp+Tp))*(1-0.9*Qp/(Qp+Cp+Tp))*Math.pow(Fp,1/3);
		
		Pf = 1-(1-Math.pow(Qf/(Qf+Cf+Tf),1/3))*(1-0.9*(Tf/(Qf+Cf+Tf)))*(1-0.9*(Cf/(Qf+Cf+Tf)))*Math.pow(Ff,1/3);
		Af = 1-(1-Ff)*Math.pow(Math.abs((0.95*(Qf/(Qf+Cf+Tf))-0.285)*(0.95*(Tf/(Qf+Cf+Tf))-0.285)*(0.95*(Cf/(Qf+Cf+Tf))-0.285)),1/3);
		Df = 1-(1-Math.pow(Cf/(Qf+Cf+Tf),1/3))*(1-0.9*Tf/(Qf+Cf+Tf))*(1-0.9*Qf/(Qf+Cf+Tf))*Math.pow(Ff,1/3);


		
	//------------------------------------------------------------------------------------------------------------------------- P, A, D for NSCFI
	
		npPros = 1-(1-Math.pow(newScfiPastQuality/npQCT,1/3))*(1-0.9*newScfiPastTime/npQCT)*(1-0.9*newScfiPastCost/npQCT)*Math.pow(newScfiPastFlex,1/3);
		npAnaly = 1-(1-newScfiPastFlex)*Math.pow(Math.abs((0.95*newScfiPastQuality/npQCT-0.285)*(0.95*newScfiPastTime/npQCT-0.285)*(0.95*newScfiPastCost/npQCT-0.285)),1/3);
		npDefen = 1-(1-Math.pow(newScfiPastCost/npQCT,1/3))*(1-0.9*newScfiPastTime/npQCT)*(1-0.9*newScfiPastQuality/npQCT)*Math.pow(newScfiPastFlex,1/3);
	
		nfPros = 1-(1-Math.pow(newScfiFutureQuality/nfOCT,1/3))*(1-0.9*newScfiFutureTime/nfOCT)*(1-0.9*newScfiFutureCost/nfOCT)*Math.pow(newScfiFutureFlex,1/3);
		nfAnaly = 1-(1-newScfiFutureFlex)*Math.pow(Math.abs((0.95*newScfiFutureQuality/nfOCT-0.285)*(0.95*newScfiFutureTime/nfOCT-0.285)*(0.95*newScfiFutureCost/nfOCT-0.285)),1/3);
		nfDefen = 1-(1-Math.pow(newScfiFutureCost/nfOCT,1/3))*(1-0.9*newScfiFutureTime/nfOCT)*(1-0.9*newScfiFutureQuality/nfOCT)*Math.pow(newScfiFutureFlex,1/3);
		


		
		document.getElementsByName('pmsi2Pros')[0].value= Pp.toFixed(5);
		document.getElementsByName('pmsi2Analy')[0].value= Ap.toFixed(5);
		document.getElementsByName('pmsi2Defen')[0].value= Dp.toFixed(5);
	
		document.getElementsByName('fmsi2Pros')[0].value= Pf.toFixed(5);
		document.getElementsByName('fmsi2Analy')[0].value= Af.toFixed(5);
		document.getElementsByName('fmsi2Defen')[0].value= Df.toFixed(5);
		
		document.getElementsByName('npPros')[0].value= npPros.toFixed(5);
		document.getElementsByName('npAnaly')[0].value= npAnaly.toFixed(5);
		document.getElementsByName('npDefen')[0].value= npDefen.toFixed(5);
		
		document.getElementsByName('nfPros')[0].value= nfPros.toFixed(5);
		document.getElementsByName('nfAnaly')[0].value= nfAnaly.toFixed(5);
		document.getElementsByName('nfDefen')[0].value= nfDefen.toFixed(5);
	
	//-------------------------------------------------------------------------------------------------------------------Radar chart for past
	
		$(function () {

			window.chart = new Highcharts.Chart({
			            
			    chart: {
			        renderTo: 'radarPast',
			        polar: true,
			        type: 'line'
			    },
			    
			    title: {
			        text: 'Past',
			        x: -50,
			        y: 50
			    },
			    
			    pane: {
			    	size: '80%'
			    },
			    
			    xAxis: {
			        categories: ['P', 'A', 'D'],
			        tickmarkPlacement: 'on',
			        lineWidth: 0
			    },
			        
			    yAxis: {
			        gridLineInterpolation: 'polygon',
			        lineWidth: 0,
			        min: 0,
			        max: 1
			    },
			    
			    tooltip: {
			    	shared: true,
			        valuePrefix: ''
			    },
			    
			    legend: {
			        align: 'right',
			        verticalAlign: 'top',
			        y: 100,
			        layout: 'vertical'
			    },
			    
			    series: [{
			        name: 'P-MSI',
			        data: [Pp, Ap, Dp],
			        pointPlacement: 'on'
			    }, {
			        name: 'P-NSCFI',
			        data: [npPros, npAnaly, npDefen],
			        pointPlacement: 'on'
			    }]
			
			});
		});
	
	//------------------------------------------------------------------------------------------------radar chart for Future
	
		$(function () {

			window.chart = new Highcharts.Chart({
			            
			    chart: {
			        renderTo: 'radarFuture',
			        polar: true,
			        type: 'line'
			    },
			    
			    title: {
			        text: 'Future',
			        x: -50,
			        y: 50
			    },
			    
			    pane: {
			    	size: '80%'
			    },
			    
			    xAxis: {
			        categories: ['P', 'A', 'D'],
			        tickmarkPlacement: 'on',
			        lineWidth: 0
			    },
			        
			    yAxis: {
			        gridLineInterpolation: 'polygon',
			        lineWidth: 0,
			        min: 0,
			        max: 1
			    },
			    
			    tooltip: {
			    	shared: true,
			        valuePrefix: ''
			    },
			    
			    legend: {
			        align: 'right',
			        verticalAlign: 'top',
			        y: 100,
			        layout: 'vertical'
			    },
			    
			    series: [{
			        name: 'F-MSI',
			        data: [Pf, Af, Df],
			        pointPlacement: 'on'
			    }, {
			        name: 'F-NSCFI',
			        data: [nfPros, nfAnaly, nfDefen],
			        pointPlacement: 'on'
			    }]
			
			});
		});
	
	
	
		//------------------------------------------------------------------------------------------------------- dynamic table for result
		
		
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
	     bold.appendChild(document.createTextNode("Quality"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Cost"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Time"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Flexiblity"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Prospector"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Analyzer"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     var th = document.createElement('TH');
	     var bold = document.createElement('B');
	     bold.appendChild(document.createTextNode("Defender"));
	     th.appendChild(bold);
	     tr.appendChild(th);
	     
		 var tableBody = document.createElement('TBODY');
		 table.appendChild(tableBody);
		 

		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr); 
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');
		  	   bold.appendChild(document.createTextNode("P-MSI check"));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(pastMsiQuality.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(pastMsiCost.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');       												/////////////////////////////////////////
		  	   td.appendChild(document.createTextNode(pastMsiTime.toFixed(5)));
			   tr.appendChild(td);
		       var td = document.createElement('TD');
			   td.appendChild(document.createTextNode(pastMsiFlex.toFixed(5)));
		  	   tr.appendChild(td);
		       tr.appendChild(td);
	  	   
	 		   
		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr);    
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');
		  	   bold.appendChild(document.createTextNode("F-MSI check"));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(futureMsiQuality.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(futureMsiCost.toFixed(5)));
		       tr.appendChild(td);		       
		       var td = document.createElement('TD');       												/////////////////////////////////////////
		  	   td.appendChild(document.createTextNode(futureMsiTime.toFixed(5)));
			   tr.appendChild(td);		  	   
		       var td = document.createElement('TD');
			   td.appendChild(document.createTextNode(futureMsiFlex.toFixed(5)));
		  	   tr.appendChild(td);		  	 
		       tr.appendChild(td);
	 
		       
		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr);    
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');
		  	   bold.appendChild(document.createTextNode("P-MSI (Enter Number)"));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(Qp.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(Cp.toFixed(5)));
		       tr.appendChild(td);		       
		       var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Tp.toFixed(5)));
			   tr.appendChild(td);		  	   
		       var td = document.createElement('TD');
			   td.appendChild(document.createTextNode(Fp.toFixed(5)));
		  	   tr.appendChild(td);
		  	   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Pp.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Ap.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Dp.toFixed(5)));
			   tr.appendChild(td);		  	   
		       tr.appendChild(td);	 
		       
		       
		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr);    
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');
		  	   bold.appendChild(document.createTextNode("F-MSI (Enter Number)"));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(Qf.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(Cf.toFixed(5)));
		       tr.appendChild(td);		       
		       var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Tf.toFixed(5)));
			   tr.appendChild(td);		  	   
		       var td = document.createElement('TD');
			   td.appendChild(document.createTextNode(Ff.toFixed(5)));
		  	   tr.appendChild(td);
		  	   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Pf.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Af.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(Df.toFixed(5)));
			   tr.appendChild(td);		  	   
		       tr.appendChild(td);	 
		       
		       
		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr);    
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');
		  	   bold.appendChild(document.createTextNode("P-NSCFI"));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(newScfiPastQuality.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(newScfiPastCost.toFixed(5)));
		       tr.appendChild(td);		       
		       var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(newScfiPastTime.toFixed(5)));
			   tr.appendChild(td);		  	   
		       var td = document.createElement('TD');
			   td.appendChild(document.createTextNode(newScfiPastFlex.toFixed(5)));
		  	   tr.appendChild(td);
		  	   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(npPros.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(npAnaly.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(npDefen.toFixed(5)));
			   tr.appendChild(td);		  	   
		       tr.appendChild(td);	
		       
		       
		       var tr = document.createElement('TR');
		       tableBody.appendChild(tr);    
		       var td = document.createElement('TD');	   
		  	   var bold = document.createElement('B');
		  	   bold.appendChild(document.createTextNode("F-NSCFI"));
		  	   td.appendChild(bold);
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(newScfiFutureQuality.toFixed(5)));
		       tr.appendChild(td);
		       var td = document.createElement('TD');
		  	   td.appendChild(document.createTextNode(newScfiFutureCost.toFixed(5)));
		       tr.appendChild(td);		       
		       var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(newScfiFutureTime.toFixed(5)));
			   tr.appendChild(td);		  	   
		       var td = document.createElement('TD');
			   td.appendChild(document.createTextNode(newScfiFutureFlex.toFixed(5)));
		  	   tr.appendChild(td);
		  	   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(nfPros.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(nfAnaly.toFixed(5)));
			   tr.appendChild(td);		  	   
			   var td = document.createElement('TD');       												
		  	   td.appendChild(document.createTextNode(nfDefen.toFixed(5)));
			   tr.appendChild(td);		  	   
		       tr.appendChild(td);
	    
	 myTableDiv.appendChild(table);
		
	
	}


function hideDiv() { 
	if (document.getElementById) { 
	document.getElementById('myDynamicResult').style.visibility = 'hidden'; 
	} 
	} 




//---------------------------------------------------------------------------------------------------Export Excel


$(document).ready(function() {
    $("#excelExport").click(function(e) {
        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        
  	    var table_div = document.getElementById('myDynamicResult');
		var table_html = table_div.outerHTML.replace(/ /g, '%20');
		
        a.href = data_type + ', ';
        a.href = a.href + table_html;
        
        
    /* 	    var table_div = document.getElementById('surfacePlotDiv2');
		var table_html = table_div.outerHTML.replace(/ /g, '%20');	
        a.href = a.href + table_html ;  */
        
 //       a.href = data_type + ', ';
        var table_div = 0;
        var table_html = 0;
 	    for(var i=1; i<=myArray.length; i++)
	    {
 		    table_div = document.getElementById('dyna'+ i);
 			table_html = table_div.outerHTML.replace(/ /g, '%20');	
		   	a.href = a.href + table_html ;
	            
	    }  

        //setting the file name
        a.download = 'Senor2_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
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

<?php
  $setIDnum=$_POST[setIDnum];
    if(($setIDnum!='1')&&($setIDnum!='2')&&($setIDnum!='3'))
    	$setIDnum='1';
?>

<form method='POST' action='sensor2.php'>
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


<form name="companyName" method="post" action="SR2" class="margin">
		
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
		  			<li><a href='sensor.php'><b>Form #1</b></a></li>
		  			<li><b>Form #2</b></li>
		  		</ul>
		</td>
		</tr>
		</table>

		
		<br/>
		
		<h2><input class="CustText" id="text1" name="Name1" size="50" style="font-weight:bold" value="Sense and Respond For Operations Strategy Questionnaire" /></h2>
		


		<table>
			<tr>
				<td><input class="CustText" id="text2" name="Name1" value="Company Name"/></td>
				<td><input type="text" name="CompanyName"></td>
			</tr>
		</table>
		
</form>

<form name="sensor" method="post" action="SR2" class="margin">





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

<h2>You are the Inquirer No. <b><span id="count">1</span></b></h2><a href="#result"><input class="right2" type="button" size="12" value="Calculate Submitted Data" onclick = "allValues();"></a>

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

			$questbodyidtemp='Attribute'.($i).'id';

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

		<br />



<form method="post" action="SR" class="margin">

		<table class="striped table2" id="result">
		<tr>
			<th></th>
			<th id="resultqualityid">Quality</th>
			<th id="resultcostid">Cost</th>
			<th id="resulttimeid">Time</th>
			<th id="resultflexibilityid">Flexibility</th>
			<th><i>Prospector</i></th>
			<th><i>Analyzer</i></th>
			<th><i>Defender</i></th>
		</tr>
		<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
		</tr>
		<tr>
			<td>P-MSI check</td>
			<td><input type="text" size="10" name="pmsiq" readonly></td>
			<td><input type="text" size="10" name="pmsic" readonly></td>
			<td><input type="text" size="10" name="pmsit" readonly></td>
			<td><input type="text" size="10" name="pmsif" readonly></td>
		</tr>
		<tr>
			<td>F-MSI check</td>
			<td><input type="text" size="10" name="fmsiq" readonly></td>
			<td><input type="text" size="10" name="fmsic" readonly></td>
			<td><input type="text" size="10" name="fmsit" readonly></td>
			<td><input type="text" size="10" name="fmsif" readonly></td>
		</tr>
		<tr>
			<td>P-MSI (Enter Number)</td>
			<td><input type="text" size="10" name="pmsiq2"></td>
			<td><input type="text" size="10" name="pmsic2"></td>
			<td><input type="text" size="10" name="pmsit2"></td>
			<td><input type="text" size="10" name="pmsif2"></td>
			<td><input type="text" size="10" name="pmsi2Pros" readonly></td>
			<td><input type="text" size="10" name="pmsi2Analy" readonly></td>
			<td><input type="text" size="10" name="pmsi2Defen" readonly></td>
		</tr>
		<tr>
			<td>F-MSI (Enter Number)</td>
			<td><input type="text" size="10" name="fmsiq2"></td>
			<td><input type="text" size="10" name="fmsic2"></td>
			<td><input type="text" size="10" name="fmsit2"></td>
			<td><input type="text" size="10" name="fmsif2"></td>
			<td><input type="text" size="10" name="fmsi2Pros" readonly></td>
			<td><input type="text" size="10" name="fmsi2Analy" readonly></td>
			<td><input type="text" size="10" name="fmsi2Defen" readonly></td>
		</tr>
		<tr>
			<td>P-NSCFI</td>
			<td><input type="text" size="10" name="npq" readonly></td>
			<td><input type="text" size="10" name="npc" readonly></td>
			<td><input type="text" size="10" name="npt" readonly></td>
			<td><input type="text" size="10" name="npf" readonly></td>
			<td><input type="text" size="10" name="npPros" readonly></td>
			<td><input type="text" size="10" name="npAnaly" readonly></td>
			<td><input type="text" size="10" name="npDefen" readonly></td>
		</tr>
		<tr>
			<td>F-NSCFI</td>
			<td><input type="text" size="10" name="nfq" readonly></td>
			<td><input type="text" size="10" name="nfc" readonly></td>
			<td><input type="text" size="10" name="nft" readonly></td>
			<td><input type="text" size="10" name="nff" readonly></td>
			<td><input type="text" size="10" name="nfPros" readonly></td>
			<td><input type="text" size="10" name="nfAnaly" readonly></td>
			<td><input type="text" size="10" name="nfDefen" readonly></td>
		</tr>
		</table>





		<table>
			<tr>
				<td><a href="#barChart"><input type="button" class="left" size="10" value="Graph" onclick = "graphMaker(); hideDiv();"></a>
				</td>
			</tr>
		</table>
	
		<br/>
		<br/>
	
		<div id="barChart" style= "min-width: 400px; height: 600px; margin:0 auto"></div>
		<br/>
		<br/>
		<div id="radarPast" style= "width: 600px; height: 600px; margin:0 auto; float:left" ></div>
		<div id="radarFuture" style= "width: 600px; height: 600px; margin:0 auto; float:left;" ></div>
		
		<table>
			<tr>
				<td><input type="button" id="excelExport" class="left" size="10" value="Export Excel"/>
				</td>
			</tr>
		</table>
		
		
		<div id="myDynamicResult">

</div>

	</form>

<?php echo "<input type='hidden' id='Questtotalnum' value='$i'/>"?>

	<form id="sendemail" action="sendemail.php" method="POST" enctype="multipart/form-data" class="margin">
	<p><input class="CustText" type="text" id="filename" name="filename" size="60" value="Sense and Respond For Operations Strategy Questionnaire Result Form2" readonly/></p>
	E-mail: <input type="text" id="email" name="email"/>
	<input style="border:1px;color:white" type="text" id="formData" name="formData" /> 	
	<input type="button" class="left" size="10" value="Email the Excel" onclick="sendemail('email','filename')"/>
	</form>	

</body>
</html>
		
