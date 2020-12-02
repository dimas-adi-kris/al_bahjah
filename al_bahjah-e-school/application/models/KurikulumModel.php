<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class KurikulumModel extends CI_Model
{
    // SHOW Data
    public function getData()
    {
        $sql = "SELECT * FROM kurikulum";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

    public function insertData($data)
    {

        $sql = "INSERT INTO
        `kurikulum` (
          `tahun`,
          `deskripsi`
        )
      VALUES
        (
          '" . $data['tahun_kurikulum'] . "',
          '" . $data['deskripsi_kurikulum'] . "'
        )";

        $res = $this->db->query($sql);
        return $res;
    }

    public function hapusData($id)
    {
        $sql = "DELETE FROM kurikulum WHERE id_kurikulum=" . $id . "";
        $res = $this->db->query($sql);
        return $res;
    }

    public function getDataById($id)
    {
        $sql = "SELECT
        *
      FROM
        kurikulum
        WHERE id_kurikulum = " . $id . "";
        $res = $this->db->query($sql);
        return $res->result_array()[0];
    }

    public function updateData($data)
    {
        $sql = "UPDATE kurikulum
    SET tahun= '" . $data['tahun_kurikulum'] . "',
    deskripsi= '" . $data['deskripsi_kurikulum'] . "'
    WHERE id_kurikulum=" . $data['id_kurikulum'] . "";
        $status = $this->db->query($sql);
        return $status;
    }
    // public function getDataById($id)
    // {
    //   $sql = "SELECT
    //       r.*,
    //       jr.nama AS nama_jenis_ruangan
    //     FROM
    //       ruangan r
    //       JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
    //       WHERE r.id_ruangan = " . $id . "";
    //   $res = $this->db->query($sql);
    //   return $res->result_array()[0];
    // }
    // 



    // public function getProgram()
    // {
    //   $sql = "SELECT * FROM program";
    //   $res = $this->db->query($sql);
    //   return $res->result_array();
    // }

    // public function tambahProgram($data)
    // {
    //   $sql = "INSERT INTO
    //       `program` (
    //         `id_program`,
    //         `nama`
    //       )
    //     VALUES
    //       (
    //         '" . $data['id_program'] . "',
    //         '" . $data['nama_program'] . "'
    //       )";
    //   $status = $this->db->query($sql);

    //   return $status;
    // }

    // public function hapusProgram($id)
    // {
    //   $sql = "DELETE FROM program WHERE id_program=" . $id . "";
    //   $res = $this->db->query($sql);
    //   return $res;
    // }
    // public function getListRuangan()
    // {
    //   $sql = "SELECT
    //       r.*,
    //       jr.nama AS nama_jenis_ruangan
    //     FROM
    //       ruangan r
    //       JOIN jenis_ruangan jr ON jr.id_jenis_ruangan = r.id_jenis_ruangan
    //     ";
    //   $res = $this->db->query($sql);
    //   return $res->result_array();
    // }



    // public function updateProgram($data)
    // {
    //   $sql = "UPDATE program
    //   SET
    //   nama= '" . $data['nama_program_ubah'] . "'
    //   WHERE id_program=" . $data['id_program_ubah'] . "";
    //   $status = $this->db->query($sql);
    //   return $status;
    // }
}
