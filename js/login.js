document.getElementById("loginForm").addEventListener("submit", function(e){

    e.preventDefault();

    let usuario=document.getElementById("usuario").value;
    let password=document.getElementById("password").value;

    if(usuario==="admin" && password==="1234"){

        alert("Bienvenido al sistema");

        window.location="dashboard.php";

    }else{

        alert("Usuario o contraseña incorrectos");

    }

});