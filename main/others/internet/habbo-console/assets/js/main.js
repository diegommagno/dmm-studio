const console = document.querySelector("#console-home")

console.addEventListener('click', handleClick)

function handleClick() {
  document.querySelector("#console-home").src = "./assets/img/console-examples/my-info-default.webp";
}