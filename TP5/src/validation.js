// Returns true is there is a digit in string t
function hasDigit(t) {
    var regex = /\d/;
    return regex.test(t);
}

// Returns true is there is a uppercase letter in string t
function hasUppercase(t) {
    var regex = /[A-Z]/;
    return regex.test(t);
}

// Returns true is there is a lowercase letter in string t
function hasLowercase(t) {
    var regex = /[a-z]/;
    return regex.test(t);
}

// Returns true if form has valid data
function validateForm(){
    let field_password = document.getElementById("fpassword");
    let field_check_password = document.getElementById("CheckPassword");

    return (field_check_password.value == field_password.value && field_check_password.value.length >= 8 &&
    hasDigit(field_check_password.value) && hasLowercase(field_check_password.value) && hasUppercase(field_check_password.value));
}