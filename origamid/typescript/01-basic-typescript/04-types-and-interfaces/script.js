"use strict";
// Type
// A palavra type cria um atalho (alias) para um tipo customizado.
let total4 = 20;
total4 = '30';
function preencherDados(dados) {
    document.body.innerHTML = `
        <div>
        <h2>${dados.nome}</h2>
        <p>${dados.preco}</p>
        <p>Inclui teclado: ${dados.teclado ? 'Sim' : 'Não'}</p>
        </div>    
    `;
}
// preencherDados({
//     nome: 'computador',
//     preco: 2000,
//     teclado: true,
// });
const computador = {
    nome: 'computador',
    preco: 2000,
    teclado: true,
};
preencherDados(computador);
function pintarCategoria(categoria) {
    console.log(categoria);
    if (categoria === 'design') { // If you mistype 'design' with 'designs' TS will inform it
        console.log('Pintar de Vermelho');
    }
}
pintarCategoria('codigo');
// Task
