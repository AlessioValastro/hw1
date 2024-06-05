const questions = document.querySelectorAll(".faq__row--question");

questions.forEach((question) => {
  question.addEventListener("click", (event) => {
    const row = event.currentTarget.parentNode;
    const answer = row.querySelector(".faq__row--answer");

    answer.classList.toggle("faq__answer--open");
  });
});

function onJson(json) {
  console.log(json);
  const box = document.querySelector(".friends__box");
  json.forEach((review) => {
    const innerBox = document.createElement("div");
    const img = document.createElement("img");
    const intestazione = document.createElement("div");
    const h3 = document.createElement("h3");
    const p = document.createElement("p");
    const descrizione = document.createElement("p");

    box.appendChild(innerBox);
    innerBox.classList.add("friends__box--inner-box");
    innerBox.appendChild(intestazione);
    intestazione.classList.add("friends__inner-box--intestazione");

    img.src = review.avatar == "" ? "assets/default_avatar.png" : review.avatar;
    intestazione.appendChild(img);

    h3.innerHTML = review.username;
    intestazione.appendChild(h3);

    p.innerHTML = "Rating: " + review.rating + "/5";
    intestazione.appendChild(p);

    descrizione.classList.add("friends__inner-box--descrizione");
    descrizione.innerHTML = review.review_text;
    innerBox.appendChild(descrizione);
  });
}

function onResponse(response) {
  return response.json();
}

fetch("http://localhost/progetti/hw1/reviews.php")
  .then(onResponse)
  .then(onJson);
