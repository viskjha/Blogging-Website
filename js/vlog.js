function validate(inputId, errId) {
    var inputElement = document.getElementById(inputId);
    var errElement = document.getElementById(errId);
    if (inputElement.value.length == "") {
        errElement.style.color = "red";
        errElement.style.display = "block";
        // errElement.style.padding = "5px";
        // errElement.style.margin = "5px";
        // errElement.style.background = "red";
        errElement.innerHTML = "Can not be empty";
    } else {
        errElement.style.color = "blue";
        errElement.style.display = "block";
        errElement.innerHTML = "Correct";
    }
}


function validateForm() {
    var email = document.forms["login"]["email"].value;
    var pass1 = document.forms["login"]["pass1"].value;

    
    if (email == "") {
        alert("Email must be filled out");
        return false;
    }

    if (pass1 == "") {
        alert("Password must be filled out");
        return false;
    }

}
