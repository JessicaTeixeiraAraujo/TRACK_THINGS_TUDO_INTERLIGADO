<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "usuario";
$password = "senha";
$database = "banco_de_dados";

//banco de dados
$conn = mysqli_connect($host, $user, $password, $database);

// Verifica se houve algum erro na conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Dados do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Se o usuário e a senha são válidos
$query = "SELECT * FROM USUARIO WHERE cNmUsuario = '$username' AND cSenha = '$password'";
$result = mysqli_query($conn, $query);

// Verifica a existência do usuário
if (mysqli_num_rows($result) == 1) {
	// Dados do usuário
	$row = mysqli_fetch_assoc($result);
	// Usuário está ativo
	if ($row['cAtivo'] == 0) {
		echo "Usuário inativo";
	} else {
		// Validade da senha está vencida
		$today = date("Y-m-d H:i:s");
		if ($row['dValidadeSenha'] < $today) {
			echo "Senha expirada";
		} else {
			// Redireciona o usuário
			header("Location: sistema.php");
			exit();
		}
	}
} else {
	echo "Usuário ou senha inválidos";
}

// Fecha a conexão
mysqli_close($conn);
?>
