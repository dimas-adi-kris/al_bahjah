<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SantriModel extends CI_Model
{
    public function getDataSantri()
    {
        $sql = "SELECT * FROM santri";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataSantriById($id_santri)
    {
        $sql = "SELECT * FROM santri WHERE id_santri='" . $id_santri . "'";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataByIdCalonSantri($id_calon_santri)
    {
        $sql = "SELECT * FROM santri WHERE id_calon_santri='" . $id_calon_santri . "'";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getDataByIdUser($id_user)
    {
        $sql = "SELECT * FROM santri WHERE id_user='" . $id_user . "'";

        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function getCalonSantriById($id_calon_santri)
    {
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getAPIInfoDasarCalonSantriById/' . $id_calon_santri);
        return json_decode($res);
    }

    public function getWaliCalonSantriById($id_calon_santri)
    {
        $res = file_get_contents('http://localhost/al_bahjah/al_bahjah-psb/api/getAPIInfoDasarWaliCalonSantriById/' . $id_calon_santri);
        return json_decode($res);
    }

    public function insertDataSantri($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");
        $sql = "INSERT INTO
        `santri` (
            `id_calon_santri`,
            `tanggal_registrasi`,
            `status_verifikasi_registrasi_ulang`,
            `id_user`
        )
        VALUES
        (
            ?,
            ?,
            'TERVERIFIKASI',
            ?
        )";

        $res = $this->db->query($sql, array($data['id_calon_santri'], $date, $data['id_user']));
        return $res;
    }
}
