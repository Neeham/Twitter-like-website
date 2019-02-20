// Initialize DOM objects
const followButtons = document.getElementsByClassName("follow");

//Makes the follow buttons toggleable
for (let followButton of followButtons) {
    followButton.addEventListener("click", () => {
        followButton.classList.toggle("btn-outline-success");
        followButton.classList.toggle("btn-success");

        if (followButton.innerHTML.includes("ing")) {
            followButton.innerHTML = "<i class=\"fas fa-check\"></i> Follow";
        }
        else {
            followButton.innerHTML = "<i class=\"fas fa-check\"></i> Following";
        }
    })
}