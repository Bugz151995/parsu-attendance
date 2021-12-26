/**
 * toggle password visibility
 */
 function toggleVisibility(id)
 {
   var passwordInput = document.getElementById(id);
   if (passwordInput.type === "password") {
     passwordInput.type = "text";
   } else {
     passwordInput.type = "password";
   }
 }