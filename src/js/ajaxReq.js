window.onload = function () {

    var http = new XMLHttpRequest();

    http.onload = function () {
        if (http.status == 200) {
            var ourData = JSON.parse(http.response);
            console.log(ourData.animals);
            renderHTML(ourData);
        }
    }
    http.open("GET", "../json/animals.json", true);
    http.send();

}

function renderHTML(data) {
    var htmlString = '';

    for (i = 0; i < data.animals.length; i++) {
        htmlString += "<p>" + data.animals[i].name + " with a key of " + data.animals[i].key + "</p>";
    }
    document.getElementById("animals").insertAdjacentHTML('beforeend', htmlString);
}
