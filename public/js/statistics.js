const likeButtons = document.querySelectorAll(".fa-heart");

function giveLike(){
        const likes = this;
        const container = likes.parentElement.parentElement.parentElement;
        const id_exercise = container.getAttribute("id");
        const id_user=1;

        fetch(`/count/${id_exercise}`)
            .then(function(){
                likes.innerHTML = parseInt(likes.innerHTML) +1;
                likes.style.color="black";
            });

}

likeButtons.forEach(button => button.addEventListener("click", giveLike));
