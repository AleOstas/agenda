function validate() {

    let mobile = document.getElementById("mobile").value;
    let regex = /^(\+(?:[0-9]{2}))?\s?\(?[7]{1}[2-8]{1}[0-9]\)?\s?[0-9]{3}\s?[0-9]{3}$/ 
    
   if(mobile.trim() == ""){
    alert("Enter a number");
    return false;
   }
   else if((regex.test(mobile))) {
    header('location: read.php'); 
    return true;
   }
   else {
    alert("wrong no");
    return false;
   }
  }