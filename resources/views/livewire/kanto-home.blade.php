<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>{{$regionName}} Starters</h1>
                    {{ __('You are logged in!') }}
                    
                    @foreach($pokemons as $pokemon)
                        <livewire:pokemon-component :pokeURL="$pokemon['pokemon_species']['url']">
                    @endforeach         
                </div>
            </div>
        </div>
    </div>
</div>
