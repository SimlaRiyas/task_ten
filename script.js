function resetForm() {
    // document.getElementById("frmSubmit").reset();
    var form = document.getElementById("frmSubmit");
    var inputs = form.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type === "text" || inputs[i].type === "tel" || inputs[i].type === "email" || inputs[i].type === "password") {
            inputs[i].value = "";
        }
    }
}

function validateForm(e) {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
        document.getElementById("passwordError").style.display = "block";
        e.preventDefault();
        return false;
    } else {
        document.getElementById("passwordError").style.display = "none";
        return true;
    }
}