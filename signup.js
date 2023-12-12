
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

function containsNumbers(str) {
    return  /\d/.test(str);
  }

function validatename(){
    var field=document.getElementById("fname")
    var name=field.value
    console.log(containsNumbers(name))
    if(containsNumbers){
        field.style.border="solid green"
    }else{
        field.style.border="solid red"
    }

}
