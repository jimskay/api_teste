<?php

class Clientes
{

    /**
     * @OA\Get(
     *     path="/php_api-main/clientes/listar",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */

    public function listarTodos()
    {
        $db = DB::connect();
        $rs = $db->prepare("SELECT * FROM clientes ORDER BY nome");
        $rs->execute();
        $obj = $rs->fetchAll(PDO::FETCH_ASSOC);

        if ($obj) {
            
            echo json_encode(["dados" => $obj], JSON_PRETTY_PRINT);
        } else {
            echo json_encode(["dados" => 'Não existem dados para retornar']);
        }
    }


    
     
     /**
     * @OA\Get(
     *     path="/php_api-main/clientes/listar/PARAM",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */

    public function listarUnico($param)
    {
        //var_dump("Parametro: ".$param);

        $db = DB::connect();
        $rs = $db->prepare("SELECT * FROM clientes WHERE id={$param}");
        $rs->execute();
        $obj = $rs->fetchObject();

        if ($obj) {
            echo json_encode(["dados" => $obj]);
        } else {
            echo json_encode(["dados" => 'Não existem dados para retornar']);
        }
    }

    /**
     * @OA\Post(
     *     path="/php_api-main/clientes/adicionar",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function adicionar()
    {
        $sql = "INSERT INTO clientes (";
        $contador = 1;
        foreach (array_keys($_POST) as $indice) {
            if (count($_POST) > $contador) {
                $sql .= "{$indice},";
            } else {
                $sql .= "{$indice}";
            }
            $contador++;
        }
        $sql .= ") VALUES (";
        $contador = 1;
        foreach (array_values($_POST) as $valor) {
            if (count($_POST) > $contador) {
                $sql .= "'{$valor}',";
            } else {
                $sql .= "'{$valor}'";
            }
            $contador++;
        }
        $sql .= ")";

        $db = DB::connect();
        $rs = $db->prepare($sql);
        $exec = $rs->execute();

        if ($exec) {
            echo json_encode(["dados" => 'Dados foram inseridos com sucesso.']);
        } else {
            echo json_encode(["dados" => 'Houve algum erro ao inseris os dados.']);
        }
    }

    public function atualizar($param)
    {

        echo '<PRE>';
        print_r($_REQUEST);
        echo '</PRE>';
        die;

        array_shift($_POST);

        $sql = "UPDATE clientes SET ";

        $contador = 1;
        foreach (array_keys($_POST) as $indice) {
            if (count($_POST) > $contador) {
                $sql .= "{$indice} = '{$_POST[$indice]}', ";
            } else {
                $sql .= "{$indice} = '{$_POST[$indice]}' ";
            }
            $contador++;
        }

        $sql .= "WHERE id={$param}";

        $db = DB::connect();
        $rs = $db->prepare($sql);
        $exec = $rs->execute();

        if ($exec) {
            echo json_encode(["dados" => 'Dados atualizados com sucesso.']);
        } else {
            echo json_encode(["dados" => 'Houve erro ao atualizar dados. SQL ::: '.$sql]);
        }
    }

    public function deletar($param)
    {
        $db = DB::connect();
        $rs = $db->prepare("DELETE FROM clientes WHERE id={$param}");
        $exec = $rs->execute();

        if ($exec) {
            echo json_encode(["dados" => 'Dados foram excluidos com sucesso.']);
        } else {
            echo json_encode(["dados" => 'Houve algum erro ao excluir os dados.']);
        }
    }
}
