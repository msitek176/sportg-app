const element = document.querySelectorAll(".friend")[0];
function showProfile(){
    //const container = element;
    const id_friend = element.getAttribute("id");
    console.log(id_friend);
    fetch(`/friendprofile/${id_friend}`);
}



element.addEventListener("click", showProfile);


