# Pruueba Técnica [Conexión a BD y CRUD básico]

Desarrollo de una aplicación sencilla que permita registrar alumnos ingresando sus datos a través de un formulario y visualizar esos datos en una tabla HTML.

## Índice

1. [Tecnologías escogidas](#tecnologías-escogidas)
2. [Dependencias del proyecto](#dependencias-del-proyecto)
3. [Extensiones](#extensiones)
4. [Configuración de BD](#configuración-de-BD)
5. [Uso](#uso)

## Tecnologías escogidas
- VSC 
- PHP
- MySQL (Con XAMPP como gestor de bases de datos)


## Dependencias del Proyecto
Este proyecto PHP no utiliza dependencias esenciales para su funcionamiento.

 
## Extensiones
Es necesaria la instalación de la extensión `PHP Server` de VSC para levantar la aplicación en servidor local.

`ID de la extensión: brapifra.phpserver`


## Configuración de BD
En el Panel de Control de XAMPP, se debe encender el módulo de `MySQL` y el de `Apache` para poder hacer conexión con el servidor local.
Al seleccionar la opción `Admin`, se despliega la herramienta phpMyAdmin. Es la encargada de manejar la administración de MySQL utilizando un navegador web.


![image](https://github.com/user-attachments/assets/2d0dab7a-05d3-4a64-86a3-39957eadeef4)

`Base de datos 'Centro' creada con una sola tabla, 'Alumnado'`

---

Una vez se haya creado la BD ('Centro'), es momento de configurar la tabla. Haciendo uso de phpMyAdmin es sencillo, ya tiene integradas las ayudas necesarias para la configuración de los campos y el manejo adecuado de las tablas.

![image](https://github.com/user-attachments/assets/3c461bbc-14aa-4195-9374-33df5e6cbc55)

`Diseñador: Visualización de los campos, tipo y longitud de la tabla 'Alumnado'`

---

Se han incluído los campos señalados en la tarea, que viajan a través del formulario para finalmente añadirse a la BD. Se ha añadido a mayores un identificador único (`COD`) para cada registro a modo de buenas prácticas, para una estructura de datos organizada y eficiente. Este campo puede no incluírse ya que no afecta a la funcionalidad de la tarea encomendada.

![image](https://github.com/user-attachments/assets/b814ac76-4b0d-45fc-9ecb-bf9e39cbc0ea)

`Ejemplo: Registros de prueba generados durante el desarrollo de la aplicación.`

Finalmente, esta sería la visualización final de los datos en la tabla.

## Uso
Para poder ejecutar el proyecto correctamente es necesario seguir una serie de pasos.

1. Levantar localhost

![image](https://github.com/user-attachments/assets/59d70fa0-5dc7-4eef-9a9e-dc2595c0cd7c)

`Despliegue de XAMPP y encendido de los módulos MySQL y Apache`

2. Ejecutar la aplicación

![image](https://github.com/user-attachments/assets/eaa763a3-3dae-47b8-af7b-b9871ad6ce69)

`Ejecutar el archivo .php desde la extensión 'PHP Server: Serve Project'`

