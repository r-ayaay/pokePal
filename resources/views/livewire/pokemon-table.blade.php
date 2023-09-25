<div>
    @foreach(array_slice($pokemons, 0, 9) as $pokemon)
        <livewire:pokemon-component :pokeURL="$pokemon['pokemon_species']['url']">
    @endforeach
</div>
