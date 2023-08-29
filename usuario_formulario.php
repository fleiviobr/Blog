<!DOCTYPE html>
<html>
    <head>
        <title>Usuario | Projeto para Web com PHP</title>
        <link rel="stylesheet"
            href="lib/bootstap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include_once 'menu.php'; ?>
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-10">
                    <?php include 'includes/menu.php'; ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        if(isset($_SESSION['login'])){
                            $id = (int) $_SESSION['login'] ['usuario'] ['id'];

                            $criteirio = [
                                ['id', '=', $id]
                            ];

                            $retorno = buscar(
                                'usuario',
                                ['id', 'nome', 'email'],
                                $criteirio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>
                    <h2>Usuário</h2>
                    <form method="post" action="core/usuario/usuario_repositorio.php">
                        <input type="hidden" nome="acao"
                            value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        <input type="hidden" nome="id"
                            value="<?php echo $entidade['id'] ?? '' ?>">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input class="form-control" type="text"
                                require="required" id="nome" name="nome"
                                value="<?php echo $entidade['nome'] ?? ''?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="text"
                            require="required" id="email" nome="email"
                            value="<?php echo $entidade['email'] ?? ''?>">
                        </div>
                        <?php if(!isset($_SESSION['login'])) : ?>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input class="from-control" type="password"
                                require="required" id="senha" name="senha">
                        </div>
                        <?php endif; ?>
                        <div class="text-right">
                            <button class="btn btn-sucess"
                                type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/rodape.php';
                    ?>
                </div>
            </div>
        </div>
        <script src="lib/bootstrap-4.2.1-dist/js/bootstap.min.js"></script>
    </body>
</html>