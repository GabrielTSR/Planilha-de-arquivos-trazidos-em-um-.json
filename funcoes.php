<?php

function lerArquivo($nomeArquivo) {

//lê o arquivo como string
$arquivo = file_get_contents($nomeArquivo);

//transforma a string em array
$jasonArray = json_decode($arquivo);

//devolve o array
return $jasonArray;

}

function buscarFuncionario($funcionarios, $nome){


    $funcionariosFiltro = [];
    foreach($funcionarios as $funcionario) {

        if($nome === "") {
            $funcionariosFiltro[] = $funcionario;
        } else {

            if (mb_strpos(strtoupper($funcionario->id),  strtoupper($nome)) !== false
            || mb_strpos(strtoupper($funcionario->first_name),  strtoupper($nome)) !== false
            || mb_strpos(strtoupper($funcionario->last_name),  strtoupper($nome)) !== false
            || mb_strpos(strtoupper($funcionario->first_name . " " . $funcionario->last_name),  strtoupper($nome)) !== false
            || mb_strpos(strtoupper($funcionario->email),  strtoupper($nome)) !== false
            || strtoupper($funcionario->gender) ===  strtoupper($nome)
            || mb_strpos(strtoupper($funcionario->ip_address),  strtoupper($nome)) !== false
            || mb_strpos(strtoupper($funcionario->country),  strtoupper($nome)) !== false
            || mb_strpos(strtoupper($funcionario->department),  strtoupper($nome)) !== false){
                $funcionariosFiltro[] = $funcionario;
            }
        }
    }
    return $funcionariosFiltro;
}

function cadastrarFuncionario($nomeArquivo, $funcionarios, $novoFuncionario){

    //Verificar se há objetos idênticos

    $criandoObjetosRepetidos = false;

    foreach($funcionarios as $funcionario) {
        if ($funcionario -> first_name == $novoFuncionario -> first_name
            && $funcionario -> last_name == $novoFuncionario -> last_name
            && $funcionario -> email == $novoFuncionario -> email
            && $funcionario -> gender == $novoFuncionario -> gender
            && $funcionario -> ip_address == $novoFuncionario -> ip_address
            && $funcionario -> country == $novoFuncionario -> country
            && $funcionario -> department == $novoFuncionario -> department) {

            $criandoObjetosRepetidos = true;

        }
    }

    if($criandoObjetosRepetidos == false) {

        $funcionarios[] = $novoFuncionario;
        $funcionariosJason = json_encode($funcionarios);
        file_put_contents($nomeArquivo, $funcionariosJason);
    }
    return $funcionarios;
}

function deletarFuncionario ($nomeArquivo, $idFuncionario){
    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $chave => $funcionario){
        if($funcionario->id == $idFuncionario){
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);



}

function editEmployee($nomeArquivo, $editedEmployee) {
    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $chave => $funcionario){
        if($funcionario->id == $editedEmployee->id){
            $funcionarios[$chave] = $editedEmployee;
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
}