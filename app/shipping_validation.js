function Validate()
{
    //We will return true or false depending on a set of rules, if one or more rules is broken, we will return false, else, true.                    
    //This is triggered from the onsubmit in the main form on the shipping.php page.

    //Get all inputs	
	
	var inputs = [];

    inputs["userEmail"] = document.getElementById("Email").value;
    inputs["userConfirmEmail"] = document.getElementById("ConfirmEmail").value;
    inputs["userName"] = document.getElementById("name").value;
    inputs["userAdr1"] = document.getElementById("line1").value;
    inputs["userAdr2"] = document.getElementById("line2").value;
    inputs["userCounty"] = document.getElementById("county").value;
    inputs["userCountry"] = document.getElementById("country").value;
    inputs["userPostCode"] = document.getElementById("post_code").value;
    
    //Reset Error messages
    document.getElementById("NameError").innerHTML="";
    document.getElementById("Adr1Error").innerHTML="";
    document.getElementById("Adr2Error").innerHTML="";
    document.getElementById("CountyError").innerHTML="";
    document.getElementById("CountryError").innerHTML="";
    document.getElementById("PostCodeError").innerHTML="";
	document.getElementById("EmailError").innerHTML="";
	document.getElementById("ConfirmEmailError").innerHTML="";
    
    
    
    //Define Master Field Flags
    var master = [];
    
    master["NameValid"] = true;
    master["Adr1Valid"] = true;
    master["Adr2Valid"] = true;
    master["CountyValid"] = true;
    master["CountryValid"] = true;
    master["PostCodeValid"] = true;
	master["EmailValid"] = true;
    
    
    //Define rule flags
    var rules = [];
    
    rules["NameCorrect"] = "null";
    rules["Adr1Correct"] = "null";
    rules["Adr2Correct"] = "null";
    rules["CountyCorrect"] = "null";
    rules["PostCodeCorrect"] = "null";
    
    rules["NameEmpty"] = "null";
    rules["Adr1Empty"] = "null";
    rules["Adr2Empty"] = "null";
    rules["CountyEmpty"] = "null";
    rules["CountryEmpty"] = "null";
    rules["PostCodeEmpty"] = "null";
	rules["EmailEmpty"] = "null";
	rules["EmailsDontMatch"] = "null";
	
    
    /* Name valid rules:
     * 1) Not empty
     * 2) just alphabetical chars AND spaces, no special, no numbers
     */
    
   if(inputs["userName"].trim() == "")
   {
       master["NameValid"] = false;
       rules["NameEmpty"] = true;
       document.getElementById("NameError").innerHTML+=" - The Name field cannot be empty";
       //alert("1");
   }   
   
   else if(!(/^[a-zA-Z\s]+$/.test(inputs["userName"]))) //I.e. contains something other than letters and spaces AND is not empty
   {
       master["NameValid"] = false;
       rules["NameCorrect"] = false;
       rules["NameEmpty"] = false;       
       document.getElementById("NameError").innerHTML+=" - The Name field cannot contain numbers or special characters. ";
   }  
   if(inputs["userName"].length > 100)
   {
	   master["NameValid"] = false;
       rules["NameCorrect"] = false;
	   document.getElementById("NameError").innerHTML = document.getElementById("NameError").innerHTML + "The Name field cannot be longer than 100 characters"; 
	   document.getElementById("name").value = document.getElementById("name").value.substring(0, 100);
   }
	
   
    /* Adr1 valid rules:
     * 1) Not empty
     * 2) just alphabetical, spaces and numerical chars, no special,
     */
   
   if(inputs["userAdr1"].trim() == "")
   {
       master["Adr1Valid"] = false;
       rules["Adr1Empty"] = true;
       document.getElementById("Adr1Error").innerHTML+=" - The Address Line 1 field cannot be empty";
       //alert("3");
   }
   
   else if(inputs["userAdr1"].length > 100)
   {
	   master["NameValid"] = false;
       rules["NameCorrect"] = false;
	   document.getElementById("Adr1Error").innerHTML = document.getElementById("Adr1Error").innerHTML + "The Address line 1 field cannot be longer than 100 characters";
	   document.getElementById("line1").value = document.getElementById("line1").value.substring(0, 100);
   }
   
   if(!(/^[a-zA-Z0-9\s]+$/.test(inputs["userAdr1"]))) //I.e. contains something other than letters, spaces and numbers AND is not empty
   {
       master["Adr1Valid"] = false;
       rules["Adr1Empty"] = false;
       rules["Adr1Correct"] = false;
       document.getElementById("Adr1Error").innerHTML+=" - The Address Line 1 field can only contain letters, numbers, and spaces";
       //alert("4");
   }
   
   else
   {
       rules["Adr1Empty"] = false;
       rules["Adr1Correct"] = true;   
   }
   
   
     /* Adr2 valid rules:
     * 1) If not empty, must be alpha numeric and space
     */
   
   if(inputs["userAdr2"].trim() != "")
   {
       rules["Adr2Empty"] = false;
       if(!(/^[a-zA-Z0-9\s]+$/.test(inputs["userAdr2"]))) //I.e. contains something other than letters, spaces and numbers GIVEN it wasn't empty 
       {
           master["Adr2Valid"] = false;
           rules["Adr2Correct"] = true;  
           document.getElementById("Adr2Error").innerHTML+=" - The Address Line 2 field must be either empty or only contain letters, numbers and spaces. ";
           //alert("5");
       }
       
       else
       {
           rules["Adr2Correct"] = true;  
       }
   }
   
   else
   {
       rules["Adr2Empty"] = true;
   }
   
   if(inputs["userAdr2"].length > 100)
   {
	   master["Adr2Valid"] = false;
       rules["Adr2Correct"] = false;
	   document.getElementById("Adr2Error").innerHTML = document.getElementById("Adr2Error").innerHTML + "The Address line 2 field cannot be longer than 100 characters";
	   document.getElementById("line2").value = document.getElementById("line2").value.substring(0, 100);
   }
   
    /* County valid rules:
     * 1) Not empty
     * 2) just alphabetical chars AND space, no special, no numbers
     */
    
   if(inputs["userCounty"].trim() == "")
   {
       master["CountyValid"] = false;
       rules["CountyEmpty"] = true;
       document.getElementById("CountyError").innerHTML+=" - The County field cannot be empty. ";
       //alert("6");
   }
   else if(inputs["userCounty"].length > 100)
   {
	  master["CountyValid"] = false;
	  document.getElementById("CountyError").innerHTML = document.getElementById("CountyError").innerHTML + "The County field cannot be greater than 100 characters";
	  document.getElementById("county").value = document.getElementById("county").value.substring(0, 100);
   }
   
   if(!(/^$|^[a-zA-Z\s]+$/.test(inputs["userCounty"]))) //I.e. contains something other than letters and spaces AND is not empty
   {
       master["CountyValid"] = false;
       rules["CountyCorrect"] = false;
       rules["CountyEmpty"] = false;
       document.getElementById("CountyError").innerHTML+=" - The County field can only contain letters, numbers and spaces. ";
       //alert("7");
   }
   

    
    
     /* Country valid rules:
     * 1) Not empty
     */
    
   if(inputs["userCountry"] == "-- Select a Country --")
   {
       master["CountryValid"] = false;
       rules["CountryEmpty"] = true;
       document.getElementById("CountryError").innerHTML+=" - The Country field cannot be empty";
       //alert("8");
   }
   else
   {
       rules["CountryEmpty"] = false;
   }
   

    /* Postcode valid rules:
     * 1) Not empty
     * 2) just alphabeticalchars, numbers  AND space, no special,
     */
    
   if(!(/(?:[A-Za-z]\d ?\d[A-Za-z]{2})|(?:[A-Za-z][A-Za-z\d]\d ?\d[A-Za-z]{2})|(?:[A-Za-z]{2}\d{2} ?\d[A-Za-z]{2})|(?:[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]{2})|(?:[A-Za-z]{2}\d[A-Za-z] ?\d[A-Za-z]{2})/.test(inputs["userPostCode"])))
   {
	   master["PostCodeValid"] = false;
	   document.getElementById("PostCodeError").innerHTML = document.getElementById("PostCodeError").innerHTML + "Please enter a valid UK postcode (OX294TP is a valid UK postcode)";
   }
   
   else if(inputs["userPostCode"].length > 100)
   {
	  master["PostCodeValid"] = false;
	  document.getElementById("PostCodeError").innerHTML = document.getElementById("PostCodeError").innerHTML + "The Country field cannot be greater than 100 characters";
	  document.getElementById("post_code").value = document.getElementById("post_code").value.substring(0, 100);
   }   
   
	if(!(/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i.test(inputs["userEmail"])))
	{
		master["EmailValid"] = false;
		document.getElementById("EmailError").innerHTML="Enter a valid email. ";		
	}
	if(inputs["userEmail"].trim() == "")
	{ 
		master["EmailValid"] = false;
		rules["EmailEmpty"] = true; 
		document.getElementById("EmailError").innerHTML=document.getElementById("EmailError").innerHTML + "The Email field cannot be empty. ";
	}
	else if(inputs["userEmail"].length > 100)
	{
	   master["EmailValid"] = false;
	   document.getElementById("EmailError").innerHTML = document.getElementById("EmailError").innerHTML + "The Email field cannot be longer than 100 characters";
	   document.getElementById("Email").value = document.getElementById("Email").value.substring(0, 100);
	}
	if(inputs["userConfirmEmail"].length > 100)   
	{
	   document.getElementById("ConfirmEmail").value = document.getElementById("ConfirmEmail").value.substring(0, 100);
	   inputs["userConfirmEmail"] = document.getElementById("ConfirmEmail").value
	}
   else if(inputs["userEmail"] != inputs["userConfirmEmail"])
   {
	   master["EmailValid"] = false;
	   rules["EmailsDontMatch"] = true;
	   document.getElementById("ConfirmEmailError").innerHTML="The Confirm Email field must match the Email field";	
   } 



//Add hidden inputs so the php can pick em up.

var Mform = document.forms['MasterForm'];

function addHiddenField(form, fieldName, fieldValue)
    {
      field = document.createElement('input');
      field.type = 'hidden';
      field.name = fieldName;
      field.value = fieldValue;
      form.appendChild(field);
    }

//semd all the rules and their values onwards
for(var propertyName in rules) {
   addHiddenField(Mform,propertyName,rules[propertyName]);
}
//semd all the master rules and their values onwards
for(var propertyName in master) {
   addHiddenField(Mform,propertyName,master[propertyName]);
}

if((inputs["userCountry"] == "Scotland"))
{
	Mform.action = 'crash.php';
	Mform.submit;	
}
else
{
//check to see if to submit
	var SubmitPage = master["NameValid"] && master["Adr1Valid"] && master["Adr2Valid"] && master["CountyValid"] && master["CountryValid"] && master["PostCodeValid"] && master["EmailValid"];

	//Set the early finish if the submission aint happenin'
	addHiddenField(Mform,"EarlyFinish",!SubmitPage);

	//Sends the outputs on either way, only navigates if successful
	if(SubmitPage)
	{
		Mform.setAttribute("target", "");
		Mform.submit;
	}

	else
	{
		Mform.setAttribute("target", "hidden-form");
		Mform.submit;
	}

}
}
 