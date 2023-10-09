// Article.js
import React from 'react';

function Article(props) {
  const { title, description, image } = props;

  return (
    <article className="article">
      <img src={image} alt={title} />
      <h2>{title}</h2>
      <p>{description}</p>
    </article>
  );
}

export default Article;
