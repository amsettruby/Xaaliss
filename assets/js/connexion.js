document.addEventListener("DOMContentLoaded", () => {
  const toggleVisibility = document.getElementById("eye");
  const input = document.getElementById("passwd");

  toggleVisibility.addEventListener("click", () => {

    if (input.type == "password") {
      toggleVisibility.className = "bi bi-eye-slash";
      input.type = "text";
    } else {
      toggleVisibility.className = "bi bi-eye";
      input.type = "password";
    }
  });
});
