<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\KudoBirthday;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class KudoBirthdayController extends Controller
{

    public function index()
    {
         /*SELECT * FROM personas WHERE DAY(`fecha_nacimiento`)=DAY(NOW()) AND MONTH(`fecha_nacimiento`)=MONTH(NOW());*/

        $dia = Carbon::now()->format('d');
        $mes = Carbon::now()->format('m');
        $users = User::all();

        foreach ($users as  $user) {
            $fecha_d =Carbon::createFromFormat('Y-m-d', $user['fecha_nacimiento'])->format('d');
            $fecha_m =Carbon::createFromFormat('Y-m-d', $user['fecha_nacimiento'])->format('m');

            if ($fecha_d == $dia && $fecha_m  == $mes) {

                $horarios[]= [
                            'id' => $user['id'],
                            'name'=> $user['name'],
                            ];
            }
        }

        return $horarios;
    }
    public function mostrarKudoBir(Request $request){

        return KudoBirthday::orderBy('id', 'DESC')->get();
        
    }

    public function store(Request $request)
    {
/*        dd(auth()->user()->name);
*/         dd($request->persona['name']);        
        $KudoBirthday = new KudoBirthday();
        $KudoBirthday->user_id = auth()->id();
        $KudoBirthday->id_user = $request->id_user;
        $KudoBirthday->comment = $request->comment;
        $KudoBirthday->save();

        return $KudoBirthday;
    }

    public function show(KudoBirthday $kudoBirthday)
    {
        //
    }

    public function update(Request $request, KudoBirthday $kudoBirthday)
    {
        //
    }

    public function destroy(KudoBirthday $kudoBirthday)
    {
        //
    }
}
