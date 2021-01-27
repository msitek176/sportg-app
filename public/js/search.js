const search = document.querySelector('input[placeholder="search exercise"]');
const exerciseContainer= document.querySelector(".exercises");

search.addEventListener("keyup", function (event){
    if (event.key === "Enter"){
        event.preventDefault();
        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function(response){
            return response.json();
        }).then(function (exercises){
            exerciseContainer.innerHTML = "";
            loadExercises(exercises)
        });
    }
});

function loadExercises(exercises) {
    exercises.forEach(exercise =>{
        createExercise(exercise);
    });
}

function createExercise(exercise){
    const template = document.querySelector("#exercise-template");
    const clone = template.content.cloneNode(true);
    const div = clone.querySelector("#id_exercise");
    div.id = exercise.id_exercise;
    const image = clone.querySelector("img");
    image.src = `/public/uploads/${exercise.image}`;
    const name = clone.querySelector("h2");
    name.innerHTML = exercise.name;
    const description = clone.querySelector("p");
    description.innerHTML = exercise.description;
    const series = clone.querySelector("#series");
    series.innerHTML = exercise.series;
    const reps = clone.querySelector("#reps");
    reps.innerHTML = exercise.reps;
    const time = clone.querySelector("#time");
    time.innerHTML = exercise.time;
    const like = clone.querySelector(".fa-heart");
    like.innerText = exercise.count;

    exerciseContainer.appendChild(clone);
}