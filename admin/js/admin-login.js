const loginForm = document.getElementById("adminLoginForm");
const message = document.getElementById("message");


loginForm.addEventListener("submit", async function (e){
  e.preventDefault();
  let hasError = false;
  const email = document.getElementById("email").value.trim();
  const pass = document.getElementById("password").value.trim();

  if(email === "" || pass === ""){
    message.textContent = "All fields are required.";
    hasError = true;
    return;
  }

  if(!hasError){
    const formData = new FormData(loginForm);
    message.textContent = "";
    const response = await fetch(
      "api/admin-login.php",
      {
        method: "POST",
        body: formData
      }
    );
    const result = await response.json();

    if(result.status === "error"){
      message.textContent = result.message;
      message.style.color = "red";
    } else{
      message.textContent = result.message;
      message.style.color = "green";
      window.location.href = "dashboard.php";
    }
  }
})
