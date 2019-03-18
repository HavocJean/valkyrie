<?php
    include_once "header.php";
    include_once "class/ClassPersonagem.php";
    include_once "class/ClassArmas.php";

    $buscaraca = new Armas();
    $buscaraca = $buscaraca->buscarRaca();

    $buscapersonagem = new Personagem();
    $buscapersonagem = $buscapersonagem->filtroPersonagens();
?>
        <div class="centropagina">
            <div class="internopagina">
                <h2>Lista Personagens</h2>
                <form method="POST" action="">
                <table class="tabelabusca">
                    <tr>
                        <th style="padding-left:5px;">Tipo de ataque</th>
                    </tr>
                    <tr>
                        <td><?php $chkAtq = isset($_POST['filtroatq']) ? $_POST['filtroatq'] : ''; ?>
                            <input type="checkbox" name="filtroatq" value="1" <?php if($chkAtq ==1){ echo "checked"; } ?>/> Corpo a corpo
                            <input type="checkbox" name="filtroatq" value="2" <?php if($chkAtq ==2){ echo "checked"; } ?>/> Mágico
                            <input type="checkbox" name="filtroatq" value="3" <?php if($chkAtq ==3){ echo "checked"; } ?>/> À distância
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Despertável</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="despertavel" value="despertavel" /> Despertável
                            <input type="checkbox" name="naodespertavel" value="naodespertavel" /> Não despertável
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Raça</th>
                    </tr>
                    <tr>
                        <td><?php foreach($buscaraca as $raca) { ?>
                            <input type="checkbox" name="racas" value="<?php echo $raca['id_raca'];?>" /><?php echo utf8_encode($raca['nome_raca']); }?>
                            <!--
                            <input type="checkbox" name="aesir" value="aesir" /> Aesir
                            <input type="checkbox" name="anao" value="anao" /> Anão
                            <input type="checkbox" name="elfo" value="elfo" /> Elfo
                            <input type="checkbox" name="fera" value="fera" /> Fera
                            <input type="checkbox" name="humano" value="humano" /> Humano
                            <input type="checkbox" name="teriano" value="teriano" /> Teriano
                            <input type="checkbox" name="jotun" value="jotun" /> Jotun -->
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Rank</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="sss" value="sss" /> SSS
                            <input type="checkbox" name="ss" value="ss" /> SS
                            <input type="checkbox" name="s" value="s" /> S
                            <input type="checkbox" name="a" value="a" /> A
                            <input type="checkbox" name="b" value="b" /> B
                            <input type="checkbox" name="c" value="c" /> C
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Nome do personagem</th>
                    </tr>
                    <tr>
                        <td>
                            <input class="nomepersonagembusca" type="text" name="filtropersonagem" placeholder="Digite o nome do personagem..." />
                        </td>
                    </tr>
                </table>
                    <input type="submit" name="buscarpersonagem" value="Buscar.." class="botaobuscarpersonagem" style="margin-left:5%;"/>
                    <input type="reset" name="reset" value="Resetar.." class="botaobuscarpersonagem" />
                </form>
            </div>

            <div class="res_personagem">
                <table>
                    <tr>
                        <th>Imagem/Nome</th>
                        <th>Tipo de ataque</th> 
                        <th>Raça</th>
                        <th>Rank</th>
                    </tr>
                    <?php foreach ($buscapersonagem as $personagem) { ?>
                    <tr>
                        <td><img src="<?php echo $personagem['img_personagem']; ?>" style="width:60px;padding-top:5px;"><br>
                            <a href="#"><?php echo $personagem['nome_personagem']; ?></a>
                        </td>
                        <td><?php echo utf8_encode($personagem['nome_atq']); ?></td>
                        <td><?php echo utf8_encode($personagem['nome_raca']); ?></td>
                        <td style="text-transform:uppercase;"><?php echo $personagem['nome_ranque']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="direitapagina">
            <div class="menudireita">
            <p>páginas populares</p>
            <hr>
            <ul>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Comemoração de 16 milhões DL</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Lista de personagens (3 estrela para 1 estrela)</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Ranking de Personagens</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Ranking por Risekara</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Caléndario de eventos</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Equipamento recomendado</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Ranking por Valcore</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Evolução equipamento</a></li>
                <li><img src="imgs/icon-arrow.png" width="10px"/><a href="#">Veja mais...</a></li>
            </ul>
            </div>
        </div>


    </div>

    <div style="clear:both;">
    </div>

    <footer>
        <div class="internofooter">
            <div class="footeresquerda">
                <h3>O que é Valkyrie Connect?</h3>
                <p>Um aplicativo da Ateam Inc. "Valkyrie Connect". É um autêntico RPG de batalhas automáticas. É um jogo com um alto grau de conquista que você pode evoluir até 15 jogos cooperativos "Connect Battle" e todos os personagens e todos os equipamentos para estrela 5. Em Artema vai explorar totalmente Valkyrie Connect totalmente o máximo!</p>
            </div>
            <div class="footercentro">
                <ul>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="https://altema.jp/" target="_blank">Site Altema.JP oficial</a></li>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="https://altema.jp/valkyrieconnect/" target="_blank">Site Altema.JP Valkyrie Connect</a></li>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="#">Sobre cobertura e entrevista?</a></li>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="https://altema.jp/contact-cooperation" target="_blank">Sobre a empresa Atema.JP</a></li>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="#">Operação da companhia</a></li>
                </ul>
            </div>
            <div class="footerdireita">
                <ul>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="#">Termos de uso</a></li>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="#">Contate-nos</a></li>
                    <li><img src="imgs/icon-sword.png" width="10px"/><a href="#">Mapa do site</a></li>
                </ul>
            </div>
        </div>
        <div style="width:100%;background-color:#FFF;height:28px;font-size:12px;text-align:center;padding-top:7px;">
            Copyright (C) 2019 Valkyrie Connect. All Rights Reserved. <a href="admin.php" style="display:none;">admin</a>
        </div>  
    </footer>