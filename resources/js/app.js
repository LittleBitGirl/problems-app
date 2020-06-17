function validateForm() {
    var email = document.forms["createTaskForm"]["email"].value;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.forms["createTaskForm"]["email"].value)) {
        return (true)
    } else {
        alert("You have entered an invalid email address!");
        return (false)
    }
}