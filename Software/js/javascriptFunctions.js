

//valdation of registration form
function validateRegisterForm() {
    //array to held errors
    window.alert("HI!")
    let errors = []
    //get information from form
    let password = document.forms["register"]["password"].value;
    let repassword = document.forms["register"]["repassword"].value;
    let email = document.forms["register"]["email"].value;

    //check valid inputs

    if (password == "") {
        errors.push("Password must be filled out");
    }

    if (repassword != password) {
        errors.push("Passwords do not match");
    }

    if (email == "") {
        errors.push("Email must be filled out");
    }//browser shoulld validate email address but just in case make sure has @ symbol
    else if (email.search('@') == -1) {
        errors.push("Invalid Email") 
    }
    else{
    }


    //if any errors alert user and return false, otherwise return true
    if (errors.length != 0) {
        message = "";
        errors.forEach(error => {
            message = message + '\n' + error;

        });
        alert("Invalid Input" + message)
        return false;
    }
    else {
        return true;
    }
}

//back button 
/*	document.querySelector('.back-btn').addEventListener('click', function() {
		window.history.back();
	}); */

    //show grants text fields 
function showGrants(val) {

    if (val ==1) {
        document.getElementById('grants_radio1Div').style.display = 'block';
        }
    if (val==2) {
        document.getElementById('grants_radio1Div').style.display = 'none';
        }
}
 
//cookie acceptance


function createItem() {
    var x = localStorage.setItem("GPDR", "True");
    var y = document.querySelector(".cookiesaccept");
    if (y.style.display === "none") {
        y.style.display = "block";
    } else {
        y.style.display = "none";
    }
} 




