//Initialize DOM objects
const quackBox = document.getElementById("quack-box");
const quackLimit = document.getElementById("quack-limit");

//Function to count the number of characters in the text field
function setCounter() {
  let counter = quackBox.value.length;
  quackLimit.innerHTML = counter + "/255";
}
//Intialize tooltips
tippy(".like");
