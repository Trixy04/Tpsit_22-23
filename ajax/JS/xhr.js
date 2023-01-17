var button = document.getElementById("btn");

var foto = document.getElementById("image");

var nome = document.getElementById("name");

var cognome = document.getElementById("surname");

var email = document.getElementById("email");

function generateUser() {
    var xhr = new XMLHttpRequest()
    xhr.open("GET", 'https://randomuser.me/api/?gender=male');
    xhr.send();
    xhr.onload = function () {
        var text = xhr.response
        var obj = JSON.parse(text);
        var user = obj.results[0];
        displayUser(user);
    }
}

function displayUser(user){
    foto.src = user.picture.large
    nome.innerHTML = user.name.first;
    cognome.innerHTML = user.name.last;
    email.innerHTML = user.email;
}


button.addEventListener('click', generateUser);

