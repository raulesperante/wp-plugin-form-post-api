function showJsonResponse(json) {

    json = JSON.stringify(json);

    const displayJson = document.getElementById("jsonResponse");
    displayJson.style.display = "block";

    const insertJson = document.getElementById("insertJson").innerHTML += `${json}`;

}

if (document.getElementById("send")) {
    document.getElementById("send").addEventListener("click", function (event) {
        event.preventDefault();

        const title = document.getElementById("title").value;
        const body = document.getElementById("body").value;
        const userId = document.getElementById("userId").value;

        if (!(title && body && userId)) {
            return;
        }

        const formJson = {
            title: title,
            body: body,
            userId: userId
        };


        fetch('https://jsonplaceholder.typicode.com/posts', {
                method: 'POST',
                body: JSON.stringify(formJson),
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                }
            })
            .then(response => response.json())
            .then(json => showJsonResponse(json))

    });
}
