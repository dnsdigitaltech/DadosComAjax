<?php
//header('Content-type: text/html; charset=iso-8859-1');

$conecta = mysqli_connect("localhost", "root", "DnS3223!@", "aula_ajaxphp") or die ("Erro ao conectar!");

$palavra = $_POST['palavra'];

$sql = "SELECT * FROM pessoas WHERE nome LIKE '%$palavra%'";
$banco = mysqli_query($conecta,$sql);
$linhas = mysqli_num_rows($banco);
$array = array();

while($linha = mysqli_fetch_assoc($banco)){
    $array[] = $linha;
}
?>

<section class="panel" col="lg-9">
    <header class="panel-heading">
        Dados de busca: <?= $palavra ?>
    </header>
</section>
<?php
    if($linhas>0){
?>
    <table class="table">
        <tbody>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>E-mmail</th>
            </tr>
            <?php
            foreach($array as $value){
            ?>
            <tr>
                <td><?=$value['id'];?></td>
                <td><?=$value['nome'];?></td>
                <td><?=$value['email'];?></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
<?php }else{ ?>
    <h4>Não foram encontrados registro com esta palavra.</h4>
<?php }?>  