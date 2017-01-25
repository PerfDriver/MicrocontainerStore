function Validate()
{
	
	var itemBought = localStorage.getItem("Item"); 
	
	//Get all inputs
    var inputs = [];
	
	inputs["userCardType"] = document.getElementById("cardType").value;
	inputs["userCardNo"] = document.getElementById("cardNo").value;
	
	document.getElementById("payment_CardTypeError").innerHTML="";
	document.getElementById("cardNo_Error").innerHTML="";
	
	var master = [];
	master["cardValid"] = true;
	master["cardNumberValid"] = true;
	
	
	var rules = [];
    rules["cardEmpty"] = "null";	
	rules["cardNoTooShort"] = "null";
	rules["cardNoTooLong"] = "null";
	rules["cardContainsLetters"] = "null";
	
	
	if(inputs["userCardType"] == "-- Select Card Type --")
	{
       master["cardValid"] = false;
       rules["cardEmpty"] = true;
       document.getElementById("payment_CardTypeError").innerHTML+="The Card Type cannot be empty";
	}
	if(inputs["userCardNo"].length < 16)
	{
		master["cardNumberValid"] = false;
        rules["cardNoTooShort"] = true;
		document.getElementById("cardNo_Error").innerHTML+="The Card Number cannot have less that 16 characters. ";
	}
	if(inputs["userCardNo"].length > 16)
	{
		master["cardNumberValid"] = false;
        rules["cardNoTooLong"] = true;
		document.getElementById("cardNo_Error").innerHTML+="The Card Number cannot have more that 16 characters. ";
		if(inputs["userCardNo"].length > 200)
		{
			document.getElementById("cardNo").value = document.getElementById("cardNo").value.substring(0, 20);
		}
		
	}
	
	if(!(/^[0-9]*$/.test(inputs["userCardNo"])))
	{
		master["cardNumberValid"] = false;
		rules["cardContainsLetters"] = true;
		document.getElementById("cardNo_Error").innerHTML = document.getElementById("cardNo_Error").innerHTML + "The card number can only contain numbers.";
	}
	
	
   
   var Mform = document.forms['MasterForm'];

	function addHiddenField(form, fieldName, fieldValue)
	{
	  field = document.createElement('input');
	  field.type = 'hidden';
	  field.name = fieldName;
	  field.value = fieldValue;
	  form.appendChild(field);
	}

	//send all the master rules and their values onwards
	for(var propertyName in master) 
	{
	   addHiddenField(Mform,propertyName,master[propertyName]);
	}

	//check to see if to submit
	var SubmitPage = master["cardValid"] && master["cardNumberValid"];

	//Set the early finish if the submission aint happenin'
	addHiddenField(Mform,"EarlyFinish",!SubmitPage);

	//Sends the outputs on either way, only navigates if successful
	 if((!(/^[0-9]*$/.test(inputs["userCardNo"]))) && localStorage.getItem("Item")  == "Desk" && inputs["userCardNo"].length == 16)
	 {
		Mform.action = 'crash.php';
		Mform.submit;	
	}
	else if(SubmitPage)
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