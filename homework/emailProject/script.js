function submitContact(event){
    //runs validation and submits form contents to personal email
    let nameValid = nameValidation();
    let emailValid = emailValidation();
    let messageValid = messageValidation();
    if(nameValid && emailValid && messageValid){
        document.querySelector("#submitClicked").innerHTML = "Thank you for contacting us!";
        document.querySelector("#contactForm").reset();
    }
    else {
        event.preventDefault();
    }
}

function nameValidation(){
    //validates the name is filled
    let validForm = true;
    let displayName = document.querySelector("#name").value;
        if(displayName == ""){
            validForm = false;
            document.querySelector("#nameError").innerHTML = "Name cannot be blank.";
        }
        return validForm;
}

function emailValidation(){
    //validates the email is a valid format and is filled
    let validForm = true;
    let displayEmail = document.querySelector("#email").value;
        if(displayEmail == ""){
            validForm = false;
            document.querySelector("#emailError").innerHTML = "Email cannot be blank.";
        }
		else{
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(displayEmail)){
				document.querySelector("#email").innerHTML = displayEmail;
			}
			else{
				validForm = false;
            	document.querySelector("#emailError").innerHTML = "Email must be formatted correctly.";
			}
		}
        return validForm;
}

function messageValidation(){
    //validates the message is filled
    let validForm = true;
    let displayMessage = document.querySelector("#message").value;
        if(displayMessage == ""){
            validForm = false;
            document.querySelector("#messageError").innerHTML = "Message cannot be blank.";
        }
        return validForm;
}

function clearNameError(){
    //clears the name error message
    document.querySelector("#nameError").innerHTML = "";
}

function clearEmailError(){
    //clears the email error message
    document.querySelector("#emailError").innerHTML = "";
}

function clearSubjectError(){
    //clears the subject error message
    document.querySelector("#subjectError").innerHTML = "";
}

function clearMessageError(){
    //clears the message error message
    document.querySelector("#messageError").innerHTML = "";
}

function resetErrors(){
    //clears the error messages when clicking reset
    document.querySelector("#nameError").innerHTML = "";
    document.querySelector("#emailError").innerHTML = "";
    document.querySelector("#subjectError").innerHTML = "";
    document.querySelector("#messageError").innerHTML = "";
    document.querySelector("#submitClicked").innerHTML = "";
}