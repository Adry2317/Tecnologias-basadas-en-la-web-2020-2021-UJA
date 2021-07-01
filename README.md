# Documentación del proyecto

Nuestro proyecto se trata de una página web de un club deportivo en el cual se realizan actividades, como torneos o cursos de deportes como golf, baloncesto o tenis.

## Enlaces a Gitlab y al Proyecto

### GitLab

[https://gitlab.ujaen.es/EQUIPO1/WBT2021_equipo1](https://gitlab.ujaen.es/EQUIPO1/WBT2021_equipo1)

### URL Proyecto

[https://wbt2021-1-aaf.ew.r.appspot.com/pages/view/principal](https://wbt2021-1-aaf.ew.r.appspot.com/pages/view/principal)

## Accesibilidad del proyecto web

La página web tiene una pagina de inicio, instalaciones, actividades (que es donde se muestran la tabla con las actividades para reservar), contacto y apartado de login y registro. Este último es accesible desde el login con un enlace a registrarse.

Las actividades tienen una tabla con botones de apuntarse a las actividades que llevarán al login si no se han registrado.

El login identifica al usuario como usuario común o administrador, según el rol de cada usuario. No se pueden registrar usuarios administradores, solo usuarios comunes. Los usuarios administradores se deben crear en la base de datos directamente o usar el usuario administrador creado.

### Usuarios comunes

Los usuarios identificados podrán acceder a la pagina de inicio, instalaciones, Actividades y Materiales (donde el usuario puede apuntarse a las actividades o hacer reserva de materiales), Mis gestiones ( donde el usuario puede ver las actividades y materiales reservados y desapuntarse en caso de que quiera u cancelar la reserva de material), contacto y la sección de login donde aparecerá el usuario actual con el que se ha logeado y al pulsar hay un desplegable para cerrar sesión u entrar al perfil del usuario y modificarlo.

### Usuarios administradores

Los usuarios administradores acceden a un conjunto de paginas diferentes con la capacidad de modificar los datos que los usuarios ven con respecto a las actividades, materiales u los propios usuarios registrados.

Podrán acceder a inicio, instalaciones, actividades (donde pueden añadir, modificar y eliminar actividades), gestiones (donde pueden gestionar actividades y pistas, como añadir editar y modificar), usuarios (Lista de usuarios registrados), contacto y paginas de logout e información de usuario como con los demás usuarios.


## Funcionalidades de usuarios comunes

Los usuarios comunes que no estén logeados podrán acceder a todas las paginas de inicio, instalaciones, actividades, contacto, login y registro sin necesidad de logearse o registrarse. Una vez que se accede  podemos acceder a las mismas páginas aunque la de actividades cambiará por la de actividades y materiales y tendremos acceso a la página de Mis gestiones.

### Actividades y materiales
Tenemos dos tablas con los distintos actividades y materiales y datos como fecha, precio o cantidad del material o plazas disponibles. la última fila de la tabla hay un campo para introducir la id (que es la primera columna de la tabla) de la actividad o material a reservar/apuntarse y un botón para confirmar. En el casos de los materiales también hay un capo cantidad.  Se validará que la id sea correcta, que sea positiva o que no este vacía (en ese caso saltará una advertencia al pulsar el botón) o no realizará la acción si la id no existe aunque no mostrará ningún error.

### Mis gestiones 

Aparecerán todos las actividades y materiales reservados por el usuarios, con un campo como en la página anterior para indicar el id del elemento a desapuntarse o cancelar reserva en caso de los materiales. Si se cancelan las plazas se volverán a sumar al igual que al reservarlos se restan mientras haya plazas.

### Perfil

Muestra una tabla con la información del usuario y un botón para modificar, al modificar todos los campos deben estar rellenos para guardar los datos.


## Funcionalidades del usuario administrador

Los usuarios administradores tienen acceso a las paginas de usuarios comunes con excepción de actividades y materiales y mis gestiones se cambian por actividades y gestiones y hay una nueva página usuarios.

### Actividades 

Tienen una lista con las actividades en la base de datos y un botón lateral de información que muestra un modal con la lista de usuarios que se han apuntado a esa actividad, un botón de añadir actividad donde hay un modal para rellenar los campos y verificará cada campo, un botón de editar que lleva a una página de modificar, cuando rellenemos el campo con la id de la actividad. Ademas hay un botón de borrar cuando se ponga la id.

### Gestiones 

Hay dos tablas con los materiales y pistas y se tienen las mismas funcionalidades que en la página anterior.

### Usuarios 

Lista con los usuarios dados de alta. hay un botón y un campo para borrar por dni los usuarios.


## Verificación en login y registro

Se verifican que en el login el correo este en el servidor y las contraseñas hasheadas coinciden.

Para el registro se verifica que el nombre de usuario sea mínimo de 5 y máximo de 25 caracteres. El correo sea válido y tenga formato de correo y no este ya en el servidor registrado por lo que es único. Ademas que el usuario tenga una longitud adecuada. y que la contraseña tenga una longitud de 8 caracteres mínimo.







