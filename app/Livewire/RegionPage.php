<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;


class RegionPage extends Component
{

    
    public function render(Request $request)
    {
        switch($request->region){
            case "kanto":
                $region = 1;
                break;
            case "johto":
                $region = 6;
                break;
            default:
                break;
        }

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pokeapi.co/api/v2/pokedex/" . strval($region + 1),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $response = json_decode($response, true);

        return view('livewire.region-page', ["pokemons"=>array_slice($response['pokemon_entries'], 0 ,9), 'regionName'=>$response['name']])->title('Starter pokemons');
    }
}
