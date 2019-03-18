<?php
    include_once "class/ClassPersonagem.php";
    $personagem = new Personagem();

    if(!empty($_POST['enviarpersonagem'])) {
        $nome_personagem = $_POST['nome_personagem'];
        $id_tipo_atq = $_POST['id_tipo_atq'];
        $id_raca = $_POST['id_raca'];
        $id_despertavel = $_POST['id_despertavel'];
        $id_elemento = $_POST['id_elemento'];
        $id_ranque = $_POST['id_ranque'];
        $biografia = $_POST['biografia'];
        $hab_acao = $_POST['hab_acao'];
        $hab_passiva = $_POST['hab_passiva'];
        $limit_burst = $_POST['limit_burst'];

        $arquivo = $_FILES['arquivo'];
            if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {
                move_uploaded_file($arquivo['tmp_name'], 'imgs/personagem/'.$arquivo['name']);
            }
        $img_personagem = 'imgs/personagem/'.$arquivo['name'];

        $personagem->cadastrarPersonagem($nome_personagem, $id_tipo_atq, $id_raca, $id_despertavel, $id_elemento, $biografia, $id_ranque, $hab_acao, $limit_burst, $hab_passiva, $img_personagem);
        header("Location: admin.php");
    }

    include_once "class/ClassArmas.php";
    $arma = new Armas();

    if(!empty($_POST['enviararma'])) {
        $nome_arma = $_POST['nome_arma']; 
        $id_tipo_atq = $_POST['id_tipo_atqa'];
        $hp = $_POST['hp'];
        $atq = $_POST['atq'];
        $atqm = $_POST['atqm'];
        $def = $_POST['def'];
        $defm = $_POST['defm'];
        $vel = $_POST['vel'];
        $prec = $_POST['prec'];
        $id_raca = $_POST['id_raca'];
        $nota = $_POST['nota'];
        $desc_habilidade = $_POST['desc_habilidade'];
        $onde_conseguir = $_POST['onde_conseguir'];

        $arquivo = $_FILES['arquivo'];
            if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {
                move_uploaded_file($arquivo['tmp_name'], 'imgs/arma/'.$arquivo['name']);
            }

        $img_arma = 'imgs/arma/'.$arquivo['name'];
        
        $arma->cadastrarArma($nome_arma, $id_tipo_atq, $hp, $atq, $atqm, $def, $defm, $vel, $prec, $id_raca, $nota, $desc_habilidade, $onde_conseguir, $img_arma);
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Valkyrie Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="css/styleadmin.css" />
        <script src=""></script>
    </head>
    <body>
        <div class="admin">
            <p>logado como:</p><h1>Admin</h1>
        </div>
        <nav class="botoes">
            <button type="button" onclick="MostrarPersonagem('adicionarpersonagem')">Cadastrar Personagem</button>
            <button type="button" onclick="MostrarPersonagem('adicionararma')">Cadastrar Arma</button>
            <button type="button" onclick="MostrarPersonagem('')">Cadastrar Elmo</button>
            <button type="button" onclick="MostrarPersonagem('')">Cadastrar Armadura</button>
            <button type="button" onclick="MostrarPersonagem('')">Cadastrar Acessórios</button>
            <button type="button" onclick="MostrarPersonagem('')">Cadastrar outros?</button>
        </nav>


        <!-- ADICIONAR PERSONAGEM HTML -->
        <div id="adicionarpersonagem">
            <form method="POST" action="" enctype="multipart/form-data">
                <label>Nome do personagem:</label><input type="text" name="nome_personagem">

                <label>Tipo de Ataque:</label>
                <select name="id_tipo_atq">
                <option value="" selected disabled hidden>Ataque</option>
                    <option value="1">Corpo a corpo</option>
                    <option value="2">Mágico</option>
                    <option value="3">À distância</option>
                </select>

                <label>Raça:</label>
                <select name="id_raca">
                    <option value="" selected disabled hidden>Raça</option>
                    <option value="1">Aesir</option>
                    <option value="2">Anão</option>
                    <option value="3">Elfo</option>
                    <option value="4">Fera</option>
                    <option value="5">Humano</option>
                    <option value="6">Teriano</option>
                    <option value="7">Jotun</option>
                </select>

                <label>Despertar:</label>
                <select name="id_despertavel">
                    <option value="" selected disabled hidden>Despertar</option>
                    <option value="1">Despertável</option>
                    <option value="2">Não Despertável</option>
                </select><br>

                <label>Elementos:</label>
                <select name="id_elemento">
                    <option value="" selected disabled hidden>Elemento</option>
                    <option value="1">Água</option>
                    <option value="2">Fogo</option>
                    <option value="3">Terra</option>
                    <option value="4">Trevas</option>
                    <option value="5">Luz</option>
                    <option value="6">Especial</option>
                    <option value="7">Nenhum</option>
                </select>

                <label>Rank:</label>
                <select name="id_ranque">
                    <option value="" selected disabled hidden>Rank</option>
                    <option value="1">SSS</option>
                    <option value="2">SS</option>
                    <option value="3">S</option>
                    <option value="4">A</option>
                    <option value="5">B</option>
                    <option value="6">C</option>
                </select>

                <br><br>

                <label>Biografia:</label><br><textarea type="text" name="biografia" rows="3"></textarea><br>

                <label>Habilidade de Ação:</label><br><textarea type="text" name="hab_acao" rows="3"></textarea><br>

                <label>Habilidade Passiva:</label><br><textarea type="text" name="hab_passiva" rows="3"></textarea><br>

                <label>Limit Burst:</label><br><textarea type="text" name="limit_burst" rows="3"></textarea><br>

                <label>Foto personagem:</label><input type="file" name="arquivo"><br><br>

                <input type="submit" name="enviarpersonagem" value="Cadastrar Personagem" class="botaoenviar">
            </form>
        </div>



    <!-- ADICIONAR ARMA HTML -->
        <div id="adicionararma">
            <form method="POST" action="" enctype="multipart/form-data">
                <label>Nome da Arma:</label><input class="nomearma" type="text" name="nome_arma">

                <label>Tipo de Ataque:</label>
                <select name="id_tipo_atqa">
                <option value="" selected disabled hidden>Ataque</option>
                    <option value="1">Corpo a corpo</option>
                    <option value="2">Mágico</option>
                    <option value="3">À distância</option>
                    <option value="4">Sem restrição</option>
                </select>
<!--
                <label>Tipo de Ataque dois:</label>
                <select name="id_tipo_atqdois">
                <option value="" selected disabled hidden>Ataque</option>
                    <option value="1">Corpo a corpo</option>
                    <option value="2">Mágico</option>
                    <option value="3">À distância</option>
                    <option value="4">Sem restrição</option>
                </select> -->

                <label>Hp:</label><input type="number" name="hp">

                <label>Atq:</label><input type="number" name="atq">

                <label>AtqM:</label><input type="number" name="atqm">

                <label>Def:</label><input type="number" name="def">

                <label>DefM:</label><input type="number" name="defm">

                <label>Vel:</label><input type="number" name="vel">

                <label>Pre:</label><input type="number" name="prec">

                <label>Nota:</label><input type="number" name="nota">

                <label>Restrição Raça:</label>
                <select name="id_raca">
                    <option value="" selected disabled hidden>Raça</option>
                    <option value="1">Aesir</option>
                    <option value="2">Anão</option>
                    <option value="3">Elfo</option>
                    <option value="4">Fera</option>
                    <option value="5">Humano</option>
                    <option value="6">Teriano</option>
                    <option value="7">Jotun</option>
                    <option value="8">Nenhuma</option>
                    <option value="9">Especial</option>
                </select>

                <br><br>

                <label>Descrição habilidade:</label><br><textarea type="text" name="desc_habilidade" rows="3"></textarea><br>

                <label>Onde conseguir:</label><br><textarea type="text" name="onde_conseguir" rows="3"></textarea><br>

                <label>Imagem arma:</label><input class="arquivo" type="file" name="arquivo"><br><br>

                <input type="submit" name="enviararma" value="Cadastrar Armamento" class="botaoenviar">
            </form>
        </div>
        

    </body>
    <script>
        function MostrarPersonagem(el) {
            var display = document.getElementById(el).style.display;

                if (display == "block")
                    document.getElementById(el).style.display = 'none';
                else
                    document.getElementById(el).style.display = 'block';
        }
    </script>
</html>