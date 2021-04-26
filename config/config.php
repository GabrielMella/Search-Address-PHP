<?php
include('connectDB.php');

// Método de verificação
function verifyDB($cepNumber) {
	global $conn;
    global $result;
    
    // Removendo qualquer caractere diferente de números
    $cepNumber = preg_replace("/[^0-9]/", "", $cepNumber);

    // Verificando se já existe o cep no DB
	$find = $conn->prepare("SELECT cep FROM dados_cep WHERE cep=:cepNumber ");
	$find->bindParam(':cepNumber', $cepNumber);
	$find->execute();
	$result = $find->fetchAll();
	return $result;
}

// Método que faz a requisição para API
function getCep($cepNumber) {
    $url = "https://viacep.com.br/ws/$cepNumber/xml/";
    $xml = simplexml_load_file($url);
    return $xml;
}

// Pegando os dados inseridos para usar no front-end
function consultDB($cepNumber){
    global $conn;
    global $resultado;
    
    $query = $conn->prepare("SELECT * FROM dados_cep WHERE cep=:cepNumber");
    $query->bindParam(':cepNumber', $cepNumber);
    $query->execute();
    $resultado = $query->fetchAll();
    return $resultado;
}

// Recuperando parâmetros da request e transformando para inteiro
$cepNumber = intval($_POST['cep']);

// Disparando o método para verificar se existe algum parametro no banco
verifyDB($cepNumber);

// Se Result estiver vazio então não existe o registro no banco, logo irá fazer a requisição para API
if(empty($result)){
    // Disparando o método para fazer a requisiçao para API
    $getendereco = getCep($cepNumber);
    // No retorno, qualquer informação que for diferente de NULL significa que encontrou o cep e este é válido
    if($getendereco->cep){ 
        // Inserindo as dados no banco 
        $query = $conn->prepare("INSERT INTO dados_cep(cep, rua, bairro, cidade, estado) VALUES(:cepNumber, :rua, :bairro, :cidade, :estado)");
        $query->bindValue( ':cepNumber', $cepNumber);
        $query->bindValue( ':rua', $getendereco->logradouro);
        $query->bindValue( ':bairro', $getendereco->bairro);
        $query->bindValue( ':cidade', $getendereco->localidade);
        $query->bindValue( ':estado', $getendereco->uf);
        $query->execute();

        consultDB($cepNumber);

        foreach($resultado as $array){
            $result = $array;
        }
    } else {
        header('Location: errors/error.php');
    }
}else{
    consultDB($cepNumber);
    
    foreach($resultado as $array){
        $result = $array;
    }
}
?>