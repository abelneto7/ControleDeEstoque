# Controle de Estoque

Bem-vindo ao projeto Controle de Estoque! Este sistema foi desenvolvido para gerenciar o estoque de uma empresa, permitindo o controle de clientes, produtos, fornecedores, pedidos, movimentações de estoque e mais.

## Funcionalidades

- **CRUD de Clientes**: Criação, leitura, atualização e exclusão de clientes.
- **CRUD de Produtos**: Criação, leitura, atualização e exclusão de produtos.
- **CRUD de Fornecedores**: Criação, leitura, atualização e exclusão de fornecedores.
- **CRUD de Pedidos**: Criação, leitura, atualização e exclusão de pedidos.
- **Movimentações de Estoque**: Controle de entrada e saída de produtos.
- **Detalhes de Produtos**: Visualização de detalhes dos produtos.
- **Exportação de Dados**: Exportação de dados para PDF e Excel.
- **Tela de Contato**: Página de contato para dúvidas, reclamações ou elogios antes do login.
- **CRUD de Unidades de Medida**: Criação, leitura, atualização e exclusão de unidades de medida.
- **Interface Intuitiva**: Utilização de CSS, HTML e Bootstrap para o frontend.
- **Integração com Vue.js**: Planejamento para uso de Vue.js no frontend.

## Tecnologias Utilizadas

- **Backend**: Laravel
- **Frontend**: HTML, CSS, Bootstrap (com Vue.js planejado para futuras atualizações)
- **Banco de Dados**: MySQL (ou qualquer outro banco suportado pelo Laravel)
- **Exportação**: PDF e Excel

## Instalação

Siga os passos abaixo para configurar e executar o projeto localmente.

### Pré-requisitos

- PHP >= 7.4
- Composer
- MySQL
- Node.js (para futuras integrações com Vue.js)

### Passos

1. Clone o repositório:
    ```bash
    git clone https://github.com/abelneto7/ControleDeEstoque.git
    cd ControleDeEstoque
    ```

2. Instale as dependências do Composer:
    ```bash
    composer install
    ```

3. Crie o arquivo `.env` a partir do exemplo:
    ```bash
    cp .env.example .env
    ```

4. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```

5. Configure as informações do banco de dados no arquivo `.env`.

6. Execute as migrações e seeders:
    ```bash
    php artisan migrate --seed
    ```

7. Instale as dependências do NPM (caso utilize Vue.js futuramente):
    ```bash
    npm install
    ```

8. Compile os assets (caso utilize Vue.js futuramente):
    ```bash
    npm run dev
    ```

9. Inicie o servidor local:
    ```bash
    php artisan serve
    ```

10. Acesse a aplicação no navegador:
    ```
    http://localhost:8000
    ```

## Contribuição

Contribuições são bem-vindas! Se você tem alguma melhoria, bug fix ou nova funcionalidade, sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Contato

Se você tiver alguma dúvida, sugestão ou feedback, entre em contato através da tela de contato na aplicação ou envie um email para [abel.fullstack@gmail.com](mailto:abel.fullstack@gmail.com).

---

Feito com ❤️ por [Abel](https://github.com/abelneto7)

