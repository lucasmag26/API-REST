<?php

    require_once "connection/Connection.php";

    class Cliente{
        
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM clientes";
            $result = $db->query($query);
            $dados = [];

            if($result->num_rows){
                while($row = $result->fetch_assoc()){
                    $dados[] = [
                        'id' => $row['id'],
                        'Nome' => $row['nome'],
                        'Sobrenome' => $row['sobrenome'],
                        'Data Nascimento' => $row['dataNascimento'],
                        'Genero' => $row['genero']
                    ];
                }//end While
            }//end if
            return $dados;
        }//end getAll

        public static function getWhere($id_cliente){
            $db = new Connection();
            $query = "SELECT * FROM clientes WHERE id = $id_cliente";
            $result = $db->query($query);
            $dados = [];

            if($result->num_rows){
                while($row = $result->fetch_assoc()){
                    $dados[] = [
                        'id' => $row['id'],
                        'Nome' => $row['nome'],
                        'Sobrenome' => $row['sobrenome'],
                        'Data Nascimento' => $row['dataNascimento'],
                        'Genero' => $row['genero']
                    ];
                }
            }
            return $dados;
        }//end getWhere

        public static function insert($nome, $sobrenome, $dataNascimento, $genero){
            $db = new Connection();
            $query = "INSERT INTO clientes (nome, sobrenome, dataNAscimento, genero)
            VALUES ('$nome','$sobrenome','$dataNascimento','$genero')";
            $result = $db->query($query);

            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_cliente, $nome, $sobrenome, $dataNascimento, $genero){
            $db = new Connection();
            $query = "UPDATE clientes SET nome ='$nome', sobrenome ='$sobrenome', dataNascimento = '$dataNascimento', genero = '$genero' 
            WHERE id = $id_cliente";
            $result = $db->query($query);

            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;
        }//end Update

        public static function delete($id_cliente){
            $db = new Connection();
            $query = "DELETE FROM clientes WHERE id = $id_cliente";
            $result = $db->query($query);

            if($db->affected_rows){
                return TRUE;
            }//end if
            return FALSE;

        }//end delete


    }//end class Cliente