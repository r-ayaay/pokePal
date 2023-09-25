<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PokemonComponent extends Component
{
    public $pokeURL;

    public function setBuddy($pokeID){
        $affected = DB::table('users')
        ->where('id', auth()->user()->id)
        ->update(['buddyID' => $pokeID]);

        return redirect('home');
    }

    public function render()
    {    
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->pokeURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
            )
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response, true);

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pokeapi.co/api/v2/pokemon/" . $response['name'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
            )
        );

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        $response = json_decode($response, true);

        return view('livewire.pokemon-component', ["pokemon"=>$response]);
    }
}
