// Type
// A palavra type cria um atalho (alias) para um tipo customizado.

type NumberOrString = number | string;

let total4: NumberOrString = 20;
total4 = '30';

// Usually starts with a capital letter
type Produto = {
    nome: string;
    preco: number;
    teclado: boolean;
}

function preencherDados (dados: Produto) {
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

const computador: Produto = {
    nome: 'computador',
    preco: 2000,
    teclado: true,
};

preencherDados(computador);

// Exemplo 02

type Categorias = 'design' | 'codigo' | 'descod';

function pintarCategoria(categoria: Categorias) {
    console.log(categoria);
    if(categoria === 'design') { // If you mistype 'design' with 'designs' TS will inform it
        console.log('Pintar de Vermelho');
    }
}

pintarCategoria('codigo');


// Interface
// Interface é um contrato onde você pode definir a tipagem de um objeto, função ou classe.
// Por agora vamos utilizar Type para tipos primitivos e Interface para objetos. Funciona usar type também, em momentos mais avançados utiliza-se interface.

// Example of something that must be a type
// type NumberOrString = string | number;

// Does not need =
interface InterfaceProduto {
    nome: string;
    preco: number;
    teclado: boolean;
}

type TypeProduto = {
    nome: string;
    preco: number;
    teclado: boolean;
}

// Task