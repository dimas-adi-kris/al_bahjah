<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class APIModel extends CI_Model
{
    public function getAPIInfoDasarCalonSantri()
    {
        $sql = "SELECT cs.*, pe.`tahun_ajaran_masehi` AS nama_periode, pr.`nama` AS nama_program
            FROM calon_santri cs, program pr, periode pe
            WHERE cs.id_program = pr.id_program AND cs.id_periode = pe.id_periode
              ";
        $res = $this->db->query($sql);
        if (count($res->result_array()) == 0) {
            return false;
        } else {
            return $res->result_array();
        }
    }

    public function getAPICalonSantriLulus()
    {
        $sql = "SELECT cs.*, pe.`tahun_ajaran_masehi` AS nama_periode, pr.`nama` AS nama_program, hk.`status_lulus`
            FROM calon_santri cs, program pr, periode pe, hasil_kelulusan hk
            WHERE cs.id_program = pr.id_program AND cs.id_periode = pe.id_periode AND hk.id_calon_santri = cs.id_calon_santri AND hk.status_lulus = 'DITERIMA'
              ";
        $res = $this->db->query($sql);
        if (count($res->result_array()) == 0) {
            return false;
        } else {
            return $res->result_array();
        }
    }

    public function getAPIInfoDasarCalonSantriByID($id_calon_santri)
    {
        $sql = "SELECT cs.*, pe.`tahun_ajaran_masehi`, pe.`tahun_ajaran_hijriyah`, pr.`nama` AS nama_program
            FROM calon_santri cs, program pr, periode pe
            WHERE cs.id_calon_santri = '" . $id_calon_santri . "' AND cs.id_program = pr.id_program AND cs.id_periode = pe.id_periode
              ";
        $res = $this->db->query($sql);
        if (count($res->result_array()) == 0) {
            return false;
        } else {
            return $res->result_array()[0];
        }
    }

    public function getAPIInfoDasarWaliCalonSantriByID($id_calon_santri)
    {
        $sql = "SELECT * FROM wali_calon_santri WHERE id_calon_santri=" . $id_calon_santri . "";
        $res = $this->db->query($sql);
        if (count($res->result_array()) == 0) {
            return false;
        } else {
            return $res->result_array()[0];
        }
    }

    public function getEmailWali($email_wali)
    {
        $sql = "SELECT cs.`id_calon_santri` FROM calon_santri cs, wali_calon_santri wcs WHERE wcs.email='" . $email_wali . "' AND wcs.`id_calon_santri`=cs.`id_calon_santri`";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getHasilKelulusanById($id_calon_santri)
    {
        $sql = "SELECT * FROM hasil_kelulusan WHERE id_calon_santri='" . $id_calon_santri . "'";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getHasilKelulusan()
    {
        $sql = "SELECT * FROM hasil_kelulusan WHERE status_lulus='DITERIMA'";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function cekHasilKelulusan($data)
    {
        $sql = "SELECT cs.*, hk.`status_lulus`
                FROM calon_santri cs, wali_calon_santri wcs, hasil_kelulusan hk
                WHERE cs.nama= ?
                    AND cs.tanggal_lahir= ?
                    AND cs.nik= ?
                    AND wcs.id_calon_santri=cs.id_calon_santri
                    AND wcs.nama= ?
                    AND hk.id_calon_santri=cs.id_calon_santri";

        $res = $this->db->query($sql, array($data['nama'], $data['tanggal_lahir'], $data['nik'], $data['nama_wali']));
        return $res->result_array();
    }
}
