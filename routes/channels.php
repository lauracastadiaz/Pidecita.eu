<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//se utiliza para transmitir eventos relacionados con los usuarios de la aplicación. La función de devolución de llamada asociada determina si un usuario autenticado puede escuchar el canal. En este caso, la función de devolución de llamada verifica si el id del usuario coincide con el id especificado en el canal.
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


//