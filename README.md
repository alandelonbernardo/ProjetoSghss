# Sistema de Agendamento Médico

Este projeto consiste em uma API REST desenvolvida em Laravel para gerenciamento
de pacientes, médicos e consultas médicas, com autenticação utilizando JWT.

## Funcionalidades
- Cadastro, edição, listagem e exclusão de pacientes
- Cadastro, edição, listagem e exclusão de médicos
- Agendamento de consultas médicas
- Autenticação de usuários via JWT

## Tecnologias Utilizadas
- PHP
- Laravel
- MySQL
- JWT (JSON Web Token)
- Postman (para testes da API)

## Autenticação
As rotas do sistema são protegidas por autenticação JWT.
Para acessar os endpoints é necessário realizar login e utilizar
o token retornado no cabeçalho Authorization.

## Observações
Projeto desenvolvido para fins acadêmicos como requisito da disciplina
de Backend da Universidade Uninter.
