

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

function validatefname(){
    var fname=document.getElementById("fname").value
    if (/\d/.test(fname)) {
        document.getElementById("fname").style.border="2px solid red"
        document.getElementById("submitbtn").disabled=true;
        document.getElementById("fnameerror").innerHTML="First name contains numbers";
        document.getElementById("fnameerror").style.color="red";
        document.getElementById("fnameerror").style.fontSize="medium";

    }else {
        document.getElementById("fname").style.border="2px solid green"
        document.getElementById("submitbtn").disabled=false;
        document.getElementById("fnameerror").innerHTML="";
    }
}

function validatelname(){
    var fname=document.getElementById("lname").value
    if (/\d/.test(fname)) {
        document.getElementById("lname").style.border="2px solid red"
        document.getElementById("submitbtn").disabled=true;
        document.getElementById("fnameerror").innerHTML="Last name contains numbers";
        document.getElementById("fnameerror").style.color="red";
        document.getElementById("fnameerror").style.fontSize="medium";
    }else {
        document.getElementById("lname").style.border="2px solid green"
        document.getElementById("submitbtn").disabled=false;
        document.getElementById("fnameerror").innerHTML="";
    }
}

function validateemail(){
    var emaill=document.getElementById("email").value
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emaill)) {
        document.getElementById("email").style.border="2px solid green"
        document.getElementById("submitbtn").disabled=false;
        document.getElementById("emailerror").innerHTML="";
    } 
    else {
        document.getElementById("email").style.border="2px solid red"
        document.getElementById("submitbtn").disabled=true;
        document.getElementById("emailerror").innerHTML="invalid email";
        document.getElementById("emailerror").style.color="red";
        document.getElementById("emailerror").style.fontSize="medium";
    }
}

function validatpassword(){
    var passwordd=document.getElementById("password").value
    
    if (/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/.test(passwordd)) {
        document.getElementById("password").style.border="2px solid red"
        document.getElementById("submitbtn").disabled=true;
        document.getElementById("passworderror").innerHTML="invalid Password";
        document.getElementById("passworderror").style.color="red";
        document.getElementById("passworderror").style.fontSize="medium";
    }else {
        document.getElementById("password").style.border="2px solid green"
        document.getElementById("submitbtn").disabled=false;
        document.getElementById("passworderror").innerHTML="";
    }
}

function Confirmpassword(){
    var password= document.getElementById("password").value
    var confirm=document.getElementById("confirmpassword").value
    if(password === confirm){      
          document.getElementById("confirmpassword").style.border="2px solid green"
          document.getElementById("submitbtn").disabled=false;
          document.getElementById("passworderror").innerHTML="";
    } else {
    document.getElementById("confirmpassword").style.border="2px solid red"
    document.getElementById("submitbtn").disabled=true;
    document.getElementById("passworderror").innerHTML="The two passwords aren't the same";
    document.getElementById("passworderror").style.color="red";
    document.getElementById("passworderror").style.fontSize="medium";
    }
}

function validatephone(){
    var phone= document.getElementById("phonenumber").value.length
    if(phone===11){
        document.getElementById("phonenumber").style.border="2px solid green"
        document.getElementById("submitbtn").disabled=false;
        document.getElementById("phonexerror").innerHTML="";
    }
    else{
        document.getElementById("phonenumber").style.border="2px solid red"
        document.getElementById("submitbtn").disabled=true;
        document.getElementById("phoneerror").innerHTML="Invalid Phone Number";
        document.getElementById("phoneerror").style.color="red";
        document.getElementById("phoneerror").style.fontSize="medium";
    }
}

