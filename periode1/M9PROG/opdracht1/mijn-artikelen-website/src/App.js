// App.js
import React from 'react';
import './App.css'; // Maak een CSS-bestand aan voor styling
import Header from './Header';
import Article from './Article';
import data from './data.json'; // Importeer de gegevens

function App() {
  return (
    <div className="app">
      <Header />
      <div className="articles">
        {data.map((article) => (
          <Article
            key={article.id}
            title={article.title}
            description={article.description}
            image={article.image}
          />
        ))}
      </div>
    </div>
  );
}

export default App;
