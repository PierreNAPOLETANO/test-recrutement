const articleList = []; // In a real app this list would be full of articles.
var kudos = 5;


/**
 * J'ai décidé d'utiliser la méthode reduce car cela me permet 
 * d'optimiser le code et de passer de 7 lignes à 3 lignes 
 * 
 * La méthode reduce me permet d'accumuler de toutes les valeurs
 * contenu dans un tableau
 */
function calculateTotalKudos(articles) {
  return articles.reduce((total, article) => total + article.kudos, 0);
}

document.write(`
  <p>Maximum kudos you can give to an article: ${kudos}</p>
  <p>Total Kudos already given across all articles: ${calculateTotalKudos(articleList)}</p>
`);