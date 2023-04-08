const sidebarToggle = document.querySelector("#sidebar-toggle");
const sidebar = document.querySelector(".sidebar");

sidebarToggle.addEventListener("click", () => {
  if (sidebar.classList.contains("active")) {
    sidebar.classList.remove("active");
    sidebarToggle.innerText = "=";
  } else {
    sidebar.classList.add("active");
    sidebarToggle.innerText = "x";
  }
});

// generate username




const switalert = document.querySelector('.switalert');
const okButton = document.querySelector('.switalert-ok');
const cancelButton = document.querySelector('.switalert-cancel');
const closeButton = document.querySelector('.switalert-close');

function showSwitalert() {
  switalert.classList.add('show');
}

function hideSwitalert() {
  switalert.classList.remove('show');
}

okButton.addEventListener('click', hideSwitalert);
cancelButton.addEventListener('click', hideSwitalert);
closeButton.addEventListener('click', hideSwitalert);



