<?php
 
class Conexao {
    private $servername = "localhost";
    private $username = "root";
    private $password = "HORTETEC_115";
    private $database = "fotos";
    private $connection;
 
    public function getConexao() {
        if ($this->connection === null) {
            try {
                // Inclui charset utf8 diretamente na string DSN
                $dsn = "mysql:host={$this->servername};dbname={$this->database};charset=utf8";
                $this->connection = new PDO($dsn, $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                // Exibe a mensagem de erro, deve ser adaptado para ambientes de produção
                echo 'Connection failed: ' . $e->getMessage();
                // Opcionalmente, registre o erro em um log ou sistema de monitoramento
            }
        }
        return $this->connection;
    }
}
?>
 
 