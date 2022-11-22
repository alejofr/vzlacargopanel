<?php

namespace App\Observers;

use App\Models\UsuariosInfo;
use App\Mail\NotificationAdminRegisterUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UsuariosInfoObserver
{
    /**
     * Handle the UsuariosInfo "created" event.
     *
     * @param  \App\Models\UsuariosInfo  $usuariosInfo
     * @return void
     */
    public function created(UsuariosInfo $usuariosInfo)
    {
        $user = User::where('usuario_id', '=', $usuariosInfo->usuario_id)->first();

        if( $usuariosInfo->cod_usuario === null || $usuariosInfo->cod_usuario === ''){
            $details = [ 
                'cedula' => $usuariosInfo->cedula,
                'username' => $user->nombre_usuario,
                'client' => $usuariosInfo->nombres.' '.$user->apellidos,
                'url' => env('MIX_APP_URL').'/login'
            ];

            $admin = "venezuelacargo58@gmail.com";
            //$admin = "freitezabraham@gmail.com";

    
            Mail::to($admin)->send(new NotificationAdminRegisterUser($details));
        }
    }

    /**
     * Handle the UsuariosInfo "updated" event.
     *
     * @param  \App\Models\UsuariosInfo  $usuariosInfo
     * @return void
     */
    public function updated(UsuariosInfo $usuariosInfo)
    {
        //
    }

    /**
     * Handle the UsuariosInfo "deleted" event.
     *
     * @param  \App\Models\UsuariosInfo  $usuariosInfo
     * @return void
     */
    public function deleted(UsuariosInfo $usuariosInfo)
    {
        //
    }

    /**
     * Handle the UsuariosInfo "restored" event.
     *
     * @param  \App\Models\UsuariosInfo  $usuariosInfo
     * @return void
     */
    public function restored(UsuariosInfo $usuariosInfo)
    {
        //
    }

    /**
     * Handle the UsuariosInfo "force deleted" event.
     *
     * @param  \App\Models\UsuariosInfo  $usuariosInfo
     * @return void
     */
    public function forceDeleted(UsuariosInfo $usuariosInfo)
    {
        //
    }
}
