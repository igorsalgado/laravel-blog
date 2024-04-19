# Projeto Blog

Este é um projeto de um blog onde é possível gerenciar os posts, incluindo a criação, edição e exclusão deles.

## Rotas

### Administração de Posts

-   **GET|HEAD** `/admin/posts` - Lista todos os posts.
-   **POST** `/admin/posts` - Armazena um novo post.
-   **GET|HEAD** `/admin/posts/create` - Exibe o formulário para criação de um novo post.
-   **DELETE** `/admin/posts/{post}` - Exclui um post existente.
-   **GET|HEAD** `/admin/posts/{post}/edit` - Exibe o formulário para edição de um post existente.
