<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function register(Request $req)
    {

        DB::table('registreren-medewerker')
            ->insert(['username_medewerker' => $req->username_medewerker, 'password_medewerker' => password_hash($req->password_medewerker, PASSWORD_DEFAULT)]);
        return redirect('/login');
    }

    public function login(Request $req)
    {

        $logins = DB::table('registreren-medewerker')
            ->select(['username_medewerker', 'password_medewerker'])
            ->where(['username_medewerker' => $req->username_medewerker])
            ->get();

        foreach ($logins as $login) {

            if (password_verify($req->password_medewerker, $login->password_medewerker)) {
                return redirect('admin');
            }
        }

        $error = 'Username or password is incorrect.';

        return view('/Admin/login', ['error' => $error]);
    }

    public function admin()
    {
        $bestelling_klant = DB::table('reservering')
            ->join('kamer', 'reservering.kamer', '=', 'kamer.id_kamer')
            ->join('klanten', 'reservering.klant', '=', 'klanten.id_klant')
            ->get();
        return view('/Admin/adminHotel_ter_duin', ['bestelling_klant' => $bestelling_klant]);
    }

    public function ShowBestelling($id_bestelling)
    {
        $bestelling_klant = DB::table('reservering')
            ->where(['id_bestelling' => $id_bestelling])
            ->join('kamer', 'reservering.kamer', '=', 'kamer.id_kamer')
            ->join('klanten', 'reservering.klant', '=', 'klanten.id_klant')
            ->get();
        return view('/Admin/showBestelling', ['bestelling_klant' => $bestelling_klant]);
    }

    public function updateShowBestelling($id_bestelling)
    {
        $show_bestelling_klant = DB::table('reservering')
            ->where(['id_bestelling'=>  $id_bestelling])
            ->join('kamer', 'reservering.kamer', '=', 'kamer.id_kamer')
            ->join('klanten', 'reservering.klant', '=', 'klanten.id_klant')
            ->get();
        $kamer = DB::table('kamer')->get();
        return view('/Admin/updateBestelling', ['show_bestelling_klant' => $show_bestelling_klant], ['kamer' => $kamer]);
    }

    public function updateBestelling(Request $req)
    {
        DB::table('reservering')
            ->where(['id_bestelling' => $req->id_bestelling])
            ->join('kamer', 'reservering.kamer', '=', 'kamer.id_kamer')
            ->join('klanten', 'reservering.klant', '=', 'klanten.id_klant')
            ->update(['klanten.naam' => $req->naam, 'klanten.email' => $req->email, 'klanten.telefoon_nr' => $req->telefoon_nr, 'van' => $req->van, 'tot' => $req->tot,  'kamer' => $req->kamer]);
        return redirect('/admin');
    }

    public function delete($id_bestelling)
    {
        DB::table('reservering')
            ->where(['id_bestelling' => $id_bestelling])
            ->delete();
        return redirect('/admin');
    }

    public function insertKamer(Request $req)
    {
        DB::table('kamer')
            ->insert(['soort_kamer' => $req->soortKamer, 'omschrijving_kamer' => $req->omschrijving_kamer, 'prijs' => $req->prijs]);
        return redirect('/admin/insertKamer');
    }

    public function insertShowKamer()
    {
        $kamers = DB::table('kamer')
            ->get();
        return view('/Admin/insertKamer', ['kamers' => $kamers]);
    }

    public function kamer($id_kamer)
    {
        $kamer = DB::table('kamer')
            ->where(['id_kamer' => $id_kamer])
            ->get();
        return view('/Admin/showKamer', ['kamer' => $kamer]);
    }

    public function updateShowKamer($id_kamer)
    {
        $show_kamer = DB::table('kamer')
            ->where(['id_kamer' => $id_kamer])
            ->get();
        return view('/Admin/updateKamer', ['show_kamer' => $show_kamer]);
    }

    public function updateKamer(Request $req)
    {
        DB::table('kamer')
            ->where(['id_kamer' => $req->id_kamer])
            ->update(['soort_kamer' => $req->soort_kamer, 'omschrijving_kamer' => $req->omschrijving_kamer]);
        return redirect('/admin/insertKamer');
    }


    //leren om dit te doen
    public function delete_kamer($id_kamer)
    {
        $referenced_by = DB::table('reservering')
            ->join('kamer', 'reservering.kamer', '=', 'kamer.id_kamer')
            ->where(['kamer'=> $id_kamer])
            ->get();

        if ($referenced_by->isNotEmpty()) {

            foreach ($referenced_by as $record)

                $error_msg = "Kan kamer $id_kamer $record->soort_kamer niet verwijderen.";
            $error_msg .= 'Bestelling ID ' . $record->id_bestelling . ' bij klant ' . $record->naam_klant;

            return redirect('/admin/insertKamer')->with('error', $error_msg);
        } else {

            DB::table('kamer')
                ->where(['id_kamer' => $id_kamer])
                ->delete();

            $succes_msg = 'Kamer ID ' . $id_kamer . ' is succesvol verwijderd.';

            return redirect('/admin/insertKamer')->with('success', $succes_msg);
        }
    }
}