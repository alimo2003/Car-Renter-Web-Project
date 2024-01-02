document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginform');
    const passwordError = document.getElementById('passworderror');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(loginForm);

        fetch('LoginSS.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to the appropriate page based on the server response
                window.location.href = data.redirect;
            } else {
                passwordError.textContent = data.message;
                passwordError.style.color = 'red'; // Set the color to red
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
