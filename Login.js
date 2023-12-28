const xhr=new XMLHttpRequest();
function check(){
    xhr.onreadystatechange=function(){
        if(xhr.status==200 && xhr.readyState==4){
            if(document.getElementById("T").value===this.responseText){
                document.getElementById("TA").innerHTML="Available"

            }else{
                document.getElementById("TA").innerHTML="Not Available"
            }
        }
    }
    xhr.open("POST", "mydata.txt", true);
    xhr.send();
}