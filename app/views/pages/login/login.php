
<div class="main-container-login">
    <form class="login box FormularioAjax" action="" method="POST" autocomplete="on">
        <div class="field">
            <label class="label"><i class="fa-solid fa-cable-car"></i> Usuario</label>
            <input
                    class="input is-rounded"
                    type="text"
                    placeholder="Usuario"
                    required
                    name="login_usuario"
                    maxlength="20"
            />
        </div>
        <div class="field">
            <label class="label"><i class="fa-solid fa-cable-car"></i> Contraseña</label>
            <input
                    class="input is-rounded"
                    type="password"
                    placeholder="Contraseña"
                    required
                    name="login_contraseña"
                    maxlength="20"
            />
        </div>
        <div class="p-4 has-text-centered">
            <button
                    class="button is-primary is-rounded"
                    type="submit">
            Iniciar sesión
            </button>

        </div>
    </form>
</div>
