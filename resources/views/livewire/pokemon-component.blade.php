<div class="flex flex-col items-center">
    <img src="{{$pokemon['sprites']['front_default']}}" class="" alt="" srcset="">
    <p>{{$pokemon['name']}}</p>

    <button wire:click="setBuddy({{ $pokemon['id'] }})">set buddy</button>
</div>
