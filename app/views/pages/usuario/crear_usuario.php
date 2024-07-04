<section class="section">
    <div class="columns is-fluid is-vcentered is-mobile">
        <div class="column">
            <h1 class="title">Usuario</h1>
            <h2 class="subtitle">Crear de usuario</h2>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>usuario/listar_usuario"
               class="button is-rounded is-success">
                <i class="fa-solid fa-left-long pr-1"></i> Regresar atrás
            </a>
        </div>
    </div>
    <div>
        <form action="<?php echo APP_URL ?>app/ajax/usuarioAjax.php"
              class="FormularioAjax"
              method="POST"
              autocomplete="off"
              enctype="multipart/form-data">
            <input type="hidden" name="modulo_usuario" value="registrar">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Nombres
                        </label>
                        <input
                                class="input is-rounded"
                                type="text"
                                placeholder="Nombres"
                                required
                                name="usuario_nombre"
                        />
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Apellidos
                        </label>
                        <input
                                class="input is-rounded"
                                type="text"
                                placeholder="Apellidos"
                                required
                                name="usuario_apellido"
                        />
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Usuario
                        </label>
                        <input
                                class="input is-rounded"
                                type="text"
                                placeholder="Usuario"
                                required
                                name="usuario_usuario"
                        />
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Email
                        </label>
                        <input
                                class="input is-rounded"
                                type="email"
                                placeholder="Email"
                                name="usuario_email"
                        />
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Clave
                        </label>
                        <input
                                class="input is-rounded"
                                type="password"
                                placeholder="Clave"
                                required
                                name="usuario_clave_1"
                        />
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Repetir Clave
                        </label>
                        <input
                                class="input is-rounded"
                                type="password"
                                placeholder="Repetir clave"
                                required
                                name="usuario_clave_2"
                        />
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-fifth">
                    <div class="file has-name is-boxed">
                        <label class="file-label">
                            <input class="input-foto file-input" type="file" name="usuario_foto" accept=".jpg, .png, .jpeg">
                            <span class="file-cta">
                                <span class="file-label">
                                    Seleccione una foto
                                </span>
                            </span>
                            <span class="file-name">
                                JPG, JPEG, PNG. (MAX 5MB)
                            </span>
                        </label>
                    </div>
                </div>
                <div class="column is-narrow">
                    <figure class="image is-96x96">
                        <img class=" img-foto is-rounded" src="" >
                    </figure>
                </div>
            </div>

            <div class="has-text-centered">
                <button
                        type="reset"
                        class="button is-link is-rounded">
                    Limpiar
                </button>
                <button
                        type="submit"
                        class="button is-info is-rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</section>

<script >
    const image = document.querySelector('.img-foto');
    const input = document.querySelector('.input-foto');

    input.addEventListener('change',function (e) {
        image.src = URL.createObjectURL(e.target.files[0]);
    })

    let btn_back = document.querySelector(".btn-back");

    btn_back.addEventListener('click', function(e){
        e.preventDefault();
        window.history.back();
    });
</script>