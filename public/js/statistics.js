const likeButtons = document.querySelectorAll(".fa-heart");


function giveLike(likes, id_exercise, id_user){
    const cookie = id_user.concat("-",id_exercise,"=set; expires=Fri, 29 Jan 2021 12:00:00 UTC;");
    document.cookie=cookie;
    likes.style.color="black";

        fetch(`/addLike/${id_exercise}`)
            .then(function() {
                likes.innerHTML = parseInt(likes.innerHTML) + 1;
            });
}

function removeLike(likes, id_exercise, id_user){
    const cookie = id_user.concat("-",id_exercise,"=set; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;");
    document.cookie=cookie;
    likes.style.color="white";

    fetch(`/removeLike/${id_exercise}`)
        .then(function() {
            likes.innerHTML = parseInt(likes.innerHTML) - 1;
        });
}

function check() {
    const likes = this;
    const color = window.getComputedStyle(this).getPropertyValue("color");
    const container = likes.parentElement.parentElement.parentElement;
    const id_exercise = container.getAttribute("id");
    const id_user = document.querySelector(".hidden").getAttribute("id");

    if (color === "rgb(255, 255, 255)") {
        giveLike(likes, id_exercise, id_user);
    } else {
        removeLike(likes, id_exercise, id_user);
    }
}
likeButtons.forEach(button => button.addEventListener("click", check));



