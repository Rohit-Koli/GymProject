//Js
document.querySelector(".mobile-btn").addEventListener("click", function () {
    document.querySelector(".menu").classList.toggle("active");
  });

function sub(){
  alert("Your Data has Been Submited !!!");
}
function res() {
var a=document.getElementById('submit-btn');
a.innerText=" ";
var b=document.getElementById('reset-btn');
b.innerText=" ";
alert("Hello User");
}
function email(){
  var em=document.getElementById("email").pattern;
  document.getElementById("GFG").innerHTML=em;
}
function pass(){
  var pass1=document.getElementById("pass1");
  var pass2=document.getElementById("pass2");
  if(pass1!=pass2){
    alert('Password Not Same !');
  }
}
var mobno=document.getElementById('mobile').value;
function mobileno(mobno){
  var phoneno=/^\d{10}$/;
  if (mobno.value.match(phoneno)) {
    return true;
  }else{
    alert("Not a Valid Mobile Number !");
    return false;
  }
}