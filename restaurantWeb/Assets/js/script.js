function validateChangePassword(currentPassword)
{
    //gets the value into variable
    var oldPassword = document.getElementById("oldPassword").value;
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    //checks old password
    if(currentPassword != oldPassword)
    {
        alert("old Password is wrong");
        return false;
    }
    //TODO: new password validation(function validate password)

    //checks if new password is matched with confirm password
    if(newPassword != confirmPassword)
    {
        alert("confirm password must be the same with new password");
        return false;
    }

    if (newPassword == "" || confirmPassword == "")
    {
        alert("must not be empty");
        return false;
    }
}

function validate()
{
    //gets the value of the input fields
    var username = document.forms["registerForm"]["username"].value;
    var password = document.forms["registerForm"]["password"].value;
    var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
    var email = document.forms["registerForm"]["email"].value;
    var name = document.forms["registerForm"]["name"].value;
    var error = 0;//counts the error

    correctDisplay("username");// show its right first
    correctDisplay("password");
    correctDisplay("confirmPassword");
    correctDisplay("email");
    correctDisplay("name");
    
    //below code ifs checks whether its wrong -- the right will be change
    if(username == "") //checks if its empty(wanted to consider if spaces are there too, but whatevs)
    {
        errorDisplay("username");
        error++;
    }
    if(password == "") //checks if its empty(wanted to consider if spaces are there too, but whatevs)
    {
        errorDisplay("password");
        error++;
    }
    if(confirmPassword == "" || password != confirmPassword) //checks if its empty(wanted to consider if spaces are there too, but whatevs)
    {
        errorDisplay("confirmPassword");
        error++;
    }
    if(email == "") //checks if its empty(wanted to consider if spaces are there too, but whatevs)
    {
        errorDisplay("email");
        error++;
    }
    if(name == "") //checks if its empty(wanted to consider if spaces are there too, but whatevs)
    {
        errorDisplay("name");
        error++;
    }

    if (error > 0)//checks if there are errors
    {
        return false;
    }
    return true;
    // alert("sample");
}

function errorDisplay(id)
{
    document.getElementById(id).style.border = "2px solid red";
}

function correctDisplay(id)
{
    document.getElementById(id).style.border = "2px solid green";    
}

//todo function below
//spaces is not allowed
function validatePassword(password)
{
    //atleast 1 capital
    //1 small letter
    //have a sign
    //minimum of 8 length
}

function validateEmail(email)
{
    //dunno lmao search google
    //no spaces and something i guess
}

function validateName(name)
{
    //must not have numbers

}

function validateUsername(username)
{
    //checks if it exist in the database
}