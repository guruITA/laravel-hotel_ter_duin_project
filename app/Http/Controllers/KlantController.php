<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KlantController extends Controller
{

    public function selectDate(Request $req)
    {
        $van = $req->van;
        $tot = $req->tot;

        if (isset($van) && isset($tot)) {

            if ($van < $tot) {

                return redirect('/klant/kamer_overzicht?van=' . $van . '&tot=' . $tot);
            } else {

                $error = "Selecteer de juiste datum";
                return view('/klant/selectDate', ['error' => $error]);
                exit();
            }
        }

        return view('/klant/selectDate');
    }

    public function show_kamers(Request $req)
    {

        $van = $req->van;
        $tot = $req->tot;

        echo $van;
        echo $tot;

        $show_kamers = DB::table('kamer')
            ->whereNotIn('id_kamer', function ($query) use ($van, $tot) {
                $query->select('kamer')
                    ->from('reservering')
                    ->whereBetween('van', [$van, $tot])
                    ->orWhereBetween('tot', [$van, $tot]);
            })
            ->get();

        return view('/klant/kamer_overzicht', ['show_kamers' => $show_kamers], ['van' => $van, 'tot' => $tot]);
    }

    public function showInsertForm(Request $req)
    {
        $id_kamer = $req->id_kamer;
        $van = $req->van;
        $tot = $req->tot;

        return view('klant/insertBestelling', ['id_kamer' => $id_kamer, 'van' => $van, 'tot' => $tot]);
    }

    public function insertKlant(Request $req)
    {

        $id_kamer = $req->id_kamer;
        $van = $req->van;
        $tot = $req->tot;

        $email = DB::table('klanten')->where(['email' => $req->email])->exists();

        if (!$email) {
            $klant_id = DB::table('klanten')
                ->insertGetId(['naam' => $req->naam, 'email' => $req->email, 'telefoon_nr' => $req->telefoon_nr]);
        } else {
            $klant_id = DB::table('klanten')->where('email', $req->email)->value('id_klant');
        }

        $res_nr = DB::table('reservering')
            ->insertGetId(['klant' => $klant_id, 'van' => $van, 'tot' => $tot, 'kamer' => $id_kamer]);

        return redirect('/klant/factuur?res_nr=' . $res_nr . '&klant_id=' . $klant_id . '&van=' . $van . '&tot=' . $tot . '&id_kamer=' . $id_kamer);
    }

    public function factuur(Request $req)
    {
        $res_nr = $req->res_nr;
        $klant_id = $req->klant_id;
        $van = $req->van;
        $tot = $req->tot;
        $id_kamer = $req->id_kamer;

        return view('/klant/factuur', ['res_nr' => $res_nr, 'klant_id' => $klant_id, 'van' => $van, 'tot' => $tot, 'id_kamer' => $id_kamer]);
    }
}

// $prijs = DB::table('kamers')
//             ->where('kamernummer', '=', $kamernummer)
//             ->pluck('prijs')
//             ->first();
// $totaal_prijs = $prijs * $difference;

// $totaal_prijs = DB::table('kamers')->where('kamernummer', $kamernummer)->value('prijs') * $difference;
