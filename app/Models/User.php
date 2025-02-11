<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password',
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    





    /**
     * MÉTODOS
     */

    public function esMedico()
    {
        return $this->rol === 'Profesional';
    }

    public function esPaciente()
    {
        return $this->rol === 'Paciente';
    }

    //verificar si es administador maestro
    public function esAdminMaestro()
    {
        return $this->rol === 'Administrador Maestro';
    }

    


    /**
     * RELACIONES
     */


    //Definición de relación 1-1 con Médico
    public function medico()
    {
        return $this->hasOne(Medico::class);
    }

    //Relacion N-M con Rol: muchos roles que puede tener el usuario/los usuarios
    public function roles()
    {
        return $this->belongsToMany(Rol::class);
        
    }

    //1:N entre los modelos User y Contenido, donde un usuario puede tener varios contenidos, pero un contenido pertenece solo a un usuario
    public function contenidos(): HasMany
    {
        return $this->hasMany(Contenido::class);
    }

    //N:M User y Permiso, un usuario puede tener varios permisos y un permiso puede ser asignado a varios usuarios
    public function permisos(): BelongsToMany
    {
        return $this->belongsToMany(Permiso::class);
    }


    //usuarios relacionados a un admnistrador
    public function usuarios(): HasMany
    {
        
        return $this->hasMany(User::class, 'user_id'); // Esto supone que el campo que relaciona a los usuarios con el administrador es 'user_id'
    }


}





