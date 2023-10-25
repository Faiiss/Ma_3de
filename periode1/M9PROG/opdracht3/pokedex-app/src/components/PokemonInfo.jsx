import React, { useState } from 'react';
import pokeBgImage from '../img/poke-bg-gif.gif';

function PokemonInfo() {
  const [pokemonId, setPokemonId] = useState('');
  const [pokemonData, setPokemonData] = useState(null);

  const fetchPokemonData = async () => {
    try {
      const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonId}`);
      const data = await response.json();
      setPokemonData(data);
    } catch (error) {
      console.error('Error fetching Pokémon data:', error);
    }
  };

  return (
    <div className="pokemon-info">
      <h2 className="pokemon-title">Pokédex</h2>
      <label className="pokemon-id" htmlFor="pokemonId">Enter Pokémon ID:</label>
      <input
        type="text"
        id="pokemonId"
        value={pokemonId}
        onChange={(e) => setPokemonId(e.target.value)}
      />
      <button onClick={fetchPokemonData}>Search</button>

      <div>
        {pokemonData ? (
          <div>
            <h3 className="pokemon-name">{pokemonData.name}</h3>
            <img
              className="pokemon-img"
              src={pokemonData.sprites.front_default}
              alt={pokemonData.name}
            />
            <div className="PokeInfo">
              <p className="pokemon-type">
                Type: {pokemonData.types[0].type.name}
              </p>
              <p className="pokemon-height">
                Height: {pokemonData.height} cm
              </p>
              <p className="pokemon-weight">
                Weight: {pokemonData.weight} kg
              </p>
            </div>

          </div>
        ) : (
          <div>
            <h3 className="pokemon-name">Who's that pokémon?</h3>
            <img
              className="pokemon-img"
              src={pokeBgImage}
              alt="Placeholder"
            />
          </div>
        )}
      </div>

      <div className="PokemonInfoBG">
        <img
          src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/c5069763-9098-4808-b222-a0089bb5786d/dcrrow9-6eb749e4-5308-4985-ac0b-20e432f8425c.png/v1/fill/w_1600,h_2846,q_80,strp/pokedex_phone_wallpaper_by_drboxhead_dcrrow9-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9Mjg0NiIsInBhdGgiOiJcL2ZcL2M1MDY5NzYzLTkwOTgtNDgwOC1iMjIyLWEwMDg5YmI1Nzg2ZFwvZGNycm93OS02ZWI3NDllNC01MzA4LTQ5ODUtYWMwYi0yMGU0MzJmODQyNWMucG5nIiwid2lkdGgiOiI8PTE2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.np-kqNxcquZ_PQMMY5BIw44HX2ccec7_5auukla8gKc"
          alt=""
        />
      </div>
    </div>
  );
}

export default PokemonInfo;
