<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$regionName}} starters</div>
                <div class="card-body grid grid-rows-3 grid-flow-col">
                    @foreach($pokemons as $pokemon)
                        <livewire:pokemon-component :pokeURL="$pokemon['pokemon_species']['url']">
                    @endforeach               
                </div>
            </div>
        </div>
    </div>
</div>