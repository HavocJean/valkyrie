<?php
    include_once "header.php";
    include_once "class/ClassArmas.php";

    $buscararma = new Armas();
    $buscararma = $buscararma->buscarArmas();

    $buscaraca = new Armas();
    $buscaraca = $buscaraca->buscarRaca();
?>

<div class="centropagina">
            <div class="internopagina">
                <h2>Lista Armamentos</h2>
                <form method="POST" action="">
                <table class="tabelabusca" id="lista_armas">
                    <tr>
                        <th style="padding-left:5px;">Tipo do ataque</th>
                    </tr>
                    <tr>
                        <td><?php $chkAtq = isset($_POST['filtroatq']) ? $_POST['filtroatq'] : ''; ?>
                            <input type="checkbox" name="filtroatq" value="1" <?php if($chkAtq ==1){ echo "checked"; } ?>/>Corpo a corpo
                            <input type="checkbox" name="filtroatq" value="2" <?php if($chkAtq ==2){ echo "checked"; } ?>/>Mágico
                            <input type="checkbox" name="filtroatq" value="3" <?php if($chkAtq ==3){ echo "checked"; } ?>/>À distância
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Status</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="hp" value="hp" <?php if(isset($_POST['hp'])){ echo "checked"; } ?>/>Hp
                            <input type="checkbox" name="atq" value="atq" <?php if(isset($_POST['atq'])){ echo "checked"; } ?> />Atq
                            <input type="checkbox" name="atqm" value="atqm" <?php if(isset($_POST['atqm'])){ echo "checked"; } ?> />Atqm
                            <input type="checkbox" name="def" value="def" <?php if(isset($_POST['def'])){ echo "checked"; } ?> />Def
                            <input type="checkbox" name="defm" value="defm" <?php if(isset($_POST['defm'])){ echo "checked"; } ?> />Defm
                            <input type="checkbox" name="vel" value="vel" <?php if(isset($_POST['vel'])){ echo "checked"; } ?> />Vel
                            <input type="checkbox" name="prec" value="prec" <?php if(isset($_POST['prec'])){ echo "checked"; } ?> />Prec
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Restrição de Raça</th>
                    </tr>
                        
                    <tr>
                        <td>
                            <?php foreach($buscaraca as $raca) { ?>
                            <input type="checkbox" name="racas" value="<?php echo $raca['id_raca'];?>" /><?php echo utf8_encode($raca['nome_raca']); }?>
                            <!--
                            <input type="checkbox" name="aesir" value="aesir" /> Aesir
                            <input type="checkbox" name="anao" value="anao" /> Anão
                            <input type="checkbox" name="elfo" value="elfo" /> Elfo
                            <input type="checkbox" name="fera" value="fera" /> Fera
                            <input type="checkbox" name="humano" value="humano" /> Humano
                            <input type="checkbox" name="teriano" value="teriano" /> Teriano
                            <input type="checkbox" name="jotun" value="jotun" /> Jotun<br>
                            <input type="checkbox" name="especial" value="especial" />Especial -->
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left:5px;">Nome do equipamento</th>
                    </tr>
                    <tr>
                        <td>
                            <input class="nomepersonagembusca" type="text" name="filtroarmamento" placeholder="Digite o nome do equipamento..." />
                        </td>
                    </tr>
                </table>
                    <input type="submit" name="buscararma" value="Buscar.." class="botaobuscarpersonagem" style="margin-left:5%;"/>
                    <input type="reset" name="reset" value="Resetar.." class="botaobuscarpersonagem" />
                </form>
            </div>

            <div class="res_personagem">
                <table>
                    <tr>
                        <th>Imagem/Nome</th>
                        <th>Tipo Atq</th> 
                        <th>Rest. de Raça</th>
                        <th>Nota</th>
                    </tr>
                    <?php foreach ($buscararma as $arma) { ?>
                    <tr>
                        <td><img src="<?php echo $arma['img_arma']; ?>" style="width:60px;padding-top:5px;"><br>
                            <a href="#"><?php echo $arma['nome_arma']; ?></a>
                        </td>
                        <td><?php echo utf8_encode($arma['nome_atq']); ?></td>
                        <td><?php echo utf8_encode($arma['nome_raca']); ?></td>
                        <td><?php echo $arma['nota']; ?>/100</td>
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