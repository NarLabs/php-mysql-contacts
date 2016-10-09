function validateUser(){

	// validare existenta username
	var x=document.forms["signup_form"]["txtuname"].value;

	if (x==null || x==""){
		alert("Please insert your username");
		return false;
	}

	// vaildare introducere adresa email
	var x=document.forms["signup_form"]["txtemail"].value;

	if (x==null || x==""){
		alert("Please insert your email address");
		return false;
	}
	
	//validare adresa email corecta
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
  		alert("Not a valid email address");
		return false;
	}

	// vaildare confirmare adresa email
	var x=document.forms["signup_form"]["c_email"].value;

	if (x==null || x==""){
		alert("Please confirm you email address");
		return false;
	}
	
	// validare adresele email sunt identice
	var x=document.forms["signup_form"]["txtemail"].value;
	var y=document.forms["signup_form"]["c_email"].value;
	
	if (x !== y){
		alert("Email addresses don't match");
		return false;	
	}

	// validare parola
	var x=document.forms["signup_form"]["txtpass"].value;
	
	if (x==null || x==""){
		alert("Please insert your password");
		return false;
	}

	// validare confirmare parola
	var x=document.forms["signup_form"]["c_pass"].value;
	
	if (x==null || x==""){
		alert("Please confirm your password");
		return false;
	}

	// validare parolele sunt identice
	var x=document.forms["signup_form"]["txtpass"].value;
	var y=document.forms["signup_form"]["c_pass"].value;
	
	if (x !== y){
		alert("Passwords don't match");
		return false;	
	}
}
