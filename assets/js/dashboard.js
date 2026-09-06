document.addEventListener("DOMContentLoaded", () => {
  document.addEventListener("click", function (event) {
    const disconnectModal = document.getElementById("disconnect-modal");
    const editModal = document.getElementById("edit-modal");
    const creanceModal = document.getElementById("creance-modal");
    const detteModal = document.getElementById("dette-modal");

    if (event.target.id === "logout" || event.target.id === "disconnect") {
      disconnectModal.style.display = "flex";
    } else if (event.target.id === "cancel") {
      const parent =
        event.target.parentElement.parentElement.parentElement.parentElement;
      parent.style.display = "none";
    }
    if (event.target.id === "non") disconnectModal.style.display = "none";

    if (event.target.id === "close") {
      const parent = event.target.parentElement.parentElement;
      parent.style.display = "none";
    }

    if (event.target.id === "ajouter-dette") {
      document.getElementById("dette-modal").style.display = "flex";
    } else if (event.target.id === "ajouter-creance") {
      document.getElementById("creance-modal").style.display = "flex";
    }

    if (event.target.id === "edit-creance") {
      const input = document.getElementById("id");
      input.value = event.target.parentElement.id;
      document.getElementById("ajouter").name = "edit-creance";
      // console.log(input.value);
      editModal.style.display = "flex";
    }

    if (event.target.id === "edit-dette") {
      const input = document.getElementById("id");
      // console.log(input.parentNode)
      const div = document.getElementById("div");
      div.style.backgroundColor = "#FF6B5B55";
      input.value = event.target.parentElement.id;
      document.getElementById("ajouter").name = "edit-dette";
      // console.log(input.value);
      editModal.style.display = "flex";
    }

    if (event.target.id === "delete-dette") {
      const id = event.target.parentElement.id;
      const input = document.getElementById("dette-id");
      input.value = id;
      console.log(input.value);
      document.getElementById("delete-dettes").style.display = "flex";
    }

    if (event.target.id === "delete-creance") {
      const id = event.target.parentElement.id;
      const input = document.getElementById("creance-id");
      input.value = id;
      console.log(input.value);
      document.getElementById("delete-creances").style.display = "flex";
    }
  });
});
