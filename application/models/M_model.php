<?php
class M_model extends CI_Model
{
     public function data_layanan()
     {
          return $this->db->select('kafeteria.id, kafeteria.nama, kategori, kecamatan, keterangan, latitude, longitude, lokasi, kategori.nama as kategori')
               ->from('kafeteria')->join('kategori', 'kafeteria.kategori = kategori.id', 'left')
               ->get()->result();
     }
     public function data_kategori()
     {
          return $this->db->select('*')
               ->from('kategori')
               ->get()->result();
     }

     public function get_tampil_layanan($limit, $offset, $search, $count, $tabel, $namacari, $urut)
     {

          $this->db->select('kafeteria.id, kafeteria.nama, kategori, kecamatan, keterangan, latitude, longitude, lokasi, kategori.nama as kategori');
          $this->db->from($tabel)
               ->join('kategori', 'kafeteria.kategori = kategori.id', 'left');
          if ($search) {
               $keyword = $search['keyword'];
               if ($keyword) {
                    $this->db->where($namacari . " LIKE '%$keyword%'");
               }
          }
          if ($count) {
               return $this->db->count_all_results();
          } else {
               $this->db->limit($limit, $offset);
               $query = $this->db->order_by($urut, 'DESC')->get();

               if ($query->num_rows() > 0) {
                    return $query->result();
               }
          }

          return array();
     }
     public function simpan($table, $data)
     {
          return $this->db->insert($table, $data);
     }
     public function tampil($table, $urut_id)
     {
          return $this->db->from($table)
               ->order_by($urut_id, 'DESC')
               ->get('');
     }
     public function hapus($table, $id, $primary)
     {
          return $this->db->delete($table, array($primary => $id));
     }
     public function form_edit($table, $primary, $id)
     {
          return $this->db->get_where($table, array($primary => $id))->row();
     }
     public function editdata($tabel, $primary, $id, $data)
     {
          return $this->db->where($primary, $id)->update($tabel, $data);
     }

     public function get_tampil($limit, $offset, $search, $count, $tabel, $namacari, $urut)
     {

          $this->db->select('*');
          $this->db->from($tabel);
          if ($search) {
               $keyword = $search['keyword'];
               if ($keyword) {

                    $this->db->where($namacari . " LIKE '%$keyword%'");
               }
          }
          if ($count) {
               return $this->db->count_all_results();
          } else {
               $this->db->limit($limit, $offset);
               $query = $this->db->order_by($urut, 'DESC')->get();

               if ($query->num_rows() > 0) {
                    return $query->result();
               }
          }

          return array();
     }
}
