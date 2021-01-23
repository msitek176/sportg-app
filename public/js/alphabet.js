const search = document.querySelector('input[id="Alphabet"]');
const exerciseContainer= document.querySelector(".gyms");

search.addEventListener("mouseup", function (event){

        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchGyms", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function(response){
            return response.json();
        }).then(function (gyms){
            exerciseContainer.innerHTML = "";


            loadGyms(gyms)
        });

});

function loadGyms(gyms) {
    gyms.forEach(gym =>{
        console.log(gym);
        createGym(gym);
    });
}

function createGym(gym){
    const template = document.querySelector("#gym-template");
    const clone = template.content.cloneNode(true);
   // const div = clone.querySelector("#gym");
    //div.id = exercise.id_exercise;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${gym.image}`;
    const name = clone.querySelector("h2");
    name.innerHTML = gym.name;
    const address = clone.querySelector("p");
    address.innerHTML = gym.address;



    exerciseContainer.appendChild(clone);
}