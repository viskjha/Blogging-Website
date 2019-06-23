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

function validatePass() {
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var errElement = document.getElementById("pass2Err");
    if (pass1 != pass2) {
        errElement.style.color = "red";
        errElement.style.display = "block";
        errElement.innerHTML = "Password do not match";
    } else if (pass2 == "") {
        errElement.style.color = "red";
        errElement.style.display = "block";
        errElement.innerHTML = "Can not be empty";
    } else {
        errElement.style.color = "blue";
        errElement.style.display = "block";
        errElement.innerHTML = "Correct";
    }
}

function validateForm() {
    var fname = document.forms["login"]["fname"].value;
    var lname = document.forms["login"]["lname"].value;
    var uname = document.forms["login"]["uname"].value;
    var email = document.forms["login"]["email"].value;
    var num = document.forms["login"]["num"].value;
    var pass1 = document.forms["login"]["pass1"].value;
    var pass2 = document.forms["login"]["pass2"].value;
    if (fname == "") {
        alert("Name must be filled out");
        return false;
    }

    // else if (lname == "") {
    //     alert("Last Name must be filled out");
    //     return false;
    // }

    else if (uname == "") {
        alert("User Name must be filled out");
        return false;
    }

    else if (email == "") {
        alert("Email must be filled out");
        return false;
    }

    else if (num == "") {
        alert("Number must be filled out");
        return false;
    }

    else if (pass1 == "") {
        alert("Password must be filled out");
        return false;
    }

    else if (pass2 == "") {
        alert("password must be filled out");
        return false;
    }


}
