# Trabalho

**7)**
Desenvolva uma gramática sobre  ∑ = {0, 1} que gere as palavras da linguagem L = { w | ॥w॥ < 5}

G = ({ A }, { 0 , 1 }, P, { S })

P → {
    S → AAAAA | ε,
    A → 0 | 1 | ε
}

**10)**
Crie a gramática G sobre ∑ = {0, 1} que gere a linguagem L(G) = { w | w tem tamanho ímpar e o símbolo do meio é 0 }

G = ({A, B}, {0, 1}, P, {S})

P → {
    S → A0A,
    A → 0 | 1
}

