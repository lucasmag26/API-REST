<?php
    require_once "models/Cliente.php";

    switch ($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['id'])){
                echo json_encode(Cliente::getWhere($_GET['id']));
            }//end if
            else{
                echo json_encode(Cliente::getAll());
            }//end else
            break;
        case 'POST':
            
            $dados = json_decode(file_get_contents('php://input'));
            if($dados != NULL){
                if(Cliente::insert($dados->nome, $dados->sobrenome, $dados->dataNascimento, $dados->genero)){
                   http_response_code(200); 
                }//end if
                else{
                    http_response_code(400);
                }//end else

            }//end if
            else{
                http_response_code(405);
            }//end else
            break;

        case 'PUT':
            
                $dados = json_decode(file_get_contents('php://input'));
                if($dados != NULL){
                    if(Cliente::update($dados->id, $dados->nome, $dados->sobrenome, $dados->dataNascimento, $dados->genero)){
                       http_response_code(200); 
                    }//end if
                    else{
                        http_response_code(400);
                    }//end else
    
                }//end if
                else{
                    http_response_code(405);
                }//end else
                break;
        case 'DELETE':
            
            if(isset($_GET['id'])){
                if(Cliente::delete($_GET['id'])){
                    http_response_code(200);
                }//end if
                else {
                    http_response_code(400);
                }//end else
            }//end if
            else{
                http_response_code(405);
            }//end else
            break;

    default:
            http_response_code(405);
    break;
    }