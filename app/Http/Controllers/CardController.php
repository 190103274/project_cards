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
                $filename = $req->card__file->store('cards__images');
                $card = new Card();
                $card->title = $req->input('card__title');
                $card->body = $req->input('card__body');
                $card->save();
                $cardDeteils = new CardDeteils();
                $cardDeteils->card_id = $card->id;
                $cardDeteils->filename = $filename;
                $cardDeteils->save();
                $file->move('cards__images', $filename);
                //dd($filename);
            }
        }

        return redirect()->route('sendToMail');
        
    }

    public function allData(){
        return view('page', ['data' => Card::all(), 'data_img' => CardDeteils::all()]);
    }

    public function updateMes($id){
        $card = new Card;
        return view('update-message', ['data' => $card->find($id)]);
    }

    public function updateMesSubmit($id, CardRequest $req){
        /*$card = Card::find($id);
        $card->title = $req->input('card__title');
        $card->body = $req->input('card__body');
        */
        if($req->hasFile('card__file')){
            

            $allowedfileExtension=['pdf', 'jpg', 'png', 'JPG'];
            $file = $req->file('card__file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);
            
            if($check){
                $filename = $req->card__file->store('cards__images');
                $card = Card::find($id);
                $card->title = $req->input('card__title');
                $card->body = $req->input('card__body');
                $card->save();
                
                $cardDeteils = CardDeteils::where('card_id', '=', $id)->first();
                $cardDeteils->filename = $filename;
                $cardDeteils->save();
                $file->move('cards__images', $filename);
                //dd($filename);
            }
        }
        //dd($req);

        return redirect()->route('page');
    }

    public function deleteMes($id){
        $cardDeteils = CardDeteils::where('card_id', '=', $id)->delete();
        $card = Card::find($id)->delete();
        return redirect()->route('page');
    }

    public function selectSome(CardRequest $req){
        //App::setlocale('ru');
        $t = $req->input('search-input');
        $t = '%'.$t.'%';
        $cards = Card::where('body', 'like', $t)->get();
        $cards_img = CardDeteils::all();
        return view('page', ['data' => $cards, 'data_img' => $cards_img]);
    }
}
