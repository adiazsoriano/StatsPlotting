function confirmPassword() {
    var pass = document.getElementById("password");
    var confirm = document.getElementById("confirm");
    
    if(pass.value !== confirm.value) {
        confirm.style.outline = "3px solid #FF0000";
    } else {
        confirm.style.outline = "3px solid #00FF00";
    }
}

function showPassword(id) {
    var show = document.getElementById(id);
    
    if(show.type === "password") {
        show.type = "text";
    } else if(show.type === "text") {
        show.type = "password";
    }
}