<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /***
     * @return object
     *
     */
    function all():object {
        return response()->json(DB::table("v_eventos")->get());
    }

    /**
     * @return object
     */
    function guests():object {
        return response()->json(DB::table("v_listainvitados")->get());
    }

    /**
     * @return object
     */
    function confirmInvitation(Request $request):object {
        $record = DB::table("lista_invitados")
            ->where([
                'cod_usuario' => $request->cod_usuario,
                'cod_reservaciones' => $request->cod_reservaciones,
                'telefono_invitado' => $request->telefono_invitado,
            ])
            ->limit(1)
            ->update(array('confirmo_invitacion' => "SI"));
        if ($record === 1) return response()->json(true);
        else return response()->json([], 500);
    }

    /**
     * @return object
     */
    function confirm(Request $request):object {
        $record = DB::table("lista_invitados")
            ->where([
                'cod_usuario' => $request->cod_usuario,
                'cod_reservaciones' => $request->cod_reservaciones,
                'telefono_invitado' => $request->telefono_invitado,
            ])
            ->limit(1)
            ->update(array('asistio_evento' => "SI"));
        if ($record === 1) return response()->json(true);
        else return response()->json([], 500);
    }
}
