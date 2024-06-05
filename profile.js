document.querySelector("#import-new-file").addEventListener("click", () => {
  document.querySelector(".import-file__box").classList.remove("display-none");
});

document.querySelector("#file").addEventListener("change", function () {
  let fileName = this.files[0] ? this.files[0].name : "No file selected";
  document.querySelector("#fileName").textContent = fileName;
});

document.forms["import"].addEventListener("submit", function (event) {
  event.preventDefault();
  let formData = new FormData(this);

  fetch("upload-file.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
    });
  document.querySelector(".import-file__box").classList.add("display-none");
  window.location.href = "profile.php";
});

function deleteFile(fileId) {
  fetch(`delete-file.php?q=${fileId}`)
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        // Rimuovi visivamente il file eliminato
        const fileToDelete = document.querySelector(`[data-id="${fileId}"]`);
        if (fileToDelete) {
          fileToDelete.remove();
        }
      } else {
        console.error("Errore durante l'eliminazione del file:", data.error);
      }
    })
    .catch((error) => {
      console.error(
        "Errore durante la richiesta di eliminazione del file:",
        error
      );
    });
}

function onJson(json) {
  console.log(json);
  const libraryBox = document.querySelector(".library");
  json.forEach((file) => {
    const fileBox = document.createElement("div");
    const fileName = document.createElement("a");
    const trashBin = document.createElement("img");

    fileBox.setAttribute("data-id", file.id);

    libraryBox.appendChild(fileBox);
    libraryBox.classList.add("library");

    fileName.innerHTML = file.file_name;
    fileName.href = `open-file.php?id=${file.id}`;
    fileName.target = "_blank";
    fileName.classList.add("file-row");

    trashBin.src = "public/profile/rubbish-bin-svgrepo-com (1).svg";
    trashBin.addEventListener("click", function () {
      deleteFile(file.id);
    });

    fileBox.appendChild(fileName);
    fileBox.appendChild(trashBin);
  });
}

function onResponse(response) {
  return response.json();
}

fetch("http://localhost/progetti/hw1/library.php")
  .then(onResponse)
  .then(onJson);

function onSearchJson(json) {
  const libraryBox = document.querySelector(".library");
  libraryBox.innerHTML = "";
  json.forEach((file) => {
    const fileBox = document.createElement("div");
    const fileName = document.createElement("a");
    const trashBin = document.createElement("img");

    libraryBox.appendChild(fileBox);
    libraryBox.classList.add("library");

    fileName.innerHTML = file.file_name;
    fileName.href = `open-file.php?id=${file.id}`;
    fileName.target = "_blank";

    trashBin.src = "public/profile/rubbish-bin-svgrepo-com (1).svg";

    fileBox.appendChild(fileName);
    fileBox.appendChild(trashBin);
  });
}

function onSearchResponse(response) {
  return response.json();
}
document
  .querySelector("#search-your-library")
  .addEventListener("input", function () {
    let content = document.querySelector("#search-your-library").value;

    fetch(
      "http://localhost/progetti/hw1/search-library.php?q=" +
        encodeURIComponent(content)
    )
      .then(onSearchResponse)
      .then(onSearchJson);
  });

document
  .querySelector(".review__box")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    let formData = new FormData(this);

    fetch("save-review.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
      })
      .catch((error) => {
        console.error("Errore:", error);
      });
  });

document.querySelector(".avatar").addEventListener("click", function () {
  document
    .querySelector(".profile-managment")
    .classList.toggle("display-slide-in");
});
