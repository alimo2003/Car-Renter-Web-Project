
var password = document.querySelector('#password'); 

if(document.querySelector('#togglepassword')){
    togglePassword.addEventListener('click', function (e) { 
  
        // Toggle the type attribute 
        const type = password.getAttribute( 
            'type') === 'password' ? 'text' : 'password'; 
        password.setAttribute('type', type); 
  
        // Toggle the eye slash icon 
        if (togglePassword.src.match("https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png")) { 
            togglePassword.src ="https://media.geeksforgeeks.org/wp-content/uploads/20210917145551/eye.png"; 
        } else { 
            togglePassword.src ="https://media.geeksforgeeks.org/wp-content/uploads/20210917150049/eyeslash.png"; 
        } 
    }); 
}
