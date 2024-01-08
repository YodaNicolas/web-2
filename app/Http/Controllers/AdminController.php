<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Accueil()
    {
        $Events = Evenement::all();
        return view("Accueil", compact('Events'));
    }
    public function Inscription()
    {
        return view("inscription");
    }
    public function Enregistrement(Request $request, User $user)
    {
        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "telephone" => "required",
            "password" => "required",
        ]);

        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->numero = $request->telephone;
        $user->role = 2;
        $user->password = Hash::make(($request->password));
        $user->save();
        return redirect()->route("login")->with("success", "Compte crée avec succèes");
    }
    public function Connexion()
    {
        return view('connexion');
    }
    public function Deconnexion()
    {
        Auth::logout();
        return redirect('/');
    }

    public function Authetification(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            if ($role == 1) {
                return redirect('HomeAdmin/');
            } elseif ($role == 2) {
                return redirect('listeEvenements/' . Auth::user()->id);
            }
            // return redirect()->intended('/conect'); // Rediriger vers la page de tableau de bord
        } else {

            return back()->with('error', 'Email et/ou mot de passeinco incorrect !');
        }
    }

    public function HomeAdmin()
    {
        $Managers = User::where("role", 2)->get();
        return view('Admin.homeAdmin', compact('Managers'));
    }
    public function Publication()
    {
        return view("pulier");
    }
    public function Reserver($id_event)
    {
        return view('reserver', compact('id_event'));
    }
    public function ReserveStore(Request $request, Reservation $Reserve)
    {
        $Event = Evenement::find($request->idEvent);
        $Reserve->event = $request->idEvent;
        $Reserve->email = $request->email;
        $Reserve->place = $request->tickets;
        $Reserve->type = $request->Type;
        $Reserve->date = now();
        $Reserve->save();
        if ($request->tickets > 1) {
            return redirect('/')->with("status", "Reservation de " . $request->tickets . " palces " . $request->Type . " pour " . $Event->nom . " éffectuée avec succès Merci et à bientôt !!");;
        }
        return redirect('/')->with("status", "Reservation de " . $request->tickets . " palce " . $request->Type . " pour " . $Event->nom . " éffectuée avec succès Merci et à bientôt !!");;
    }
    public function EvenListe($id_manag)
    {
        $Events = Evenement::where("user_id", $id_manag)->get();
        if (Auth::user()->role == 1) {
            $manag = User::find($id_manag);
            return view('Manager.eventListe', compact('Events', 'manag'));
        }
        return view('Manager.eventListe', compact('Events'));
    }
    public function getEvent($event_id)
    {
        $Event = Evenement::find($event_id);
        $Reservs = Reservation::where('event', $event_id)->get();
        return view('Manager.evenent', compact('Event', 'Reservs'));
    }
    public function ValidReserve($id_reserv, $NumRes)
    {
        $Rsrvt = Reservation::find($id_reserv);
        $Rsrvt->etat = "Validée";
        $Rsrvt->save();
        // return view('Manager.evenent', compact('Event', 'Reservs'));
        return back()->with("status", "La reservation Numéro " . $NumRes . " ayant l'email: " . $Rsrvt->email . " a été validé avec succès !!");
    }
    public function RejetReserve($id_reserv, $NumRes)
    {
        $Rsrvt = Reservation::find($id_reserv);
        $Rsrvt->etat = "Rejetée";
        $Rsrvt->save();
        // return view('Manager.evenent', compact('Event', 'Reservs'));
        return back()->with("status", "La reservation Numéro " . $NumRes . " ayant l'email: " . $Rsrvt->email . " a été rejetée avec succès !!");
    }
    public function SupprMang(Request $request)
    {
        $Manager = User::find($request->id_manag);
        $nom = $Manager->nom;
        $Manager->delete();
        return back()->with("status", "Le manager " . $nom . " a été supprimé avec succès ainsi qu'avec ses évenements !!");
    }
    public function SupprEvent(Request $request)
    {
        $Event = Evenement::find($request->id_event);
        $nomEv = $Event->nom;
        $Event->delete();
        return back()->with("status", "L'évenement' Numéro " . $nomEv . " a été rejetée avec succès !!");
    }
    public function Publier(Request $request, Evenement $event)
    {
        // $request->validate([
        //     'nom' => 'required',
        //     'lieu' => 'required',
        //     'debut' => 'required',
        //     'fin' => 'required',
        //     'passe1' => 'required',
        //     'passe2' => 'required',
        //     'Description' => 'required',
        // ]);

        $event->user_id = Auth::user()->id;
        $event->nom = $request->nom;

        if ($request->debut != $request->fin) {
            $event->debut = $request->debut;
            $event->fin = $request->fin;
        } else {
            $event->date = $request->debut;
        }

        $event->lieu = $request->lieu;
        $event->passe1 = $request->passe1;
        $event->passe2 = $request->passe2;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('affiches/', $filename);
            $event->affiche = $filename;
        }

        $event->save();
        return redirect('listeEvenements/' . Auth::user()->id);
    }

    public function Propos()
    {
        return view('propos');
    }
    public function Modifier(Request $request)
    {
    }
    public function Supprimer(Request $request)
    {
    }
}
