# Guía de instalación


## Aspectos a tener en cuenta
Para la instalación en local del proyecto se debe de tener un servidor local como por ejemplo puede ser  **XAMP** .
Una vez se tiene instalado el servidor se deberá de crear una base de datos, donde se importaran las tablas y los datos de la carpeta db que encontrarás en proyecto.

## Clonación del repositorio
Primero debemos de crear una carpate en la ruta donde  se quiera almacenar el proyecto, una vez se ha creado dicha carpeta se llevará a cabo la clonación con el comando :
`git clone https://gitlab.ujaen.es/EQUIPO1/WBT2021_equipo1.git`


## Configuracion variable de entorno (.env)
Dentro de la carpeta ClubDeportivo encontrarás un archivo **.env**, al abrirlo encontrareis un `app.baseURL = ' ', `  dentro de las comillas deberá de ir el directorio raiz del proyecto.
>Ejemplo: `http://localhost/ClubDeportivo/`, en algunos casos es necesario cambiar localhost por la ip del dispositivo.

Una vez tenemos configurado el app.baseURL,  el siguiente paso será la conexión a la base de datos.
Dentro del archivo  encontraremos un comentario con `# DATABASE`,  dicha etiqueta indica donde empieza la conexión a la base de datos, justamente abajo.

- **database.default.hostname**, se debe de indicar el numbre del host donde se encuentra la base de datos, en local suele ser localhost o una ip.
- **database.default.database**, se debe de indicar el nombre que se le ha asignado a la base de datos, por ejemplo:  *clubdeportivo*.
-  **database.default.username**, se le asigna el usuario creado para manejar la base de datos.
-  **database.default.password**, se asigna la contraseña del usuario indicado anteriormente.

Una vez configurado el **.env**, guarda el archivo. 

Ahora todo está listo para el correcto funcionamiento del proyecto en tu máquina local.




