document.addEventListener("DOMContentLoaded", () => {
  const regexNomValide = /^[\p{L}\s-]+$/u;
  const mailValide = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  const form = document.getElementById("formulaire");
  const submitBtn = document.getElementById("submit");
  const passWd = document.getElementById("passwd");
  const passWdChk = document.getElementById("passwd-chk");
  form.addEventListener("input", (event) => {
    const parent = event.target.parentElement;
    const span = document.querySelector(`.${parent.classList[1]} + span`);
    const attribute = event.target.getAttribute("type");

    if (event.target.tagName === "INPUT" && attribute === "text") {
      function checkName(champ) {
        return regexNomValide.test(champ);
      }

      if (
        !checkName(event.target.value.trim()) &&
        event.target.value.trim() !== ""
      ) {
        event.target.style.borderColor = "red";
        submitBtn.style.cursor = "not-allowed";
        submitBtn.style.backgroundColor = "grey";
        span.style.display = "flex";
      } else {
        event.target.style.borderColor = "green";
        submitBtn.style.cursor = "pointer";
        submitBtn.style.backgroundColor = "green";
        span.style.display = "none";
      }
    }

    const mailValide = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    function checkMail(mail) {
      return mailValide.test(mail);
    }

    if (event.target.tagName === "INPUT" && attribute === "email") {
      const emailAValider = event.target.value.trim();

      if (!checkMail(emailAValider) && emailAValider !== "") {
        event.target.style.borderColor = "red";
        submitBtn.style.cursor = "not-allowed";
        submitBtn.style.backgroundColor = "grey";
        span.style.display = "flex";
      } else {
        event.target.style.borderColor = "green";
        submitBtn.style.cursor = "pointer";
        submitBtn.style.backgroundColor = "green";
        span.style.display = "none";
      }
    }

    function verifierMotDePasse(firstPassWd, secondPassWd) {
      return firstPassWd === secondPassWd;
    }

    if (
      event.target.tagName === "INPUT" &&
      attribute === "password" &&
      event.target.id === "passwd-chk"
    ) {
      const first = document.getElementById("passwd");
      if (
        !verifierMotDePasse(first.value, event.target.value) &&
        event.target.value !== ""
      ) {
        event.target.style.borderColor = "red";
        first.style.borderColor = "red";
        submitBtn.style.cursor = "not-allowed";
        submitBtn.style.backgroundColor = "grey";
        span.style.display = "flex";
      } else {
        event.target.style.borderColor = "green";
        first.style.borderColor = "green";
        submitBtn.style.cursor = "pointer";
        submitBtn.style.backgroundColor = "green";
        span.style.display = "none";
      }
    }
  });
});