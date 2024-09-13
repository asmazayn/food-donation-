document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let usernameError = document.getElementById('username-error');
    let passwordError = document.getElementById('password-error');

    let usernamePattern = /^[a-zA-Z0-9]+$/;
    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    usernameError.style.display = 'none';
    passwordError.style.display = 'none';

    let valid = true;

    if (!usernamePattern.test(username)) {
        usernameError.textContent = "Username must be alphanumeric.";
        usernameError.style.display = 'block';
        valid = false;
    }

    if (!passwordPattern.test(password)) {
        passwordError.textContent = "Password must contain at least 8 characters, including uppercase, lowercase, number, and special character.";
        passwordError.style.display = 'block';
        valid = false;
    }

    /*if (valid) {
        // Simulate form submission and redirect to home.html
        console.log("Form submitted with username:", username, "and password:", password);
        alert("Form submitted successfully!");
        window.location.href = "home.html"; // Redirect to home.html
    }*/
});
