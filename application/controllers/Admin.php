<?php

/**
*
*/
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_surat');
        if (!$this->session->userdata('level')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $today = date('Y-m-d');
        $sm_today = "tanggal_diterima='$today'";
        $sk_today = "tanggal_keluar='$today'";
        $data['count_sm'] = $this->model_surat->countdata('suratmasuk')->result();
        $data['count_sk'] = $this->model_surat->countdata('suratkeluar')->result();
        $data['sm_today'] = $this->model_surat->getdatawithadd('suratmasuk', $sm_today)->result();
        $data['sk_today'] = $this->model_surat->getdatawithadd('suratkeluar', $sk_today)->result();
        $data['count_indeks'] = $this->model_surat->countother('indeks')->result();
        $data['count_users'] = $this->model_surat->countother('user')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
// suratmasuk
    public function suratmasuk()
    {
        $data['title'] = 'Surat Masuk';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['suratmasuk'] = $this->model_surat->getdata('suratmasuk')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsm()
    {
        $no_suratmasuk = $this->input->post('no_suratmasuk');
        $judul_suratmasuk = $this->input->post('judul_suratmasuk');
        $asal_surat = $this->input->post('asal_surat');
        $namaberkas_suratmasuk = $_FILES['berkas_suratmasuk']['name'];
        $exp = explode('.', $namaberkas_suratmasuk);
        $typenamaberkas_suratmasuk = end($exp);
        $berkas_suratmasuk = uniqid() . '.' . $typenamaberkas_suratmasuk;
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_diterima = $this->input->post('tanggal_diterima');
        $id_indeks = $this->input->post('id_indeks');
        $keterangan = $this->input->post('keterangan');

        $query = $this->db->get_where('suratmasuk', ['no_suratmasuk' => $no_suratmasuk])->row_array();

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Nomor surat sudah ada!</h5>
                </div>');
            redirect('admin/suratmasuk');
        } elseif ($namaberkas_suratmasuk == null) {
            $array = [
                'id_suratmasuk' => null,
                'no_suratmasuk' => $no_suratmasuk,
                'judul_suratmasuk' => $judul_suratmasuk,
                'asal_surat' => $asal_surat,
                'tanggal_masuk' => $tanggal_masuk,
                'tanggal_diterima' => $tanggal_diterima,
                'id_indeks' => $id_indeks,
                'keterangan' => $keterangan,
                'berkas_suratmasuk' => $berkas_suratmasuk
            ];
            $this->model_surat->adddata('suratmasuk', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Data ditambahkan!</h5>
                </div>');
            redirect('admin/suratmasuk');
        } else {
            $config['upload_path']          = 'vendor/files/suratmasuk/';
            $config['allowed_types']        = 'jpeg|jpg|png|doc|docx|pdf';
            $config['file_name'] = $berkas_suratmasuk;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('berkas_suratmasuk')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-times"></i> Gagal!</h5>
                    ' . $this->upload->display_errors() . '
                    </div>');
                redirect('admin/suratmasuk');
            } else {
                $array = [
                    'id_suratmasuk' => null,
                    'no_suratmasuk' => $no_suratmasuk,
                    'judul_suratmasuk' => $judul_suratmasuk,
                    'asal_surat' => $asal_surat,
                    'tanggal_masuk' => $tanggal_masuk,
                    'tanggal_diterima' => $tanggal_diterima,
                    'id_indeks' => $id_indeks,
                    'keterangan' => $keterangan,
                    'berkas_suratmasuk' => $berkas_suratmasuk
                ];
                $this->upload->do_upload();
                $this->model_surat->adddata('suratmasuk', $array);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Data ditambahkan!</h5>
                    </div>');
                redirect('admin/suratmasuk');
            }
        }
    }

    public function aksiubahsm()
    {
        $id_suratmasuk = $this->input->post('id_suratmasuk');
        $no_suratmasuk = htmlspecialchars($this->input->post('no_suratmasuk'));
        $judul_suratmasuk = htmlspecialchars($this->input->post('judul_suratmasuk'));
        $asal_surat = htmlspecialchars($this->input->post('asal_surat'));
        $namaberkas_suratmasuk = $_FILES['berkas_suratmasuk']['name'];
        $exp = explode('.', $namaberkas_suratmasuk);
        $typeberkas_suratmasuk = end($exp);
        $berkas_suratmasuk = uniqid() . '.' . $typeberkas_suratmasuk;
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $tanggal_diterima = $this->input->post('tanggal_diterima');
        $id_indeks = $this->input->post('id_indeks');
        $keterangan = htmlspecialchars($this->input->post('keterangan'));

        $cek_no = $this->model_surat->getdatawithadd('suratmasuk', 'no_suratmasuk="' . $no_suratmasuk . '" AND id_suratmasuk!=' . $id_suratmasuk)->row_array();
        if (!$cek_no) {
            if ($namaberkas_suratmasuk == null) {
                $array = [
                    'no_suratmasuk' => $no_suratmasuk,
                    'judul_suratmasuk' => $judul_suratmasuk,
                    'asal_surat' => $asal_surat,
                    'tanggal_masuk' => $tanggal_masuk,
                    'tanggal_diterima' => $tanggal_diterima,
                    'id_indeks' => $id_indeks,
                    'keterangan' => $keterangan
                ];
                $this->model_surat->updatedata('suratmasuk', $array, array('id_suratmasuk' => $id_suratmasuk));
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                    Data diubah!
                    </div>');
                redirect('admin/suratmasuk');
            } else {
                $array = [
                    'no_suratmasuk' => $no_suratmasuk,
                    'judul_suratmasuk' => $judul_suratmasuk,
                    'asal_surat' => $asal_surat,
                    'tanggal_masuk' => $tanggal_masuk,
                    'tanggal_diterima' => $tanggal_diterima,
                    'id_indeks' => $id_indeks,
                    'keterangan' => $keterangan,
                    'berkas_suratmasuk' => $berkas_suratmasuk
                ];

                $hapusberkas = $this->model_surat->getdatawithadd('suratmasuk', 'id_suratmasuk=' . $id_suratmasuk)->row_array();
                if (null !== $hapusberkas['berkas_suratmasuk']) {
                    $path = 'vendor/files/suratmasuk/' . $hapusberkas['berkas_suratmasuk'];
                    unlink($path);
                }

                $config['upload_path']          = 'vendor/files/suratmasuk/';
                $config['allowed_types']        = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratmasuk;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('berkas_suratmasuk')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-times"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/suratmasuk');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->updatedata('suratmasuk', $array, array('id_suratmasuk' => $id_suratmasuk));
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                        Data diubah!
                        </div>');
                    redirect('admin/suratmasuk');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Gagal!</h5>
                Nomor surat sudah ada!
                </div>');
            redirect('admin/suratmasuk');
        }
    }

    public function hapussm($id_suratmasuk)
    {
        $cek_berkas = $this->model_surat->getdatawithadd('suratmasuk', 'id_suratmasuk=' . $id_suratmasuk)->row_array();
        if (null !== $cek_berkas['berkas_suratmasuk']) {
            $path = 'vendor/files/suratmasuk/' . $cek_berkas['berkas_suratmasuk'];
            unlink($path);
        }
        $query = $this->db->query('DELETE FROM suratmasuk WHERE id_suratmasuk=' . $id_suratmasuk);
        if ($query) {
            $cek = $this->model_surat->getdatawithadd('suratmasuk', 'id_suratmasuk=' . $id_suratmasuk)->row_array();
            if ($cek['berkas_suratmasuk'] != "") {
                $path = 'vendor/files/suratmasuk/' . $cek['berkas_suratmasuk'];
                unlink($path);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Data dihapus!</h5>
                </div>');
            redirect('admin/suratmasuk');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Gagal dihapus!</h5>
                </div>');
            redirect('admin/suratmasuk');
        }
    }

    public function laporan_suratmasuk()
    {
        $data['title'] = 'Surat Masuk';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
        if (null !== $this->input->get('filter-index')) {
            $id_indeks = $this->input->get('id_index');
            $additional = "suratmasuk.id_indeks=" . $id_indeks;
            $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
        } elseif (null !== $this->input->get('filter-tanggal')) {
            $tanggal_awal = $this->input->get('tanggal_awal');
            $tanggal_akhir = $this->input->get('tanggal_akhir');
            $additional = "suratmasuk.tanggal_masuk BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'";
            $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
        } else {
            $data['suratmasuk'] = $this->model_surat->getdata('suratmasuk')->result();
        }
        $data['indeks'] = $this->model_surat->getother('indeks')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function cetaksuratmasuk()
    {
        $data['title'] = 'Surat Masuk #' . uniqid();
        if (null !== $this->input->get('id_index')) {
            $id_indeks = $this->input->get('id_index');
            $additional = "suratmasuk.id_indeks=" . $id_indeks;
            $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
        } elseif (null !== $this->input->get('tanggal_awal')) {
            $tanggal_awal = $this->input->get('tanggal_awal');
            $tanggal_akhir = $this->input->get('tanggal_akhir');
            $additional = "suratmasuk.tanggal_masuk BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'";
            $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', $additional)->result();
        } else {
            $data['suratmasuk'] = $this->model_surat->getdata('suratmasuk')->result();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/cetaksuratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function disposisi($id_suratmasuk)
    {
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['title'] = "Disposisi";
        $data['suratmasuk'] = $this->model_surat->getdatawithadd('suratmasuk', 'id_suratmasuk=' . $id_suratmasuk)->result();
        $data['disposisi'] = $this->model_surat->getotherwithadd('disposisi', 'inner join suratmasuk on disposisi.id_suratmasuk = suratmasuk.id_suratmasuk where disposisi.id_suratmasuk=' . $id_suratmasuk)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/disposisi', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdisposisi()
    {
        $id_suratmasuk = htmlspecialchars($this->input->post('id_suratmasuk'));
        $pengisi = htmlspecialchars($this->input->post('pengisi'));
        $tujuan = htmlspecialchars($this->input->post('tujuan'));
        $catatan = htmlspecialchars($this->input->post('catatan'));

        $cek_pengisi = $this->model_surat->getotherwithadd('disposisi', 'where pengisi="' . $pengisi . '" AND id_suratmasuk=' . $id_suratmasuk)->row_array();
        if (!$cek_pengisi) {
            $array = array(
                'id_disposisi' => null,
                'pengisi' => $pengisi,
                'tujuan' => $tujuan,
                'instruksi' => "",
                'catatan' => $catatan,
                'id_suratmasuk' => $id_suratmasuk
            );

            $this->model_surat->adddata('disposisi', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Disposisi ditambahkan!</h5>
                </div>');
            redirect('admin/disposisi/' . $id_suratmasuk);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Item terpilih sudah mengisi disposisi!</h5>
                </div>');
            redirect('admin/disposisi/' . $id_suratmasuk);
        }
    }

    public function editdisp()
    {
        $id_disposisi = $this->input->post('id_disposisi');
        $id_suratmasuk = $this->input->post('id_suratmasuk');
        $pengisi = htmlspecialchars($this->input->post('pengisi'));
        $instruksi = htmlspecialchars($this->input->post('instruksi'));
        $tujuan = htmlspecialchars($this->input->post('tujuan'));
        $catatan = htmlspecialchars($this->input->post('catatan'));

        $array = [
            'pengisi' => $pengisi,
            'tujuan' => $tujuan,
            'instruksi' => $instruksi,
            'catatan' => $catatan
        ];

        $editdisp = $this->model_surat->updatedata('disposisi', $array, array('id_disposisi'=>$id_disposisi));
        if ($editdisp) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Disposisi diubah!</h5>
                </div>');
            redirect('admin/disposisi/' . $id_suratmasuk);
        }
    }

    public function hapusdisp($id_disposisi)
    {
        $data['disposisi'] = $this->model_surat->getotherwithadd('disposisi', 'where id_disposisi='.$id_disposisi)->row_array();
        $id_suratmasuk=$disposisi['id_suratmasuk'];
        $hapusdisp = $this->model_surat->deletedata('disposisi', array('id_disposisi'=>$id_disposisi));
        if ($hapusdisp) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Disposisi dihapus!</h5>
                </div>');
            redirect('admin/disposisi/' . $id_suratmasuk);
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Disposisi gagal dihapus!</h5>
                </div>');
            redirect('admin/disposisi/' . $id_suratmasuk);
        }
    }

// suratkeluar
    public function suratkeluar()
    {
        $data['title'] = 'Surat Keluar';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['suratkeluar'] = $this->model_surat->getdata('suratkeluar')->result();
        $data['indeks'] = $this->model_surat->getother('indeks')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/surat/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsk()
    {
        $no_suratkeluar = htmlspecialchars($this->input->post('no_suratkeluar'));
        $judul_suratkeluar = htmlspecialchars($this->input->post('judul_suratkeluar'));
        $id_indeks = htmlspecialchars($this->input->post('id_indeks'));
        $tujuan = htmlspecialchars($this->input->post('tujuan'));
        $tanggal_keluar = htmlspecialchars($this->input->post('tanggal_keluar'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $namaberkas_suratkeluar = $_FILES['berkas_suratkeluar']['name'];
        $exp = explode('.', $namaberkas_suratkeluar);
        $typeberkas_suratkeluar = end($exp);
        $berkas_suratkeluar = uniqid() . '.' . $typeberkas_suratkeluar;

        $cek_no = $this->model_surat->getdatawithadd('suratkeluar', 'no_suratkeluar="' . $no_suratkeluar . '"')->row_array();
        if (!$cek_no) {
            $array = [
                'id_suratkeluar' => null,
                'no_suratkeluar' => $no_suratkeluar,
                'judul_suratkeluar' => $judul_suratkeluar,
                'id_indeks' => $id_indeks,
                'tujuan' => $tujuan,
                'tanggal_keluar' => $tanggal_keluar,
                'keterangan' => $keterangan,
                'berkas_suratkeluar' => $berkas_suratkeluar
            ];
            if ($berkas_suratkeluar != null) {
                $config['upload_path']          = 'vendor/files/suratkeluar/';
                $config['allowed_types']        = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratkeluar;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('berkas_suratkeluar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-times"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/suratkeluar');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->adddata('suratkeluar', $array);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Data ditambahkan!</h5>
                        </div>');
                    redirect('admin/suratkeluar');
                }
            } else {
                $this->model_surat->adddata('suratkeluar', $array);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Data ditambahkan!</h5>
                    </div>');
                redirect('admin/suratkeluar');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Nomor surat sudah ada!</h5>
                </div>');
            redirect('admin/suratkeluar');
        }
    }

    public function aksiubahsk()
    {
        $id_suratkeluar = $this->input->post('id_suratkeluar');
        $no_suratkeluar = htmlspecialchars($this->input->post('no_suratkeluar'));
        $judul_suratkeluar = htmlspecialchars($this->input->post('judul_suratkeluar'));
        $id_indeks = htmlspecialchars($this->input->post('id_indeks'));
        $tujuan = htmlspecialchars($this->input->post('tujuan'));
        $tanggal_keluar = htmlspecialchars($this->input->post('tanggal_keluar'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $namaberkas_suratkeluar = $_FILES['berkas_suratkeluar']['name'];
        $exp = explode('.', $namaberkas_suratkeluar);
        $typeberkas_suratkeluar = end($exp);
        $berkas_suratkeluar = uniqid() . '.' . $typeberkas_suratkeluar;

        $cek_no = $this->model_surat->getdatawithadd('suratkeluar', 'no_suratkeluar="' . $no_suratkeluar . '" AND id_suratkeluar!=' . $id_suratkeluar)->row_array();

// jika no surat benar
        if (!$cek_no) {
// jika berkas kosong
            if ($namaberkas_suratkeluar != null) {
                $array = [
                    'no_suratkeluar' => $no_suratkeluar,
                    'judul_suratkeluar' => $judul_suratkeluar,
                    'id_indeks' => $id_indeks,
                    'tujuan' => $tujuan,
                    'tanggal_keluar' => $tanggal_keluar,
                    'keterangan' => $keterangan,
                    'berkas_suratkeluar' => $berkas_suratkeluar
                ];

                $config['upload_path']          = 'vendor/files/suratkeluar/';
                $config['allowed_types']        = 'jpeg|jpg|png|doc|docx|pdf';
                $config['file_name'] = $berkas_suratkeluar;

                $this->load->library('upload', $config);
// jika upload gagal
                if (!$this->upload->do_upload('berkas_suratkeluar')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-times"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/suratkeluar');
                } else {
// jika berhasil
                    $this->upload->do_upload();
                    $this->model_surat->updatedata('suratkeluar', $array, array('id_suratkeluar' => $id_suratkeluar));
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Data ditambahkan!</h5>
                        </div>');
                    redirect('admin/suratkeluar');
                }
            } else {
                $array = [
                    'no_suratkeluar' => $no_suratkeluar,
                    'judul_suratkeluar' => $judul_suratkeluar,
                    'id_indeks' => $id_indeks,
                    'tujuan' => $tujuan,
                    'tanggal_keluar' => $tanggal_keluar,
                    'keterangan' => $keterangan
                ];
// tanpa upload berkas
                $this->model_surat->updatedata('suratkeluar', $array, array('id_suratkeluar' => $id_suratkeluar));
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Data ditambahkan!</h5>
                    </div>');
                redirect('admin/suratkeluar');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Nomor surat sudah ada!</h5>
                </div>');
            redirect('admin/suratkeluar');
        }
    }

    public function hapussk($id_suratkeluar)
    {
        $cek_berkas = $this->model_surat->getdatawithadd('suratkeluar', 'id_suratkeluar=' . $id_suratkeluar)->row_array();
        if (null !== $cek_berkas['berkas_suratkeluar']) {
            $path = 'vendor/files/suratkeluar/' . $cek_berkas['berkas_suratkeluar'];
            unlink($path);
        }
        $query = $this->db->query('DELETE FROM suratkeluar WHERE id_suratkeluar=' . $id_suratkeluar);
        if ($query) {
            $cek = $this->model_surat->getdatawithadd('suratkeluar', 'id_suratkeluar=' . $id_suratkeluar)->row_array();
            if ($cek['berkas_suratkeluar'] != "") {
                $path = 'vendor/files/suratkeluar/' . $cek['berkas_suratkeluar'];
                unlink($path);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Data dihapus!</h5>
                </div>');
            redirect('admin/suratkeluar');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Gagal dihapus!</h5>
                </div>');
            redirect('admin/suratkeluar');
        }
    }

    public function laporan_suratkeluar()
    {
        $data['title'] = 'Surat Keluar';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
        if (null !== $this->input->get('filter-index')) {
            $id_indeks = $this->input->get('id_index');
            $additional = "suratkeluar.id_indeks=" . $id_indeks;
            $data['suratkeluar'] = $this->model_surat->getdatawithadd('suratkeluar', $additional)->result();
        } elseif (null !== $this->input->get('filter-tanggal')) {
            $tanggal_awal = $this->input->get('tanggal_awal');
            $tanggal_akhir = $this->input->get('tanggal_akhir');
            $additional = "suratkeluar.tanggal_keluar BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'";
            $data['suratkeluar'] = $this->model_surat->getdatawithadd('suratkeluar', $additional)->result();
        } else {
            $data['suratkeluar'] = $this->model_surat->getdata('suratkeluar')->result();
        }
        $data['indeks'] = $this->model_surat->getother('indeks')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/laporan/laporan_suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function cetaksuratkeluar()
    {
        $data['title'] = 'Surat Keluar #' . uniqid();
        if (null !== $this->input->get('id_index')) {
            $id_indeks = $this->input->get('id_index');
            $additional = "suratkeluar.id_indeks=" . $id_indeks;
            $data['suratkeluar'] = $this->model_surat->getdatawithadd('suratkeluar', $additional)->result();
        } elseif (null !== $this->input->get('tanggal_awal')) {
            $tanggal_awal = $this->input->get('tanggal_awal');
            $tanggal_akhir = $this->input->get('tanggal_akhir');
            $additional = "suratkeluar.tanggal_keluar BETWEEN '" . $tanggal_awal . "' AND '" . $tanggal_akhir . "'";
            $data['suratkeluar'] = $this->model_surat->getdatawithadd('suratkeluar', $additional)->result();
        } else {
            $data['suratkeluar'] = $this->model_surat->getdata('suratkeluar')->result();
        }

        $this->load->view('admin/laporan/cetaksuratkeluar', $data);
// $this->load->view('templates/footer');
    }

// indeks
    public function indeks()
    {
        $data['title'] = 'Indeks Surat';

        if ($this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['indeks'] = $this->model_surat->getotherwithadd('indeks', 'ORDER BY kode_indeks')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/pengaturan/indeks', $data);
        $this->load->view('templates/footer');
    }

    public function tambahindex()
    {
        $kode_index = strtoupper($this->input->post('kode_index'));
        $judul_index = htmlspecialchars($this->input->post('judul_index'));
        $detail = htmlspecialchars($this->input->post('detail'));

        $query = $this->db->get_where('indeks', ['kode_indeks' => $kode_index])->row_array();

        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Gagal!</h5>
                Kode indeks sudah ada!
                </div>');
            redirect('admin/indeks');
        } else {
            $array = [
                'id_indeks' => null,
                'kode_indeks' => $kode_index,
                'judul_indeks' => $judul_index,
                'detail' => $detail
            ];

            $this->model_surat->adddata('indeks', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                Indeks baru ditambahkan!
                </div>');
            redirect('admin/indeks');
        }
    }

    public function aksiubahindeks()
    {
        $id_indeks = $this->input->post('id_indeks');
        $kode_indeks = htmlspecialchars($this->input->post('kode_indeks'));
        $judul_indeks = htmlspecialchars($this->input->post('judul_indeks'));
        $detail = htmlspecialchars($this->input->post('detail'));

        $cek = $this->db->query('SELECT * FROM indeks WHERE kode_indeks="' . $kode_indeks . '" AND id_indeks!=' . $id_indeks)->row_array();

        if ($cek) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Kode sudah ada! coba kode lain</h5>
                </div>');
            redirect('admin/ubahindeks/' . $id_indeks);
        } else {
            $array = [
                'kode_indeks' => $kode_indeks,
                'judul_indeks' => $judul_indeks,
                'detail' => $detail
            ];
            $where = array('id_indeks' => $id_indeks);
            $this->model_surat->updatedata('indeks', $array, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Data diubah!</h5>
                </div>');
            redirect('admin/indeks');
        }
    }

    public function hapusindeks($id_indeks)
    {
        $query = $this->db->query('DELETE FROM indeks WHERE id_indeks=' . $id_indeks);
        if ($query) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Data dihapus!</h5>
                </div>');
            redirect('admin/indeks');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Gagal dihapus!</h5>
                </div>');
            redirect('admin/indeks');
        }
    }

    public function users()
    {
        $data['title'] = 'Manajemen Users';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
        if ($this->session->userdata('level') != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Akses ditolak!</h5>
                </div>');
            redirect(base_url(''));
        }

        $data['users'] = $this->model_surat->getother('user')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/pengaturan/users', $data);
        $this->load->view('templates/footer');
    }

    public function tambahuser()
    {
        $nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $password2 = sha1($password);
        $level = htmlspecialchars($this->input->post('level'));

        $cek_username = $this->model_surat->getotherwithadd('user', 'WHERE username="' . $username . '"')->row_array();

        if (!$cek_username) {
            $array = [
                'id_user' => null,
                'username' => $username,
                'password' => $password2,
                'nama_lengkap' => $nama_lengkap,
                'level' => $level
            ];
            $this->model_surat->adddata('user', $array);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> User ditambahkan!</h5>
                </div>');
            redirect('admin/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Username sudah ada!</h5>
                </div>');
            redirect('admin/users');
        }
    }

    public function ubahlevel($level, $id_user)
    {
        $this->model_surat->updatedata('user', array('level' => $level), array('id_user' => $id_user));
        redirect('admin/users');
    }

    public function hapususer($id_user)
    {
        $hapus = $this->model_surat->deletedata('user', array('id_user' => $id_user));
        if ($hapus) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> User dihapus!</h5>
                </div>');
            redirect('admin/users');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> User gagal dihapus!</h5>
                </div>');
            redirect('admin/users');
        }
    }

    public function profil()
    {
        $data['title'] = 'Profil saya';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }
        $id_user = $this->session->userdata('id_user');
        $data['profil'] = $this->model_surat->getotherwithadd('user', 'WHERE id_user=' . $id_user)->result();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/pengaturan/profil', $data);
        $this->load->view('templates/footer');
    }

    public function aksiubahprofil()
    {
        $id_user = $this->input->post('id_user');
        $nama_lengkap = htmlspecialchars($this->input->post('nama_lengkap'));
        $username = htmlspecialchars($this->input->post('username'));
        $bio = htmlspecialchars($this->input->post('bio'));
        $facebook = htmlspecialchars($this->input->post('facebook'));
        $email = htmlspecialchars($this->input->post('email'));
        $imagename = $_FILES['image']['name'];
        $exp = explode('.', $imagename);
        $imagetype = end($exp);
        $image = uniqid() . '.' . $imagetype;

        $cek_username = $this->model_surat->getotherwithadd('user', 'where username="' . $username . '" AND id_user!=' . $id_user)->row_array();

        if ($cek_username) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Username ada!</h5>
                </div>');
            redirect('admin/profil');
        } else {
            if ($imagename == null) {
                $array = [
                    'username' => $username,
                    'nama_lengkap' => $nama_lengkap,
                    'bio' => $bio,
                    'facebook' => $facebook,
                    'email' => $email
                ];
                $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Profil diubah!</h5>
                    </div>');
                redirect('admin/profil');
            } else {
                $array = [
                    'username' => $username,
                    'nama_lengkap' => $nama_lengkap,
                    'image' => $image,
                    'bio' => $bio,
                    'facebook' => $facebook,
                    'email' => $email
                ];

                $cek_berkas = $this->model_surat->getotherwithadd('user', 'where id_user=' . $id_user)->row_array();
                if ($cek_berkas) {
                    $path = 'vendor/files/profilimg/' . $cek_berkas['image'];
                    unlink($path);
                }
                $config['upload_path'] = 'vendor/files/profilimg/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['file_name'] = $image;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-times"></i> ' . $this->upload->display_errors() . '!</h5>
                        </div>');
                    redirect('admin/profil');
                } else {
                    $this->upload->do_upload();
                    $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Profil diubah!</h5>
                        </div>');
                    redirect('admin/profil');
                }
            }
        }
    }

    public function aksigantipass()
    {
        $id_user = $this->input->post('id_user');
        $password_lama = $this->input->post('password_lama');
        $password_lama2 = sha1($password_lama);
        $password_baru = $this->input->post('password_baru');
        $password_baru2 = sha1($password_baru);

        $cek_password = $this->model_surat->getotherwithadd('user', 'where id_user=' . $id_user . ' AND password="' . $password_lama2 . '"')->row_array();
        if (!$cek_password) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-times"></i> Password lama salah!</h5>
                </div>');
            redirect('admin/profil');
        } else {
            $array = [
                'password' => $password_baru2
            ];

            $this->model_surat->updatedata('user', $array, array('id_user' => $id_user));
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Password diganti!</h5>
                </div>');
            redirect('admin/profil');
        }
    }

    public function about()
    {
        $data['title'] = 'Tentang Sekolah';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $this->load->view('templates/header', $data);
        $this->load->view('admin/ekstra/about', $data);
        $this->load->view('templates/footer');
    }

    public function download($table, $berkas_suratmasuk)
    {
        force_download('vendor/files/' . $table . '/' . $berkas_suratmasuk, null);
    }

    public function testing()
    {
        $data['title'] = 'Halaman Uji coba';
        if ($this->session->userdata('level') == 1) {
            $data['user'] = 'superadmin';
        } elseif ($this->session->userdata('level') == 2) {
            $data['user'] = 'admin';
        }

        $data['indeks'] = $this->model_surat->getother('indeks')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('testing', $data);
        $this->load->view('templates/footer');
    }
}
