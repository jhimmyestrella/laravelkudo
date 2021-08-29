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
        return KudoBirthday::orderBy('id', 'DESC')->get();
    }

    public function mostrarUserkudo(){

         /*SELECT * FROM personas WHERE DAY(`fecha_nacimiento`)=DAY(NOW()) AND MONTH(`fecha_nacimiento`)=MONTH(NOW());*/

        $dia = Carbon::now()->format('d');
        $mes = Carbon::now()->format('m');
        $users = User::all();

        foreach ($users as  $user) {
            $fecha_d =Carbon::createFromFormat('Y-m-d', $user['fecha_nacimiento'])->format('d');
            $fecha_m =Carbon::createFromFormat('Y-m-d', $user['fecha_nacimiento'])->format('m');

            if ($fecha_d == $dia && $fecha_m  == $mes) {

                $usersm[]= [
                            'id' => $user['id'],
                            'name'=> $user['name'],
                            ];
            }
        }
        return $usersm;
        
    }

    public function store(Request $request)
    {
        /*dd(auth()->user()->name); */

        $KudoBirthday = new KudoBirthday();
        $KudoBirthday->name_user_create = auth()->user()->name;
        $KudoBirthday->name_user_receptor = $request->persona['name'];
        $KudoBirthday->comment = $request->comentario;
        $KudoBirthday->save();

        return $KudoBirthday;
    }


    public function update(Request $request, $id)
    {

        $KudoBirthday = KudoBirthday::find($id);
        $KudoBirthday->comment = $request->comentario;
        $KudoBirthday->save();

        return $KudoBirthday;
    }

    public function destroy($id)
    {
        $KudoBirthday = KudoBirthday::find($id);
        $KudoBirthday->delete();
    }
}
