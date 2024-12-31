# dev

1. Clonar el repositorio
2. Clonar el .env
3. Una vez creado Laravel con Composer realizar las migraciones con php artisan migrate
4. Ejecutar npm run dev para la copilación del frontend.
5. Ejecutar php artisan serve para levantar el backend.

# Funcionamiento

1. ``Autenticación con Laravel Breeze``

![1](https://imgur.com/GE4H9JF.png)

![2](https://imgur.com/sztPItr.png)

2. ``Sección de Muro``

El componente del Muro se muestrá cuando seguis a personas, y estás realizan posteos, en caso de que no sea así mostrará un mensaje para que empieces a seguir a alguien.

![3](https://imgur.com/id5fsIE.png)

3. ``Crear posts``

Una vez creado los posts, se muestrán en el perfil de uno al crearlos, además de tener un ID dinámico para visualizarlo.

![4](https://imgur.com/HDwInSu.png)

![5](https://imgur.com/Ena2JHA.png)

4. ``Funcionalidad de likes, y comentarios``

Cada post posee comentarios para añadir, además de que uno puede dar/quitar likes que se registran en la base de datos cumpliendo su funcionalidad, no son solamente elementos de diseño.

![6](https://imgur.com/FDicf1Z.png)

5. ``Funcionalidad de seguir / dejar de seguir``

También está la opción de seguir y dejar de seguir, que en caso de que uno no siga más a un usuario distinto, no aparecerá la publicación en el muro.

![7](https://imgur.com/1NR5apE.png)

![8](https://imgur.com/Rv6FuB4.png)

6. ``Edición de perfil con foto de perfil``

Existe la funcionalidad de cambiar la foto de perfil, y de username. En el caso de la foto de perfil estoy utilizando Dropzone para el manejo. Se debe cumplir con un máximo de peso de la imagen.

![9](https://imgur.com/XfMo4Xz.png)

![10](https://imgur.com/9nsjZHw.png)
