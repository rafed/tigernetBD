function formValidation()
{
	var result=false;
	var pwd=document.forms["registrationForm"]["password"];
	var confirmPassword = document.forms["registrationForm"]["confirmPassword"];
	
	if(pwd.value!= confirmPassword.value) {
		confirmPassword.setCustomValidity("Passwords Don't Match");
		confirmPassword.onkeyup=function(){
			confirmPassword.setCustomValidity('');
		};
	}
	else {
		confirmPassword.setCustomValidity('');
		result=true;
	}
	
	return result;
}