document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("exit-cross").addEventListener("click", () => {
      window.location.href = "index.php";
  });

  const formStatus = { username: false, email: false, password: false, upload: true };

  function jsonCheckUsername(json) {
      formStatus.username = !json.exists;
      const usernameElement = document.querySelector(".username");
      if (formStatus.username) {
          usernameElement.classList.remove("errorj");
      } else {
          usernameElement.querySelector("span").textContent = "Nome utente già utilizzato";
          usernameElement.classList.add("errorj");
      }
  }

  function fetchResponse(response) {
      if (!response.ok) throw new Error('Network response was not ok');
      return response.json();
  }

  function checkUsername(event) {
      const input = event.currentTarget;
      if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
          input.parentNode.querySelector("span").textContent =
              "Sono ammesse lettere, numeri e underscore. Max. 15";
          input.parentNode.classList.add("errorj");
          formStatus.username = false;
      } else {
          fetch("http://localhost/progetti/hw1/check_username.php?q=" + encodeURIComponent(input.value))
              .then(fetchResponse)
              .then(jsonCheckUsername)
              .catch(error => console.error('Error:', error));
      }
  }

  function jsonCheckEmail(json) {
      formStatus.email = !json.exists;
      const emailElement = document.querySelector(".email");
      if (formStatus.email) {
          emailElement.classList.remove("errorj");
      } else {
          emailElement.querySelector("span").textContent = "Email già utilizzata";
          emailElement.classList.add("errorj");
      }
  }

  function checkEmail(event) {
      const emailInput = event.currentTarget;
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
          document.querySelector(".email span").textContent = "Email non valida";
          document.querySelector(".email").classList.add("errorj");
          formStatus.email = false;
      } else {
          fetch("http://localhost/progetti/hw1/check_email.php?q=" + encodeURIComponent(emailInput.value))
              .then(fetchResponse)
              .then(jsonCheckEmail)
              .catch(error => console.error('Error:', error));
      }
  }

  function checkPassword(event) {
      const passwordInput = event.currentTarget;
      formStatus.password = passwordInput.value.length >= 8;
      if (formStatus.password) {
          document.querySelector(".password").classList.remove("errorj");
      } else {
          document.querySelector(".password").classList.add("errorj");
      }
  }

  function checkSignup(event) {
      if (Object.values(formStatus).includes(false)) event.preventDefault();
  }

  document.querySelector(".username input").addEventListener("blur", checkUsername);
  document.querySelector(".email input").addEventListener("blur", checkEmail);
  document.querySelector(".password input").addEventListener("blur", checkPassword);
  document.querySelector(".get-started__left--login").addEventListener("submit", checkSignup);
});
