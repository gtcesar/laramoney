# 💸 Laramoney - Personal Finance Manager

[![Laravel Version](https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel)](https://laravel.com/)
[![Filament Version](https://img.shields.io/badge/Filament-4.x-5468FF?logo=filament)](https://filamentphp.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## 🎯 Visão Geral do Projeto

**Laramoney** é um projeto de estudo e controle financeiro pessoal desenvolvido com **Laravel** e **FilamentPHP**. Ele foi concebido para ser uma aplicação web limpa e eficiente, permitindo ao usuário gerenciar suas finanças utilizando o princípio da contabilidade de **partida dobrada**. Este repositório demonstra proficiência em design de banco de dados, lógica de negócio no Laravel e customização avançada da interface de administração com Filament.

## 🛠️ Stack de Tecnologia

* **Framework:** Laravel (PHP)
* **Admin Panel:** FilamentPHP (Painel de administração, Forms e Tables)
* **Banco de Dados:** MySQL/PostgreSQL
* **Frontend:** Blade/Livewire

## 🏛️ Modelo de Dados (Database Schema)

O projeto se baseia em uma estrutura robusta de contabilidade para garantir a precisão dos saldos e relatórios.

| Tabela                      | Propósito | Habilidade Demonstada                        |
|:----------------------------| :--- |:---------------------------------------------|
| **`users`**                 | Autenticação | Padrão Laravel.                              |
| **`institutions`**          | Bancos e Instituições. | CRUD Básico.                                 |
| **`accounts`**              | Onde o dinheiro está (Ativos/Passivos, CC, Cartões). | Relações de Chave Estrangeira.               |
| **`categories`**            | Para onde o dinheiro vai (Receitas/Despesas). | Estrutura hierárquica (`parent_id`).         |
| **`payees`**                | Terceiros (Lojas, fornecedores). | Cadastro simples de entidades externas.      |
| **`transactions`**          | Cabeçalho do evento financeiro. | Data e Metadados.                            |
| **`transaction_splits`**    | Detalhes da Partida Dobrada (Debita/Credita). | Lógica Contábil e Relacionamentos Compostos. |
| **`schedules`**                | Agendamentos de pagamentos recorrentes. | Lógica de recorrência/automação.             |

## ⚙️ Recursos Focados em Filament

* **Modelagem Financeira:** Implementação do esquema de Partida Dobrada.
* **Estrutura Hierárquica:** Gerenciamento de categorias aninhadas (Subcategorias).
* **Localização (PT-BR):** Preparado para implementação de tradução.

---

## 🚀 Guia de Configuração (Local)

Siga os passos abaixo para clonar o projeto e preparar o ambiente para desenvolvimento.

### 1. Clonagem do Repositório

```bash
# Clone o projeto Laramoney para sua máquina
git clone [https://github.com/gtcesar/laramoney.git](https://github.com/gtcesar/laramoney.git)

```
### 2. Configuração Inicial

Instale as dependências do Composer e do NPM:

```bash
cd laramoney

composer install
npm install
npm run dev

```
Crie o arquivo de ambiente .env e gere a chave da aplicação:

```bash
cp .env.example .env
php artisan key:generate

```

Edite o arquivo .env com as credenciais do seu banco de dados local.

### 3. Setup do Banco de Dados

Rode as migrações para criar toda a estrutura do banco de dados:

```bash

php artisan migrate

```
Crie um Usuário Administrador (Filament):

```bash

php artisan make:filament-user

```

### 4. Acesso ao Painel

Se o seu servidor estiver rodando:

```bash

php artisan serve

```

Acesse o painel de administração em: http://127.0.0.1:8000/admin e faça login com o usuário que você acabou de criar.

