/* Enviar formularios via AJAX */
const formularios_ajax=document.querySelectorAll(".FormularioAjax");

formularios_ajax.forEach(formularios => {

    formularios.addEventListener("submit",function(e){

        e.preventDefault();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Quieres realizar la acción solicitada",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, realizar',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed){
                let data = new FormData(this);
                let method=this.getAttribute("method");
                let action=this.getAttribute("action");

                let encabezados= new Headers();

                let config={
                    method: method,
                    headers: encabezados,
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
                };
                fetch(action,config)
                    .then(response => response.text())
                    .then(text => {
                        try {
                            const json = JSON.parse(text);
                            if (json.alert === 'Json' && json.tipo && json.titulo && json.texto && json.icono) {
                                return json;
                            } else {
                                throw new Error('La respuesta no es de tipo Json');
                            }
                        } catch (error) {
                            return {
                                tipo: "simple",
                                icono: "error",
                                titulo: error,
                                texto: text,
                                confirmButtonText: 'Aceptar'
                            };
                        }
                    })
                    .then(data => {
                        console.log('data::::::::::', data);
                        alertas_ajax(data);
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

    });

});



function alertas_ajax(alerta) {
    if (alerta.tipo === "simple") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar',
            timer: 6000,
            timerProgressBar: true,
        });
    } else if (alerta.tipo === "recargar") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar',
            timer: 6000,
            timerProgressBar: true,
        }).then((result) => {
            if (result) {
                location.reload();
            }
        });
    } else if (alerta.tipo === "limpiar") {
        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar',
            timer: 6000,
            timerProgressBar: true,
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector(".FormularioAjax").reset();
            }
        });
    } else if (alerta.tipo === "redireccionar") {
        window.location.href = alerta.url;
    }else if (alerta.tipo === "redireccionarLogin") {
        window.location.href = alerta.url;
    }
}


/* Boton cerrar sesion con java script*/
let btn_exit=document.querySelector(".btn_exit");

btn_exit.addEventListener("click", function(e){

    e.preventDefault();

    Swal.fire({
        title: '¿Quieres salir del sistema?',
        text: "La sesión actual se cerrará y saldrás del sistema",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, salir',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            let url=this.getAttribute("href");
            window.location.href=url;
        }
    });

});