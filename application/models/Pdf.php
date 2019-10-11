<?php 
/**
 * Description of Pdf Model
 *
 * @author Web Preparations Team
 *
 * @email  webpreparations@gmail.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Pdf extends CI_Model {
    // get mobiles list
    public function mobileList() {
        $this->db->select('*');
        $this->db->from('ruangan');
        $query = $this->db->get();
        return $query->result();
    }
}
?>