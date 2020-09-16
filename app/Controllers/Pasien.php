<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PasienModel;
use App\Models\AlamatModel;
use App\Models\PjModel;
use App\Models\StatusModel;

class Pasien extends BaseController
{
    private $validation = [
        'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field nama pasien wajib diisi'
            ]
        ],
        's_nikah' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field status nikah wajib diisi'
            ]
        ],
        'gol_dar' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field gol. darah wajib diisi'
            ]
        ],
        'agama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field agama wajib diisi'
            ]
        ],
        'no-hp' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field nomor hp wajib diisi',
                'numeric' => 'Field harus berupa nomor',
            ]
        ],
        'tmp-lahir' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field tempat lahir wajib diisi'
            ]
        ],
        'tgl-lahir' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field tanggal lahir wajib diisi'
            ]
        ],
        'tgl-booking' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field tanggal booking wajib diisi'
            ]
        ],
        'pendidikan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field pendidikan wajib diisi'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Field email wajib diisi',
                'valid_email' => 'Email tidak valid'
            ]
        ],
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field alamat wajib diisi'
            ]
        ],
        'rt' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field RT wajib diisi',
                'numeric' => 'Field harus berupa angka'
            ]
        ],
        'rw' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field RW wajib diisi',
                'numeric' => 'Field harus berupa angka'
            ]
        ],
        'kodepos' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field kodepos wajib diisi',
                'numeric' => 'Kodepos harus berupa nomor'
            ]
        ],
        'kelurahan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field kelurahan wajib diisi'
            ]
        ],
        'kecamatan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field kecamatan wajib diisi'
            ]
        ],
        'pilih' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Silahkan pilih salah satu'
            ]
        ],
        'kota' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field kota wajib diisi'
            ]
        ],
        'paket' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Silahkan pilih layanan paket sunat'
            ]
        ],
        'layanan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Silahkan pilih salah satu layanan sunat'
            ]
        ]
    ];

    private $val_pj = [
        'nama-pj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field nama pen. jawab pasien wajib diisi'
            ]
        ]
    ];

    public function __construct()
    {
        $this->model = new PasienModel();
        $this->paket = new PaketModel();
        $this->alamat = new AlamatModel();
        $this->pj = new PjModel();
        $this->status = new StatusModel();
        helper('global');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pasien',
            'path' => 'data pasien',
            'pasien' => $this->getData(),
        ];

        echo view('backend/pasien/pasien', $data);
    }

    ####################################### GET DATA PASIEN #######################################

    public function getData($id = null)
    {
        if (!$id) {
            $query = $this->db->query('SELECT 
        `pasien`.*,`pasien`.`id` as `id_pasien`, 
        `status`.*, 
        `paket`.`nama` as `paket`,
        `alamat`.*,`penanggung_jawab`.`nama` as `pj`,
        `penanggung_jawab`.`status` as `hubungan`,`penanggung_jawab`.`nama` as `nama_pj`
        FROM `pasien` 
        JOIN `status` on `pasien`.`id_status` = `status`.`id`
        JOIN `paket` ON `paket`.`id` = `pasien`.`id_paket`
        JOIN `alamat` ON `pasien`.`id_domisili` = `alamat`.`id`
        LEFT JOIN `penanggung_jawab` ON `pasien`.`id_pj` = `penanggung_jawab`.`id`
        WHERE `status`.`is_confirm` = 1')->getResultArray();
            return $query;
        } else {
            $query = $this->db->query('SELECT 
        `pasien`.*,`pasien`.`id` as `id_pasien`, 
        `status`.*, 
        `paket`.`nama` as `paket`,
        `alamat`.*,`penanggung_jawab`.`nama` as `pj`,
        `penanggung_jawab`.`id_domisili` as `id_domisili_pj`,
        `penanggung_jawab`.`status` as `hubungan`,`penanggung_jawab`.`nama` as `nama_pj`
        FROM `pasien` 
        JOIN `status` on `pasien`.`id_status` = `status`.`id`
        JOIN `paket` ON `paket`.`id` = `pasien`.`id_paket`
        JOIN `alamat` ON `pasien`.`id_domisili` = `alamat`.`id`
        LEFT JOIN `penanggung_jawab` ON `pasien`.`id_pj` = `penanggung_jawab`.`id`
        WHERE `status`.`is_confirm` = 1 AND	`pasien`.`id` = ' . $id)->getRowArray();
            return $query;
        }
    }

    public function getAlamatPJ($id)
    {
        $alamat = $this->db->query('SELECT `alamat`.`alamat` as `alamat_pj`,
        `alamat`.`rt` as `rt_pj`,`alamat`.`rw` as `rw_pj`,`alamat`.`kelurahan` as `kelurahan_pj`,
        `alamat`.`kecamatan` as `kecamatan_pj`, `alamat`.`kota_kab` as `kota_pj`, `alamat`.`kodepos` as `kodepos_pj`
        FROM `alamat` WHERE `alamat`.`id` = ' . $id)->getRowArray();
        return $alamat;
    }

    public function jsonData($id)
    {
        $data = $this->getData($id);
        $tgl_booking = substr($data['tgl_booking'], 0, 10);
        $tgl_daftar = substr($data['created_at'], 0, 10);
        $tgl_lahir = substr($data['tgl_lahir'], 0, 10);
        $tgl_booking_indo = mediumdate_indo($tgl_booking);
        $tgl_daftar_indo = mediumdate_indo($tgl_daftar);
        $tgl_lahir_indo = mediumdate_indo($tgl_lahir);

        $pasien = [
            'nama' => $data['nama'],
            'umur' => hitung_umur($tgl_lahir, $tgl_daftar),
            'status_nikah' => $data['s_nikah'],
            'no_rm' => $data['no_rm'],
            'tmp_lahir' => $data['tmp_lahir'],
            'tgl_lahir' => $tgl_lahir_indo,
            'pendidikan' => $data['pendidikan'],
            'gol_dar' => $data['gol_dar'],
            'booking' => $tgl_booking,
            'agama' => $data['agama'],
            'alamat' => $data['alamat'] . " RT " . $data['rt'] . " RW " . $data['rw'] . " Kel. " . $data['kelurahan'] . " Kec. " . $data['kecamatan'] . " " . $data['kota_kab'],
            'tgl_daftar' => $tgl_daftar_indo,
            'tgl_sunat' => $tgl_booking_indo,
            'layanan' => "Sunat di " . $data['layanan'],
            'paket' => $data['paket'],
            'wa' => $data['no_tlp'],
            'email' => $data['email']
        ];

        if (!$data['id_pj']) {
            echo json_encode($pasien);
        } else {
            $alamatPj = $this->getAlamatPJ($data['id_domisili_pj']);
            $pj = [
                'alamat_pj' => $alamatPj['alamat_pj'] . " RT " . $alamatPj['rt_pj'] . " RW " . $alamatPj['rw_pj'] . " Kel. " . $alamatPj['kelurahan_pj'] . " Kec. " . $alamatPj['kecamatan_pj'] . " " . $alamatPj['kota_pj'],
                'nama_pj' => $data['nama_pj'],
                'hubungan' => $data['hubungan']
            ];
            $data = array_merge($pasien, $pj);
            echo json_encode($data);
        }
    }


    ####################################### CRUD DATA PASIEN #######################################

    public function add()
    {
        $pj = $this->request->getVar('hubungan');
        if ($pj == "Mandiri") {
            if (!$this->validate($this->validation)) {
                $this->validasiData();
            } else {
                return $this->addAllTable();
            }
        } else {
            if (!$this->validate(array_merge($this->validation, $this->val_pj))) {
                $this->validasiData();
            } else {
                return $this->addAllTable();
            }
        }
    }

    private function validasiData()
    {
        $data = [
            'pasien' => $this->model->findAll(),
            'paket' => $this->paket->findAll(),
            'validation' => $this->validator
        ];
        $this->session->setFlashdata('error', 'Registrasi pasien gagal ! <br> Periksa kembali form inputan');
        echo view('frontend/index', $data);
    }

    private function addAllTable()
    {
        $this->addPasien();
        $this->session->setFlashdata('success', 'Registrasi pasien berhasil !');
        return redirect()->to('/');
    }

    public function addPasien()
    {
        $alamat = [
            'alamat' => $this->request->getVar('alamat'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'kodepos' => $this->request->getVar('kodepos'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota_kab' => $this->request->getVar('pilih') . ' ' . $this->request->getVar('kota'),
        ];
        $no_hp =  $this->request->getVar('no-hp');
        if (substr($no_hp, 0, 1) == 0) {
            $no_hp = "62" . substr($no_hp, 1);
        }
        $data = [
            'id_domisili' => $this->addAlamat($alamat),
            'id_status' => $this->addStatus(),
            'id_paket' => $this->request->getVar('paket'),
            'id_pj' => $this->addPj(),
            'nama' => $this->request->getVar('nama'),
            's_nikah' => $this->request->getVar('s_nikah'),
            'gol_dar' => $this->request->getVar('gol_dar'),
            'agama' => $this->request->getVar('agama'),
            'tmp_lahir' => $this->request->getVar('tmp-lahir'),
            'tgl_lahir' => $this->request->getVar('tgl-lahir'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'no_tlp' => $no_hp,
            'email' => $this->request->getVar('email')
        ];
        $this->model->save($data);

        #cek domisili pj = domisili pasien
        if ($data['id_pj']) {
            $idDomisiliPj = $this->db->table('penanggung_jawab')->where(['id' => $data['id_pj']])->get()->getRowArray();
            if (!$idDomisiliPj['id_domisili'])
                $dataPj = [
                    'id' => $data['id_pj'],
                    'id_domisili' => $data['id_domisili']
                ];
            $this->pj->save($dataPj);
        }
    }

    public function addPj()
    {
        $pj = $this->request->getVar('hubungan');
        if ($pj == "Mandiri") {
            # dont add data
            return null;
        } else {
            if ($this->request->getVar('alamat-pj')) {
                $kota = $this->request->getVar('pilih-pj') . ' ' . $this->request->getVar('kota-pj');
                $alamat = [
                    'alamat' => $this->request->getVar('alamat-pj'),
                    'rt' => $this->request->getVar('rt-pj'),
                    'rw' => $this->request->getVar('rw-pj'),
                    'kodepos' => $this->request->getVar('kodepos-pj'),
                    'kelurahan' => $this->request->getVar('kelurahan-pj'),
                    'kecamatan' => $this->request->getVar('kecamatan-pj'),
                    'kota_kab' => $kota,
                ];
                $id_domisili = $this->addAlamat($alamat);
            } else {
                $id_domisili = null;
            }

            $data = [
                'nama' => $this->request->getVar('nama-pj'),
                'status' => $this->request->getVar('hubungan'),
                'id_domisili' => $id_domisili
            ];
            $this->pj->save($data);
            $id = $this->db->table('penanggung_jawab')->selectMax('id')->get()->getResultArray();
            return $id[0];
        }
    }

    public function addAlamat($data = [])
    {
        $this->alamat->save($data);
        $id = $this->db->table('alamat')->selectMax('id')->get()->getResultArray();
        return $id[0];
    }

    public function addStatus()
    {
        $data = [
            'tgl_booking' => $this->request->getVar('tgl-booking'),
            'no_rm' => '0',
            'layanan' => $this->request->getVar('layanan'),
            'is_confirm' => '0',
            'is_done' => '0',
        ];
        $this->status->save($data);
        $id = $this->db->table('status')->selectMax('id')->get()->getResultArray();
        return $id[0];
    }

    public function addPasienControl($rm)
    {
    }

    public function delete($id)
    {
        $data = $this->pasien->find($id);
        $id_pj = $data['id_pj'];
        $id_status = $data['id_status'];
        $id_domisili = $data['id_domisili'];

        $this->pasien->delete($id);
        $this->pasien->delete($id);
        $this->db->table('penanggung_jawab')->where('id', $id_pj)->delete();
        $this->db->table('status')->where('id', $id_status)->delete();
        $this->db->table('alamat')->where('id', $id_domisili)->delete();

        $this->session->setFlashdata('success', 'Data pasien berhasil di hapus !');
        return redirect()->to('/pasien');
    }
}
