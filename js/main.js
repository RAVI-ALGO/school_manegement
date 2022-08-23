
function match_regex() {
  var password = document.getElementById("pass1").value;
  regEx1 = /^[A-Za-z]{1,}[@$#&*]{1,}[0-9]{1,}$/g;
  result1 = regEx1.test(password);
  regEx2 = /^[A-Za-z]{1,}[@$#&*]{1,}$/g;
  result2 = regEx2.test(password);
  regEx3 = /^[0-9]{1,}$/g;
  result3 = regEx3.test(password);
  regEx4 = /^[A-Za-z]{1,}[0-9]{1,}$/g;
  result4 = regEx4.test(password);
  if (result1 == true) {
    document.getElementById("msg").innerHTML = "Strong Password";
    document.getElementById("msg").style.color = "#218721";
    document.getElementById("msg").style.fontWeight = "600";


  }
  else if (result2 == true || result4 == true) {
    document.getElementById("msg").innerHTML = "Average Password";
    document.getElementById("msg").style.color = "blue";
    document.getElementById("msg").style.fontWeight = "600";
  }
  else {
    document.getElementById("msg").innerHTML = "Weak Password";
    document.getElementById("msg").style.color = "red";
    document.getElementById("msg").style.fontWeight = "600";
  }
}
function eye_change() {
    const myeye=document.querySelector('#eye');
  var EyeImageslashType=myeye.classList.contains('fa-eye-slash');
  if(EyeImageslashType==true)
  {
    document.getElementById("eye").classList.remove("fa-eye-slash");
    document.getElementById("eye").classList.add("fa-eye");
    document.getElementById("pass1").type="text";

  }
  else
  {
    document.getElementById("eye").classList.add("fa-eye-slash");
    document.getElementById("eye").classList.remove("fa-eye");
    document.getElementById("pass1").type="password";
  }
  }



  // index page
  
  