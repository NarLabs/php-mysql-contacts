function validateForm() {
    var frm = document.forms.contact_form;
	function focus_and_false(el) {
        	el.focus();
        	return false;
    	}
    if( frm.first_name.value === "" ) {
        alert("Please insert contact's first name");
        return focus_and_false(frm.first_name);
    }    
    if( frm.last_name.value === "" ) {
        alert("Please insert contact's last name");
        return focus_and_false(frm.last_name);
    }    
    if( frm.phone_nr.value === "" ) {
        alert("Please insert contact's phone number");
        return focus_and_false(frm.phone_nr);
    }
    if( frm.email.value === "" ) {
        alert("Please insert contact's email address");
        return focus_and_false(frm.email);
    }
	
    //validare adresa email corecta
    var x=document.forms["contact_form"]["email"].value;
    var atpos=x.indexOf("@");
    var dotpos=x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length){
  	alert("Not a valid email address");
	return false;
    }
    return true;
}
