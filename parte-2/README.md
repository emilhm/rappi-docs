Code Refactoring
===================

Parte 2 de la prueba. A continuación se enlistarán las malas prácticas del código proporcionado y su solución.

-------------
 1. Código comentado. El mismo fue eliminado por no cumplir ningún papel. Excepción: código de ejemplo de uso de librerías (dentro de las mismas).
 2. Identación variada. Se corrigió el código para mantener una identación uniforme.
 3. Líneas de código demasiado largas. Se intentó establecer líneas de código con una longitud máxima de 80 caracteres.
 4. Detección de errores dispersos de la información recibida. Se intentó agrupar la detección de errores en la data recibida, para mayor legibilidad del código. (se evidencia después del almacenamiento de los datos recibidos en variables).
 5. Utilizar repetidas veces `Input::get('driver_id')`. Al principio del código se almacenó esta información en la variable `$driver_id`, para facilitar la lectura.
 6. Las variables `$pushMessage` y `$push` fueron seteadas antes de comprobar si `$servicio->user->uuid` era apto para continuar. Se cambió el orden del código para no ejecutar acciones sin necesidad.
 7. Utilizar prácticas viejas. PHP en sus últimas versiones ha cambiado un tanto su sintaxis, para hacer más legible el código. Un ejemplo de ello es la función array(), sustituída por [].
