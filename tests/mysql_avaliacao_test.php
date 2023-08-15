<?php
    require_once '../includes/funcoes.php';
    require_once '../core/conexao_mysql.php';
    require_once '../core/sql.php';
    require_once '../core/mysql.php';

    insert_teste(10, 'comentario', '1', '2');

    function insert_teste($nota, $comentario, $usuario_id, $post_id) : void
    {
        $dados = ['nota' => $nota
                , 'comentario' => $comentario
                , 'usuario_id' => $usuario_id
                , 'post_id' => $post_id];
        insere('avaliacao', $dados);
    }

   buscar_teste();

    function buscar_teste() : void
    {
        $avaliacoes = buscar('avaliacao', ['id', 'nota', 'usuario_id', 'post_id', 'data_criacao'], [],'');
        print_r($avaliacoes);
    }

    update_teste(5, 9, 'comentario', '1', '2');

    function update_teste($id, $nota, $comentario, $usuario_id, $post_id) : void
    {
        $dados = ['nota' => $nota
                , 'comentario' => $comentario
                , 'usuario_id' => $usuario_id
                , 'post_id' => $post_id];
        $criterio = [['id', '=', $id]];
        atualiza('avaliacao', $dados, $criterio);
    }

    buscar_teste();

    del_teste(7);

    function del_teste($id) : void
    {
        $criterio = [['id', '=', $id]];
        deleta('avaliacao', $criterio);
    }

    buscar_teste();
?>