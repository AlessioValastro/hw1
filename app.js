const questions = document.querySelectorAll(".faq__row--question");

questions.forEach((question) => {
  question.addEventListener("click", (event) => {
    const row = event.currentTarget.parentNode;
    const answer = row.querySelector(".faq__row--answer");

    answer.classList.toggle("faq__answer--open");
  });
});
