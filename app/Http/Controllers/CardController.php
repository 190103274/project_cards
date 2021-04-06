<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\CardDeteils;

class CardController extends Controller
{
    public function submit(CardRequest $req){

        if($req->hasFile('card__file')){
            $allowedfileExtension=['pdf', 'jpg', 'png', 'JPG'];
            $file = $req->file('card__file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            
            if($check){
                $filename = $req->card__file->store('card__file');
                $card = new Card();
                $card->title = $req->input('card__title');
                $card->body = $req->input('card__body');
                $card->link = $req->input('card__link');
                $card->save();
                $cardDeteils = new CardDeteils();
                $cardDeteils->card_id = $card->id;
                $cardDeteils->filename = $filename;
                $cardDeteils->save();

            }
        }

        return redirect()->route('page');
        
    }

    public function allData(){
        return view('page', ['data' => Card::all()]);
    }

    public function updateMes($id){
        $card = new Card;
        return view('update-message', ['data' => $card->find($id)]);
    }

    public function updateMesSubmit($id, CardRequest $req){
        $card = Card::find($id);
        $card->title = $req->input('card__title');
        $card->body = $req->input('card__body');
        $card->link = $req->input('card__link');

        $card->save();

        return redirect()->route('page');
    }

    public function deleteMes($id){
        $card = Card::find($id)->delete();
        return redirect()->route('page');
    }

    public function selectSome(CardRequest $req){
        $t = $req->input('search-input');
        $t = '%'.$t.'%';
        $cards = Card::where('body', 'like', $t)->get();
        return view('page', ['data' => $cards]);
    }
}
