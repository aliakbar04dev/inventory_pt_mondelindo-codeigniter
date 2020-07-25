<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Mater Data Barang";
        $data['barang'] = $this->admin->getBarang();
        // echo json_encode($data['barang']); die;
        $this->template->load('templates/dashboard', 'barang/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('jenis_id', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('satuan_id', 'Satuan Barang', 'required');
    }

    private function _config()
    {
        $config['upload_path']      = "./assets/img/barang";
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = '3000';

        $this->load->library('upload', $config);
    }

    public function add()
    {
        $this->_validasi();
        $this->_config();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Barang";
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('barang', 'id_barang');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_barang'] = 'B' . $number;

            $this->template->load('templates/dashboard', 'barang/add', $data);
        } else {
            $input = $this->input->post(null, true);
            
            if (empty($_FILES['gambar']['name'])) {
                $insert = $this->admin->insert('barang', $input);
                if ($insert) {
                    set_pesan('data berhasil disimpan');
                    redirect('barang');
                } else {
                    set_pesan('gagal menyimpan data');
                    redirect('barang/add');
                }
            } else {
                if (!$this->upload->do_upload('gambar')) {
                    echo $this->upload->display_errors();
                    die;
                } else {
                    $input['gambar'] = $this->upload->data('file_name');
                    $insert = $this->admin->insert('barang', $input);
                    if ($insert) {
                        set_pesan('data berhasil disimpan');
                        redirect('barang');
                    } else {
                        set_pesan('gagal menyimpan data');
                        redirect('barang/add');
                    }
                }
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();
        $this->_config();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang";
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');
            $data['barang'] = $this->admin->get('barang', ['id_barang' => $id]);
            // $gambar =  $data['barang']['gambar'];
            // echo json_encode($gambar); die;
            $this->template->load('templates/dashboard', 'barang/edit', $data);
        } else {
            $input = $this->input->post(null, true);

            if (empty($_FILES['gambar']['name'])) {
                $insert = $this->admin->update('barang', 'id_barang', $id, $input);
                if ($insert) {
                    set_pesan('data berhasil diedit');
                } else {
                    set_pesan('perubahan tidak disimpan.');
                }
                redirect('barang');
            } else {
                if ($this->upload->do_upload('gambar') == false) {
                    echo $this->upload->display_errors();
                    die;
                } else {
                    if ($data['barang']['gambar'] != $data['barang']['gambar']) {
                        $old_image = FCPATH . 'assets/img/barang/' . $data['barang']['gambar'];
                        if (unlink($old_image)) {
                            set_pesan('gagal hapus gambar lama.');
                            redirect('barang');
                        }
                    }

                    $input['gambar'] = $this->upload->data('file_name');
                    $update = $this->admin->update('barang', 'id_barang', $id, $input);

                    if ($update) {
                        set_pesan('data berhasil diedit');
                        redirect('barang');
                    } else {
                        set_pesan('gagal menyimpan data');
                        redirect('barang/edit/' . $id);
                    }
                }
            }








            // $update = $this->admin->update('barang', 'id_barang', $id, $input);

            // if ($update) {
            //     set_pesan('data berhasil diedit');
            //     redirect('barang');
            // } else {
            //     set_pesan('gagal menyimpan data');
            //     redirect('barang/edit/' . $id);
            // }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang', 'id_barang', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barang');
    }

    public function getstok($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->admin->cekStok($id);
        output_json($query);
    }
}
