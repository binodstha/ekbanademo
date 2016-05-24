function chk_password(){

  //Store the password field objects into variables ...
  var password = document.getElementById('password');
  var re_password = document.getElementById('re_password');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    if(password.value == re_password.value) {
        re_password.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    } else {
        re_password.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}

function chk_dob()
{
	var badColor = "#ff6666";
	var rightnow = new Date();
	var selected = new Date(document.getElementById('dob').value);
	var message = document.getElementById('confirmMessage');

	if (rightnow < selected) {
		message.style.color = badColor;
		message.innerHTML = "DOB must be less then today";
		document.getElementById("submit").disabled = true;
	}else {
		message.innerHTML = "";
		document.getElementById("submit").disabled = false;
	}
}

function chk_search(){
	var selected = document.getElementById('search').value;
	if (selected == '') {
		document.getElementById("submit_search").disabled = true;	
	}else {
		document.getElementById("submit_search").disabled = false;
	}
}
function ConformDelete(user){
    var x;
    x= confirm('Do u want to delete user ' + user + '?');
    if (x != true) {
        return false;
    } else {
        return true;
    }
}