const form = document.getElementById("login-form");
const email = document.getElementById("email");
const pass = document.getElementById("password");
const email_err = document.getElementById("email-err");
const pass_err = document.getElementById("pass-err");
const side_notification = document.getElementById("msg-box");

form.addEventListener("submit", async function(e){
  e.preventDefault();
  let hasError = false;
  email_err.textContent = "";
  pass_err.textContent = "";

  if(email.value.trim() === ""){
    email_err.textContent = "Enter email!";
    hasError = true;
  }

  if(pass.value.trim() == ""){
    pass_err.textContent = "Enter password!";
    hasError = true;
  }

  if(!hasError){
    const formData = new FormData(form);
    side_notification.textContent = "";
    const response = await fetch(
      "backend/auth/login.php",
      {
        method: "POST",
        body: formData
      }
    );
    const result = await response.json();
    //console.log(result) //Check

    if(result.status === "success"){
      email_err.textContent = "";
      pass_err.textContent = "";
      side_notification.textContent = result.message;
      side_notification.style.color = "green";
      window.location.href ="index.php"
    }

    if(result.status === "error"){
      if(result.feild === "email"){
        email_err.textContent = result.message;
      }
      if(result.feild === "pass"){
        pass_err.textContent = result.message;
      }
    }
  }
})

