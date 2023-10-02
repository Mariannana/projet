const bestStory = document.getElementById("bestStory");
const lastAdd = document.getElementById("lastAdd");
const randomStory = document.getElementById("randomStory");
const sectionStory = document.getElementById("sectionStory");

//Recuperation des histoires

fetch("http://localhost/debutsdelafin2/getStory.php")
  .then((response) => {
    return response.json();
  })
  .then((story) => {
    console.log(story);
   let filteredBestStory = filterBestStories(story, 3);
   if (bestStory) displayStory(filteredBestStory, bestStory);
   let filteredLastStories = filterLastAdd(story, 3);
   if (lastAdd) displayStory(filteredLastStories, lastAdd);
   if (sectionStory) displayStory(filteredBestStory, sectionStory);
   if (randomStory)   displayStory(getRandomStories(story, 3), randomStory);
  })
  .catch((error) => {
    console.error(error);
  });

//////////////


function displayStory(stories, targetElement) {
  stories.forEach((story) => {
 
    const cardDiv = document.createElement("div");
    const titleElement = document.createElement("h4");
    const contentElement = document.createElement("p");
    const authorElement = document.createElement("p");
    const categorieElement = document.createElement("p");
  
    cardDiv.classList.add("one-card");

    titleElement.textContent = story.titre_histoire;
    contentElement.textContent = `${story.contenu_histoire.slice(0, 600)} (...)`;
    authorElement.textContent = `Par: ${story.login}` ;
    categorieElement.textContent = story.nom_categorie_histoire
 
    cardDiv.appendChild(titleElement);
    cardDiv.appendChild(document.createElement("br"));
    cardDiv.appendChild(contentElement);
    cardDiv.appendChild(document.createElement("br"));
    cardDiv.appendChild(authorElement);
    cardDiv.appendChild(categorieElement);
  
    targetElement.appendChild(cardDiv);
  });
}




/****//** */ 

/*** Ajout d'histoire de façon aléatoire ***/

function getRandomStories(stories, number) {
   let randomStories = [];
   for(let i=0; i<number; i++) {
      randomStories.push(stories[randomInt(stories.length-1)])
   }
   return randomStories;  
}

function randomInt(n) {
    return Math.floor(Math.random() * (n + 1));
  }






/*** Filtre date */

function filterLastAdd (stories, number) { 
  return stories.sort((storyA,storyB) => storyB["date_ecriture"].localeCompare(storyA["date_ecriture"]))
                .slice(0,number)
}
// 


// stories -> tableau d'hist  .  number -> nb d'histoire à afficher
// return: qu'est ce que j'attends de la fonction?
// sort : fct de js ( to sort = trier) qui tri . C'est une méthode de l'objet tableau et string 
// elle sert a appeler une fonction. Elle prend les elem du tab 2 a 2 ( storyA storyB). param de fct callback qui va être appelée par sort
// on compare la date de chq story/ compare les deux string , ce n'est pas un vrai format date. formaté dans le bon sens anné mois jour, donc comparer comme des string
// localeCompare : sert a comparer 2 chaine de caract, de manière alpbatique en incluant les nbs
// fct renvoie elem + ou - 
// sort, tri tab en fonction des dates. elle retourne le result a la place de stories.sort , on applique ensuite la méthode
// slice a ce reseult. 





/*** Filtre notes  */  
  
// Pas encore fonctionnelle
function filterBestStories(stories, number) {
  return stories.slice(0,number);
}