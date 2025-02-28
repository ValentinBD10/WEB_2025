let elementById = document.getElementById('monElementId');
let elementsByClass = document.getElementsByClassName('maClasse');
let elementsByTag = document.getElementsByTagName('div');

elementById.textContent = 'Nouveau texte';
elementById.innerHTML = '<strong>Nouveau texte en gras</strong>';

let newElement = document.createElement('p');
newElement.textContent = 'Contenu du nouvel élément';

document.body.appendChild(newElement);
document.body.removeChild(elementById);