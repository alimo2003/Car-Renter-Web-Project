document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(form);

        fetch('signupp.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'Login.html';
            } else {
                const phpError = document.getElementById('phperror');
                phpError.textContent = data.message;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

function togglepassword(){
    event.preventDefault();
    var password = document.getElementById('password'); 
    var type = password.getAttribute('type') === 'password' ? 'text' : 'password'; 
    var btnlabel=document.getElementById("togglebtn")
    password.setAttribute('type', type);
    if(btnlabel.innerHTML==="Show"){
        btnlabel.innerHTML="Hide"
    }
    else{
        btnlabel.innerHTML="Show"
    }   
}

var fnames,lnames,emails,passwords,conpasswords,phonenumbers=false;

function validatefname(){
    var fname=document.getElementById("fname").value
    if (/\d/.test(fname)) {
        document.getElementById("fname").style.border="2px solid red"
        fnames=false;
        document.getElementById("fnameerror").innerHTML="First name contains numbers";
        document.getElementById("fnameerror").style.color="red";
        document.getElementById("fnameerror").style.fontSize="medium";
    }else {
        fnames=true;
        document.getElementById("fname").style.border="2px solid green"
        document.getElementById("fnameerror").innerHTML="";
    }
}

function validatelname(){
    var fname=document.getElementById("lname").value
    if (/\d/.test(fname)) {
        document.getElementById("lname").style.border="2px solid red"
        lnames=false;
        document.getElementById("fnameerror").innerHTML="Last name contains numbers";
        document.getElementById("fnameerror").style.color="red";
        document.getElementById("fnameerror").style.fontSize="medium";
    }else {
        lnames=true;
        document.getElementById("lname").style.border="2px solid green"
        document.getElementById("fnameerror").innerHTML="";
    }
}

function validateemail(){
    var emaill=document.getElementById("email").value
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emaill)) {
        document.getElementById("email").style.border="2px solid green"
        document.getElementById("emailerror").innerHTML="";
        emails=true
    } 
    else {
        document.getElementById("email").style.border="2px solid red"
        emails=true;
        document.getElementById("emailerror").innerHTML="invalid email";
        document.getElementById("emailerror").style.color="red";
        document.getElementById("emailerror").style.fontSize="medium";
    }
}

function validatpassword(){
    var passwordd=document.getElementById("password").value
    if (/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(passwordd)) {
        document.getElementById("password").style.border="2px solid red"
        passwords=false;
        document.getElementById("passworderror").innerHTML="invalid Password";
        document.getElementById("passworderror").style.color="red";
        document.getElementById("passworderror").style.fontSize="medium";
    }else {
        document.getElementById("password").style.border="2px solid green"
        passwords=true;
        document.getElementById("passworderror").innerHTML="";
    }
}

function Confirmpassword(){
    var password= document.getElementById("password").value
    var confirm=document.getElementById("confirmpassword").value
    if(password === confirm){      
          document.getElementById("confirmpassword").style.border="2px solid green"
          conpasswords=true;
          document.getElementById("passworderror").innerHTML="";
    } else {
    conpasswords=false;
    document.getElementById("confirmpassword").style.border="2px solid red"
    document.getElementById("passworderror").innerHTML="The two passwords aren't the same";
    document.getElementById("passworderror").style.color="red";
    document.getElementById("passworderror").style.fontSize="medium";
    }
}

function validatephone(){
    var phone= document.getElementById("phonenumber").value.length
    if(phone===11){
        phonenumbers=true;
        document.getElementById("phonenumber").style.border="2px solid green"
        document.getElementById("phoneerror").innerHTML="";
    }
    else{
        phonenumbers=false;
        document.getElementById("phonenumber").style.border="2px solid red"
        document.getElementById("phoneerror").innerHTML="Invalid Phone Number";
        document.getElementById("phoneerror").style.color="red";
        document.getElementById("phoneerror").style.fontSize="medium";
    }
}
function validatebutton() {
if (fnames==true && lnames==true && emails==true && passwords==true && conpasswords==true && phonenumbers==true) {
    document.getElementById("submitbtn").disabled = false;
} else {
    document.getElementById("submitbtn").disabled = true;
}
}