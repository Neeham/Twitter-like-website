//Initialize DOM objects
const quackBox = document.getElementById("quack-box");
const quackLimit = document.getElementById("quack-limit");
const quackButton = document.getElementById("quack-button");
const quackList = document.getElementById("quack-list");
//Function to count the number of characters in the text field
function setCounter() {

  let counter = quackBox.value.length;
  quackLimit.innerHTML = counter + "/255"

}

//Runs the createQuack() method when the Quack button is pressed
quackButton.addEventListener("click", createQuack);

//Function to post a new Quack
function createQuack() {


  //Create a new list item to add to list of quacks
  var li = document.createElement("li");
  li.setAttribute('class', "list-group-item quack");
  li.innerHTML = `
  <div class="media">
    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="" />
    <div class="media-body mx-2">
        <h5><a href="#">@YOUR_NAME</a></h5>
        ${quackBox.value} <br />
    <button class="btn float-right btn-danger like mx-1">
      <i class="fas fa-heart"></i>
    </button>
  </div>
</div>`
  quackList.insertBefore(li, document.getElementById("divider"));
  quackBox.value = "";



}