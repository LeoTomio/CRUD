<?php
require './Modelo/Pessoa.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="css/style.css"/>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src='js/jquery.mask.js' ></script>
    </head>

    <body>

        <?php
        //Envia os codigos pro Pessoa.php atraves do $_POST
        $callClass = new Pessoa();

        if (isset($_POST['cadastrar'])) {
            $nome = $_POST['nome'];
            $idade = $_POST['idade'];
            $cpf = $_POST['cpf'];
            $telefone = $_POST['telefone'];
            $sexo = $_POST['sexo'];
            $endereco = $_POST['endereco'];

            $callClass->inserir($nome, $idade, $cpf, $telefone, $sexo, $endereco);
        }
        ?>
        <h1 id="titulo">Área de Cadastro</h1>
        <form method="post">
            <table width=300 height=100 align=center>
                <tr>
                    <td>Nome</td>
                    <td align="center" id="cad">
                        <input id="nome" class='campo' type="text" name="nome" placeholder="Insira o nome">
                    </td>
                </tr>
                <tr>
                    <td>Idade</td>
                    <td align="center">
                        <input id="idade" class='campo' type="text"  name="idade" placeholder="Insira a idade" >
                    </td>
                </tr>
                <tr>
                    <td>CPF</td>
                    <td align="center">
                        <input id="cpf" class='campo' type="text"  name="cpf"  placeholder="Insira o CCPF">

                    </td>
                </tr>
                <tr>
                    <td>Telefone</td>
                    <td align="center">
                        <input id="telefone" class='campo' type="text"  name="telefone" placeholder="Insira o numero de telefone">
                    </td>
                </tr>
                <tr>
                    <td>Sexo</td>
                    <td align="center">
                        <input id="sexo" class='campo' type="text"  name="sexo" placeholder="Insira seu sexo ( M / F )">
                    </td>
                </tr>
                <tr>
                    <td>Endereco</td>
                    <td align="center">
                        <input id="endereco" class='campo' type="text"  name="endereco" placeholder="Insira seu endereço">
                    </td>
                </tr>
            </table>
            <button type="submit" id="botao" name="cadastrar" >Cadastrar</button>

        </form>

        <br><br>
        <h1 id="titulo">Lista de Cadastrados</h1>
        <table border="5"  width=300 height=100 align=center>
            <thead>
                <tr id="tabela">
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Cpf</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Endereço</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $usuarios = $callClass->ler();
                foreach ($usuarios as $usuario):
                    ?>
                    <tr id="linhas">  
                        <td>
                            <?= $usuario["codigo"] ?>
                        </td>
                        <td>
                            <?= $usuario["nome"] ?>
                        </td>
                        <td>
                            <?= $usuario["idade"] ?>
                        </td>
                        <td>
                            <?= $usuario["cpf"] ?>
                        </td>
                        <td>
                            <?= $usuario["telefone"] ?>
                        </td>
                        <td>
                            <?= $usuario["sexo"] ?>
                        </td>
                        <td>
                            <?= $usuario["endereco"] ?>
                        </td>
                        <td>
                            <a href="excluir.php?codigo=<?= $usuario['codigo'] ?>"><font color=red>Deletar</font></a>
                            <a href="alterar.php?codigo=<?= $usuario['codigo'] ?>"><font color=red>Alterar</font></a>
                        </td>
                    </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>

        <script>
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.telefone').mask('(00) 0000-0000');
        </script>






    </body>
</html>
