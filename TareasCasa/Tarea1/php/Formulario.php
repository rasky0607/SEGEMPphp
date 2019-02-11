<?php
include("cuerpoformulario.php");

print_head("Formulario Registro");

echo "
<h4>Datos Usuario</h4>           
 <form method='get' action=''>
    <fieldset>
        <legend>¿QUIEN ERES?</legend>
        <p>
            <label>Nombre
                <input type='text' name='nombre' required>
            </label> 
        </p>
        <p>
            <label>Apellidos
                <input type='text' name='apellidos' required>
            </label> 
        </p>
        <p>
            <label>Correo Electrónico 
                <input type='email' name='email' required>
            </label>
        </p>
    </fieldset>
        
    <fieldset>
        <legend>¿DE DONDE ERES?</legend>
        <p>
            <label>Cuidad
                <input type='text' name='ciudad' required>
            </label> 
        </p>
        <p>
            <label>Codigo Postal
                <input type='text' name='vp' required>
            </label> 
        </p>
        <p>
            <label>Pais
                <select id='pais' name='pais' required>
                    <option value='' selected='selected'>Pais</option>
                    <option value='españa' >España</option>
                    <option value='mexico' >Mexico</option>
                    <option value='eeuu' >Estados Unidos/option>
                </select>
            </label> 
        </p>
    </fieldset>
        
    <fieldset>
        <legend>¿COMO QUIERES INICIAR SESION?</legend>
        <p>
           <label>Nombre Usuario
             <input type='text' name='usuario' required>
           </label> 
        </p>
        <p>
            <label>Contraseña
                <input type='password' name='contrasenia1' required>
            </label> 
        </p>
        <p>
            <label>Repita contraseña 
                <input type='password' name='contrasenia2' required>
            </label>
        </p>
    </fieldset>
            
    <fieldset>
        <legend>CONDICIONES DE REGISTRO</legend>
        <p>

                <label> <input type='radio' name='dia' required value='dia'/> Una vez al dia </label>
                <label> <input type='radio' name='semana' required value='semana'/> Una vez a la semana </label>
                <label> <input type='radio' name='mes' required value='mes'/> Una vez al mes </label>

        </p>
        <p>
            <label> <input type='checkbox' name='servicio' value='servicio'> ¿Estas de acuerdo a la ley de proteccion de datos? </label>
        </p>
    </fieldset>        
            <p>
                <button>Crear cuenta</button>
            </p>          
</form>";

?>

<?php
print_footer();



?>

