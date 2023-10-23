<?php


class Pessoa {

    private static $conn;

    public static function getConnection() {
        if (empty(self::$conn)) {
            $conexao = parse_ini_file( 'config/config.ini');

            $host = $conexao['host'];
            $name = $conexao['name'];
            $user = $conexao['user'];
            $pass = $conexao['pass'];

            self::$conn = new PDO("mysql:host={$host};dbname={$name}", $user, $pass);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }



    public static function save($pessoa) {
        $conn = self::getConnection();
        
        if(empty($pessoa['id'])) {
            
            $result = $conn->query("SELECT max(id) as next FROM pessoa"); 
            $row = $result->fetch();
            $pessoa['id'] = (int) $row['next'] +1;
            $sql = "INSERT INTO pessoa(id, nome, endereco, bairro, tel, email)
                VALUES ( :id, :nome, :endereco, :bairro, :tel, :email)";
            
        }
        else {
            $sql = "UPDATE pessoa SET 
                nome = :nome,
                endereco = :endereco,
                bairro = :bairro,
                tel = :tel,
                email = :email
                WHERE id = :id";

        }
        $result = $conn->prepare($sql);
        $result->execute([
            ':id' => $pessoa['id'],
            ':nome' => $pessoa['nome'],
            ':endereco' => $pessoa['endereco'],
            ':bairro' => $pessoa['bairro'],
            ':tel' => $pessoa['tel'],
            ':email' => $pessoa['email'] ]);
        return $pessoa;
    }
    public static function find($id) {

        $conn = self::getConnection();
        
        $result = $conn->query("SELECT * FROM pessoa WHERE id=:id");
        return $result->fetch();
    }
    public static function delete($id) {
        
        $conn = self::getConnection();

        $result = $conn->query("DELETE FROM pessoa WHERE id=:id");
        return $result;
    }
    public static function all() {

        $conn = self::getConnection();

        $result = $conn->query("SELECT * FROM pessoa ORDER BY id");
        return $result->fetchAll();
    }

}

?>