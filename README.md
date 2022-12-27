# BaseProjectPHP

Projeto desenvolvido para criar uma base de projeto em php. 

## Instala��o das dependencias do projeto
``` bash
    composer install
```

### FrameWork Doctrine ORM

O framework Doctrine ORM, � utilizado para transformar as entidades criadas dentro da pasta "\Entity".
Todas as entidades criadas virar�o as colunas do banco de dados, juntamente com as suas propriedades
definidas quando o projeto for iniciado. 

Para que uma entidade possa ser mapeada pelo Doctrine e criada no banco, � necess�rio  usar as Annotations (verificar na documenta��o). Pelas annotations � definido o tipo, nome e demais atributos das colunas ou campos no banco.


