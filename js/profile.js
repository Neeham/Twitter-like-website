// Initialize DOM objects
const followButtons = document.getElementsByClassName("follow");
const quackBox = document.getElementById("quack-box");
const quackLimit = document.getElementById("quack-limit");
const profileFollowButton = document.querySelector(".profile-follow");

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
//Makes the follow button hidden on own profile page (Not needed anymore)

// function profileFollowHide() {
//   if (document.URL.includes("Lookup")) {
//     profileFollowButton.classList =
//       "btn btn-outline-success btn-sm follow mx-1 profile-follow";
//   } else {
//     profileFollowButton.classList =
//       "btn btn-outline-success btn-sm follow mx-1 profile-follow d-none";
//   }
// }
//Function to count the number of characters in the text field
function setCounter() {
  let counter = quackBox.value.length;
  quackLimit.innerHTML = counter + "/255";
}
//Loads at the start of a website (Not needed anymore)
// profileFollowHide();

//Initialize tooltips
tippy(".like");
