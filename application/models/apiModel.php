<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class apiModel extends CI_Model
{
    public function getAPIInfoDasarCalonSantriByID($id_calon_santri)
    {
        $sql = "SELECT * FROM calon_santri WHERE id_calon_santri = " . $id_calon_santri . " ";
        $res = $this->db->query($sql);
        if (count($res->result_array()) == 0) {
            return false;
        } else {
            return $res->result_array()[0];
        }
    }

    public function getAPIDataCalonSantri($id_calon_santri)
    {
        $sql2 = "SELECT *
        FROM `wali_calon_santri` wcs, `calon_santri` cs, hasil_kelulusan hk
        WHERE wcs.id_calon_santri = " . $id_calon_santri . "
         AND hk.id_calon_santri = " . $id_calon_santri . "
         AND cs.`id_calon_santri`=" . $id_calon_santri . "
         ";
        $res = $this->db->query($sql2);
        if (count($res->result_array()) == 0) {
            return false;
        } else {
            return $res->result_array()[0];
        }
    }
}
