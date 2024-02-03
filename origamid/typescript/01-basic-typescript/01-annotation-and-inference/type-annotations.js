// Type Annotations
// No momento o JavaScript não possui uma forma de indicarmos qual será o tipo de dado. 
// Não é possível prever o argumento que será passado no parâmetro de funções, para isso são necessárias as anotações de tipos.

const products = [
  {
    name: 'O Senhor dos Anéis',
    type: 'book',
  },
  {
    name: 'A Guerra dos Tronos',
    type: 'book',
  },
  {
    name: 'Dark Souls',
    type: 'game',
  },
];

function filterBooks(data) {
  return data.filter((item) => item.type === 'book');
}

console.log(filterBooks(products)); // Returns an object with the books.