//Initialize DOM objects
const quackBox = document.getElementById("quack-box");
const quackLimit = document.getElementById("quack-limit");
const quackButton = document.getElementById("quack-button");
const quackList = document.getElementById("quack-list");
const followButtons = document.getElementsByClassName("follow");

//Function to count the number of characters in the text field
function setCounter() {
  let counter = quackBox.value.length;
  quackLimit.innerHTML = counter + "/255";
}

//Runs the createQuack() method when the Quack button is pressed
quackButton.addEventListener("click", createQuack);

//Function to post a new Quack
function createQuack() {
  //Create a new list item to add to the feed
  var li = document.createElement("li");
  li.setAttribute("class", "list-group-item quack");
  li.innerHTML = `
    <div class="media">
      <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" alt="" />
      <div class="media-body mx-2">
        <h5><a href="#">@YOUR_NAME</a><span class="float-right"><button class = "btn btn-danger delete-button"><i class="fas fa-times"></i> Delete</button></span></h5>
        ${quackBox.value} <br />
        <button class="btn float-right btn-danger like mx-1">
          <i class="fas fa-heart"></i>
        </button>
      </div>
    </div>`;
  quackList.insertBefore(li, document.querySelector(".quack"));
  quackBox.value = "";
  setCounter();
}

//Makes the follow buttons toggleable
for (let followButton of followButtons) {
  followButton.addEventListener("click", () => {
    followButton.classList.toggle("btn-outline-success");
    followButton.classList.toggle("btn-success");

    if (followButton.innerHTML.includes("ing")) {
      followButton.innerHTML = '<i class="fas fa-check"></i> Follow';
    } else {
      followButton.innerHTML = '<i class="fas fa-check"></i> Following';
    }
  });
}

//Intialize tooltips
tippy(".like");
