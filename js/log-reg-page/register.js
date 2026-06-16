//console.log("Done connected!");

const password = document.getElementById("password");
const conf_password = document.getElementById("confirm_password");
const err_msg = document.getElementById("pass-err");
const conf_pass_err = document.getElementById("con-pass-err");
const form = document.getElementById("register-form");
const side_notification = document.getElementById("msg-box");

conf_password.addEventListener("input", function(){
  validatePassword();
});

form.addEventListener("submit", async function(e){
  e.preventDefault();
  let hasError = false;

  //Validate pass and store true if have any errs
  if(!validatePassword()){
    hasError = true;
  }

  if(password.value !== conf_password.value){
    conf_pass_err.textContent = "Password doesn't match!";
    hasError = true;
  }else{
    conf_pass_err.textContent = "";
  }

  //Check all validation pass or not...
  if(!hasError){
    const form = document.getElementById("register-form");
    const formData = new FormData(form);
    //console.log([...formData]);
    
    side_notification.textContent = ""; //clear before notification
    const response = await fetch(
        "backend/auth/register.php",
        {
            method: "POST",
            body: formData
        }
    );
    const result = await response.json();
    //console.log(result);

    if(result.status === "error"){
      side_notification.textContent = result.message;
      side_notification.style.color = "red";
    }else if(result.status === "success"){
      side_notification.textContent = result.message;
      side_notification.style.color = "green";

      //Redirect to login.php after 1.5 s
      setTimeout(() => {
      window.location.href = "login.php";
      }, 1500);
    }

  }else{
    side_notification.textContent = "";
  }
});

//Use func for validate pass cause we repeat this code both places
function validatePassword(){
  if(password.value == ""){
    err_msg.textContent = "Enter correct password!";
    return false;
  }
  
  if(password.value.length < 8){
    err_msg.textContent = "Password must be at least 8 characters";
    return false;
  }
  
  err_msg.textContent = "";
  return true;
}