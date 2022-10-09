const search = document.querySelector('input[placeholder="Search tournaments"]');
const projectContainer = document.querySelector(".main");

search.addEventListener("keyup", function (event) {

    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (events) {
            projectContainer.innerHTML = "";
            loadProjects(events)
        });
    }
});

function loadProjects(events) {

    events.forEach(event => {
        createProject(event);
    });
}

function createProject(event) {
    const template = document.querySelector("#event-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `${event.image}`;

    const h1 = clone.querySelector("h1");
    h1.innerHTML = event.name;

    const h2 = clone.querySelector("h2");
    h2.innerHTML = event.game;

    const h3 = clone.querySelector("h3");
    h3.innerHTML = event.match_type;

    const date = clone.querySelector(".date");
    date.innerHTML = event.date;

    const address = clone.querySelector(".address");
    address.innerHTML = event.address;

    const prize = clone.querySelector(".prize");
    prize.innerHTML = event.prize;

    const fee = clone.querySelector(".fee");
    fee.innerHTML = event.fee;

    const a = clone.querySelector("a");
    a.setAttribute('href', '/details/?id=' + event.id);

    projectContainer.appendChild(clone);
}
