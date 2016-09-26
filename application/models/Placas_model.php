<meta charset="utf-8">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placas_model extends CI_Model {

    public function get_placa($codigo_placa)
    {
        $this->db->where("codigo_placa", $codigo_placa); // WHERE  'codigo_placa' = $codigo_placa

        $placa = $this->db->get('placas'); //SELECT * FROM placas WHERE  'codigo_placa' = $codigo_placa

        if($placa->num_rows())
        {
          return $placa->row_array();
        }
        else
        {
          return FALSE;
        }

    }

    public function get_placas()
    {
        $query = $this->db->get('placas'); //SELECT * FROM placas

        return $query->num_rows() ? $query->result_array() : FALSE;
    }

    public function create_placa($dados_placa)
    {
    	
        $this->db->insert('placas', $dados_placa);
        return $this->db->affected_rows() ? TRUE : FALSE;

    }

    public function update_placa($codigo_placa, $placa_atualizado)
    {
        $this->db->where("codigo_placa", $codigo_placa); //WHERE id = $id_placa
        $this->db->update("placas", $placa_atualizada); //UPTADE 'placas' SET {{indice}} = {{valor}}

        if($this->db->affected_rows())
        {
            return TRUE;   
        }
        else
        {
            return FALSE;
        }

    }

    public function delete_placa($codigo_placa)
    {
        $this->db->where('codigo_placa', $codigo_placa); // WHERE  'codigo' = $codigo_placa
        $this->db->delete('placas'); //DELETE FROM 'placas'  WHERE  'codigo' = $codigo_placa

        return $this->db->affected_rows() ? TRUE : FALSE;

    }
}
