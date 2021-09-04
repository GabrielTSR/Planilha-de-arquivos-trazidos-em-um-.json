<?php

require("./funcoes.php");


$funcionarios = lerArquivo("./empresaX.json");

if( isset($_GET["first_name"])
        && isset($_GET["last_name"])
        && isset($_GET["email"])
        && isset($_GET["ip_address"])
        && isset($_GET["country"])
        && isset($_GET["department"])
        && isset($_GET["gender"])) {

            $first_name = $_GET["first_name"];
            $last_name = $_GET["last_name"];
            $email = $_GET["email"];
            $ip_address = $_GET["ip_address"];
            $country = $_GET["country"];
            $department = $_GET["department"];
            $gender = $_GET["gender"];

            $novoFuncionario = new stdClass;
            $novoFuncionario->id = count($funcionarios)+1;
            $novoFuncionario->first_name = $first_name;
            $novoFuncionario->last_name = $last_name;
            $novoFuncionario->email = $email;
            $novoFuncionario->gender = $gender;
            $novoFuncionario->ip_address = $ip_address;
            $novoFuncionario->country = $country;
            $novoFuncionario->department = $department;
            
            $funcionarios = cadastrarFuncionario("./empresaX.json", $funcionarios, $novoFuncionario);
    }

if(isset($_GET["buscarFuncionario"])){
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <title>Tabela de funcionários</title>
</head>
<body>
    <section>
        <h1>TABELA DE FUNCIONÁRIOS</h1>
        
        <form>
            <input type="text" name="buscarFuncionario" value="<?=$_GET["buscarFuncionario"] ?? "" ?>" placeholder="Buscar Funcionario">
            <button>BUSCAR</button>
            <button id="buttonCriarConta" type="button">CADASTRAR</button>
    </form>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Gender</th>
            <th>IP Address</th>
            <th>Country</th>
            <th>Department</th>
        </tr>
        <?php

    foreach($funcionarios as $funcionario) :
        ?>
        <tr>
            <td><?=$funcionario->id?></td>
            <td><?=$funcionario->first_name?></td>
            <td><?=$funcionario->last_name?></td>
            <td><?=$funcionario->email?></td>
            <td><?=$funcionario->gender?></td>
            <td><?=$funcionario->ip_address?></td>
            <td><?=$funcionario->country?></td>
            <td><?=$funcionario->department?></td>
        </tr>
        <?php
    endforeach;
    ?>

    
    </table>

        <div id="cadastroContainer">
            <form>
                <h3>Cadastro de Funcionário</h3>
                <div id="formularioQuestoes">
                    <div class="eachQuestion">
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="first_name" type="text" required>
                    </div>

                    <div class="eachQuestion">
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="last_name" type="text"required>
                    </div>

                    <div class="eachQuestion">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" type="text"required>
                    </div>
                    <div class="eachQuestion">
                        <label for="ipAddress">IP Adress</label>
                        <input id="ipAddress" name="ip_address" type="text"required>
                    </div>

                    <div class="eachQuestion">
                        <label for="country">Country</label>
                        <input id="country" name="country" type="text"required>
                    </div>

                    <div class="eachQuestion">
                        <label for="department">Department</label>
                        <input id="department" name="department" type="text"required>
                    </div>
                    <div class="eachQuestion">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="buttonContainer">
                    <button type="button" id="buttonCancelarCadastro">CANCELAR</button>
                    <button id="buttonCadastrar">CADASTRAR</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>