<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
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

        return view('/klant/kamer_overzicht', ['show_kamers' => $show_kamers, 'van' => $van, 'tot' => $tot]);
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

        // $van = date('Y-m-d H:i:s', strtotime($req->van));
        // $tot = date('Y-m-d H:i:s', strtotime($req->tot));

        // Check if there are any existing reservations for the same room during the same time period
        $existingReservation = DB::table('reservering')
            ->where('kamer', $id_kamer)
            ->where(function ($query) use ($van, $tot) {
                $query->whereBetween('van', [$van, $tot])
                    ->orWhereBetween('tot', [$van, $tot])
                    ->orWhere(function ($query) use ($van, $tot) {
                        $query->where('van', '<', $van)
                            ->where('tot', '>', $tot);
                    });
            })
            ->exists();

        if ($existingReservation) {
            // Display an error message or redirect to an error page
            return redirect("/klant/factuur")->with('message', 'This room is already reserved for the selected time period');
        }

        $email = DB::table('klanten')->where(['email' => $req->email])->exists();

        if (!$email) {
            $klant_id = DB::table('klanten')
                ->insertGetId(['naam' => $req->naam, 'email' => $req->email, 'telefoon_nr' => $req->telefoon_nr]);
        } else {
            $klant_id = DB::table('klanten')->where('email', $req->email)->value('id_klant');
        }

        $res_nr = DB::table('reservering')
            ->insertGetId(['klant' => $klant_id, 'van' => $van, 'tot' => $tot, 'kamer' => $id_kamer]);

        return redirect('/klant/factuur?res_nr=' . $res_nr . '&klant_id=' . $klant_id . '&van=' . $van . '&tot=' . $tot . '&id_kamer=' . $id_kamer . '&naam=' . $req->naam . "&email=" . $req->email . "&telefoon_nr=" . $req->telefoon_nr);
    }

    public function factuur(Request $req)
    {
        $res_nr = $req->res_nr;
        $klant_id = $req->klant_id;
        $van = $req->van;
        $tot = $req->tot;
        $id_kamer = $req->id_kamer;
        $naam = $req->naam;
        $email = $req->email;
        $telefoon_nr = $req->telefoon_nr;

        $timezone = new DateTimeZone('UTC');

        $firstDate = new DateTime($van, $timezone);
        $secondDate = new DateTime($tot, $timezone);
        $difference = $secondDate->diff($firstDate)->days;

        $prijs = DB::table('kamer')->where('id_kamer', $id_kamer)->value('prijs');

        $totaal_prijs = $prijs * $difference;

        return view('/klant/factuur', ['res_nr' => $res_nr, 'klant_id' => $klant_id, 'van' => $van, 'tot' => $tot, 'id_kamer' => $id_kamer, 'naam' => $naam, 'email' => $email, 'telefoon_nr' => $telefoon_nr, 'totaal_prijs' => $totaal_prijs]);
    }
}
