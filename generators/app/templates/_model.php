<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class <%=moduleName%>_model extends CI_Model
{
    
    public function get_all()
    {
        $this->db->select("*");
        $this->db->from("<%=tablename%>");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        }else{
            return false;
        }
    }
    public function save($data)
    {
        $this->db->insert('<%=tablename%>', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function update($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('<%=tablename%>',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('<%=tablename%>');
        return ($this->db->affected_rows() != 1) ? false : true;
    }
}