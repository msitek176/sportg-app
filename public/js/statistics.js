const likeButtons = document.querySelectorAll(".fa-heart");

function giveLike(likes, id_exercise){
        fetch(`/addLike/${id_exercise}`)
            .then(function(){
                    likes.innerHTML = parseInt(likes.innerHTML) +1;
                    likes.style.color="black";

            });

}
function removeLike(likes, id_exercise){
    fetch(`/removeLike/${id_exercise}`)
        .then(function(){
            likes.innerHTML = parseInt(likes.innerHTML) -1;
            likes.style.color="white";
        });

}

function check() {
    const likes = this;
    const color = window.getComputedStyle(this).getPropertyValue( "color" );
    const container = likes.parentElement.parentElement.parentElement;
    const id_exercise = container.getAttribute("id");
    console.log(color);

    if (color === "rgb(255, 255, 255)") {
        giveLike(likes,id_exercise);
    } else {
        removeLike(likes,id_exercise);
    }

}


likeButtons.forEach(button => button.addEventListener("click", check));



