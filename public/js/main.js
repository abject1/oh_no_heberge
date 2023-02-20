const description = document.querySelector("#next-desc");
const btnDescription = document.querySelector("#btnDescription");
btnDescription.addEventListener("click", () => {
  description.classList.toggle("next");
});