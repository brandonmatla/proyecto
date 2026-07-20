const modal = document.getElementById("modalLibro");

const btnAlta = document.getElementById("btnAlta");

const btnCerrar = document.getElementById("cerrar");
let modo = "alta";

btnAlta.addEventListener("click", function(){

    modo = "alta";

    document.getElementById("tituloModal").innerText = "Nuevo Libro";

    document.getElementById("guardar").innerText = "Guardar";

    document.getElementById("formLibro").reset();

    document.getElementById("idLibro").value = "";

    modal.style.display = "block";

});

btnCerrar.addEventListener("click", function(){

    modal.style.display = "none";

});

const btnGuardar = document.getElementById("guardar");

btnGuardar.addEventListener("click", function(){

    let titulo = document.getElementById("titulo").value.trim();
    let autor = document.getElementById("autor").value.trim();
    let editorial = document.getElementById("editorial").value.trim();
    let anio = document.getElementById("anio").value.trim();
    let cantidad = document.getElementById("cantidad").value.trim();

    if(titulo=="" || autor=="" || editorial=="" || anio=="" || cantidad==""){

        alert("Todos los campos son obligatorios.");

        return;

    }

    const datos = new FormData();
datos.append("id", document.getElementById("idLibro").value);
    datos.append("titulo", titulo);
    datos.append("autor", autor);
    datos.append("editorial", editorial);
    datos.append("anio", anio);
    datos.append("cantidad", cantidad);

    let archivo = "php/guardarLibro.php";

if(modo=="editar"){
    archivo = "php/actualizarLibro.php";
}

fetch(archivo,{

        method:"POST",

        body:datos

    })

    .then(respuesta => respuesta.text())

    .then(resultado =>{

        if(resultado=="OK"){

           

            location.reload();

        }else{

            alert("Ocurrió un error al guardar.");

        }

    });

});

const botonesEditar = document.querySelectorAll(".btnEditar");

botonesEditar.forEach(function(boton){

    boton.addEventListener("click", function(){

        modo = "editar";

        document.getElementById("tituloModal").innerText = "Modificar Libro";

        document.getElementById("guardar").innerText = "Actualizar";

        document.getElementById("idLibro").value = this.dataset.id;

        document.getElementById("titulo").value = this.dataset.titulo;
        document.getElementById("autor").value = this.dataset.autor;
        document.getElementById("editorial").value = this.dataset.editorial;
        document.getElementById("anio").value = this.dataset.anio;
        document.getElementById("cantidad").value = this.dataset.cantidad;

        modal.style.display = "block";

    });

});

const botonesEliminar = document.querySelectorAll(".btnEliminar");

botonesEliminar.forEach(function(boton){

    boton.addEventListener("click", function(){

        let id = this.dataset.id;

        if(confirm("¿Desea eliminar este libro?")){

            const datos = new FormData();

            datos.append("id", id);

            fetch("php/eliminarLibro.php",{

                method:"POST",

                body:datos

            })

            .then(respuesta=>respuesta.text())

            .then(resultado=>{

                if(resultado=="OK"){

                    alert("Libro eliminado correctamente.");

                    location.reload();

                }else{

                    alert("No se pudo eliminar.");

                }

            });

        }

    });

});

const modalReporte=document.getElementById("modalReporte");

document
.getElementById("btnReporte")
.addEventListener("click",()=>{

    modalReporte.style.display="block";

});

document
.getElementById("cerrarReporte")
.addEventListener("click",()=>{

    modalReporte.style.display="none";

});

document
.getElementById("generarPDF")
.addEventListener("click",()=>{

    let ordenar=document.getElementById("ordenar").value;

    let tipo=document.getElementById("tipoOrden").value;

    let autor=document.getElementById("autorReporte").value;

    let editorial=document.getElementById("editorialReporte").value;

    let anio=document.getElementById("anioReporte").value;

    window.open(

        "php/reportePDF.php"

        +"?ordenar="+ordenar

        +"&tipo="+tipo

        +"&autor="+encodeURIComponent(autor)

        +"&editorial="+encodeURIComponent(editorial)

        +"&anio="+anio,

        "_blank"

    );

});