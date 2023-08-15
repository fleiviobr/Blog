<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysql.php';
    require_once '../core/sql.php';
    require_once '../core/mysql.php';

    insert_teste('Post', 'texto', '1', 'Y-m-d H:i:s');

    function insert_teste($titulo, $texto, $usuario_id, $data) : void
    {
        $dados = ['titulo' => $titulo
                , 'texto' => $texto
                , 'usuario_id' => $usuario_id
                , 'data_postagem' => $data];
        insere('post', $dados);
    }

    //buscar_teste();

    function buscar_teste() : void
    {
        $avaliacoes = buscar('post', ['id', 'titulo', 'texto', 'post_id', 'data_criacao'], [],'');
        print_r($avaliacoes);
    }

    //update_teste(5, 9, 'comentario', '1', '2');

    function update_teste($id, $titulo, $texto, $usuario_id, $data) : void
    {
        $dados = ['nota' => $nota
                , 'comentario' => $comentario
                , 'usuario_id' => $usuario_id
                , 'post_id' => $post_id];
        $criterio = [['id', '=', $id]];
        atualiza('avaliacao', $dados, $criterio);
    }

    //del_teste(1);

    function del_teste($id) : void
    {
        $criterio = [['id', '=', $id]];
        deleta('avaliacao', $criterio);
    }

?>