const questions = document.querySelectorAll(".faq__row--question");

questions.forEach((question) => {
  question.addEventListener("click", (event) => {
    const row = event.currentTarget.parentNode;
    const answer = row.querySelector(".faq__row--answer");

    answer.classList.toggle("faq__answer--open");
  });
});

const getStarted = document.querySelector("#getStarted");
const loginInterface = document.querySelector(".get-started__content");
const loginContainer = document.querySelector(".get-started");

loginInterface.addEventListener("click", (event) => {
  event.stopPropagation();
});

getStarted.addEventListener("click", () => {
  loginContainer.classList.add("display-flex");
  document.body.classList.add("overflow-hidden");
  updatePosition();

  loginContainer.addEventListener("click", () => {
    loginContainer.classList.remove("display-flex");
    document.body.classList.remove("overflow-hidden");
    window.removeEventListener("scroll", updatePosition);
  });

  loginContainer.removeEventListener("click");
});

function updatePosition() {
  const scrollTopPos = window.scrollY;
  const distanzaDaTop = scrollTopPos + "px";
  loginContainer.style.top = distanzaDaTop;
}
