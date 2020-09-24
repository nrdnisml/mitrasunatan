<?php

namespace App\Controllers;

use App\Models\PaketModel;
use App\Models\PasienModel;
use App\Models\AlamatModel;
use App\Models\PjModel;
use App\Models\StatusModel;
use App\Controllers\Pendaftar;

class Pasien extends BaseController
{
    private $validation = [
        'nama' => [
            'rules' => 'required|alpha_space',
            'errors' => [
                'required' => 'Field nama pasien wajib diisi',
                'alpha_space' => 'Field harus berupa huruf'
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
            'rules' => 'required|alpha_space',
            'errors' => [
                'required' => 'Field tempat lahir wajib diisi',
                'alpha_space' => 'Field harus berupa huruf'
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
        'alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field alamat wajib diisi',

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
        // 'kodepos' => [
        //     'rules' => 'numeric',
        //     'errors' => [
        //         'numeric' => 'Kodepos harus berupa nomor'
        //     ]
        // ],
        'kelurahan' => [
            'rules' => 'required|alpha_space',
            'errors' => [
                'required' => 'Field kelurahan wajib diisi',
                'alpha_space' => 'Field harus berupa huruf'
            ]
        ],
        'kecamatan' => [
            'rules' => 'required|alpha_space',
            'errors' => [
                'required' => 'Field kecamatan wajib diisi',
                'alpha_space' => 'Field harus berupa huruf'
            ]
        ],
        'kota' => [
            'rules' => 'required|alpha_space',
            'errors' => [
                'required' => 'Field kota wajib diisi',
                'alpha_space' => 'Field harus berupa huruf'
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

    public function index($day = null)
    {
        if ($day == 1) {
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
            WHERE `status`.`is_confirm` = 1 AND DATE(`tgl_booking`) = CURDATE()')->getResultArray();
        } elseif ($day == 7) {
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
            WHERE `status`.`is_confirm` = 1 AND YEARWEEK(`tgl_booking`) = YEARWEEK(NOW())')->getResultArray();
        } else {
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
        }
        $data = [
            'title' => 'Data Pasien',
            'path' => 'data pasien',
            'pasien' => $query
        ];

        echo view('backend/pasien', $data);
    }

    public function export($type = null)
    {
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

        if ($type == 1) {
            $data = [
                'data' => $this->dataExcel()
            ];
            echo view('/backend/excel/pasien', $data);
        } else {
            $data = [
                'data' => $query
            ];
            echo  view('/backend/print/pasien', $data);
        }
    }

    ####################################### GET DATA PASIEN #######################################

    public function getData($id = null)
    {
        if ($id) {
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
            WHERE `status`.`is_confirm` = 1')->getResultArray();
        }

        return $query;
    }

    public function getAlamatPJ($id, $type = null)
    {
        if ($type) {
            $alamat = $this->db->query('SELECT `alamat`.`alamat` as `alamat_pj`,
        `alamat`.`rt` as `rt_pj`,`alamat`.`rw` as `rw_pj`,`alamat`.`kelurahan` as `kelurahan_pj`,
        `alamat`.`kecamatan` as `kecamatan_pj`, `alamat`.`kota_kab` as `kota_pj`, `alamat`.`kodepos` as `kodepos_pj`
        FROM `alamat` WHERE `alamat`.`id` = ' . $id)->getResultArray();
        } else {
            $alamat = $this->db->query('SELECT `alamat`.`alamat` as `alamat_pj`,
        `alamat`.`rt` as `rt_pj`,`alamat`.`rw` as `rw_pj`,`alamat`.`kelurahan` as `kelurahan_pj`,
        `alamat`.`kecamatan` as `kecamatan_pj`, `alamat`.`kota_kab` as `kota_pj`, `alamat`.`kodepos` as `kodepos_pj`
        FROM `alamat` WHERE `alamat`.`id` = ' . $id)->getRowArray();
        }
        return $alamat;
    }

    public function dataExcel()
    {
        $data = $this->getData();
        $i = 0;
        foreach ($data as $data) {
            $tgl_booking = substr($data['tgl_booking'], 0, 10);
            $tgl_daftar = substr($data['created_at'], 0, 10);
            $tgl_lahir = substr($data['tgl_lahir'], 0, 10);
            $tgl_booking_indo = mediumdate_indo($tgl_booking);
            $tgl_daftar_indo = mediumdate_indo($tgl_daftar);
            $tgl_lahir_indo = mediumdate_indo($tgl_lahir);

            $pasien[$i] = [
                'id_pasien' => $data['id_pasien'],
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
                'alamat' => $data['alamat'] . " RT " . $data['rt'] . " RW " . $data['rw'] . " Kel. " . $data['kelurahan'] . " Kec. " . $data['kecamatan'] . " " . $data['kota_kab'] . " (" . $data['kodepos'] . ")",
                'tgl_daftar' => $tgl_daftar_indo,
                'tgl_sunat' => $tgl_booking_indo,
                'layanan' => "Sunat di " . $data['layanan'],
                'paket' => $data['paket'],
                'wa' => $data['no_tlp'],
                'email' => $data['email']
            ];

            if ($data['id_pj']) {
                $alamatPj[$i] = $this->getAlamatPJ($data['id_domisili_pj'], 1)[0];
                $pj[$i] = [
                    'alamat_pj' => $alamatPj[$i]['alamat_pj'] . " RT " . $alamatPj[$i]['rt_pj'] . " RW " . $alamatPj[$i]['rw_pj'] . " KEL. " . $alamatPj[$i]['kelurahan_pj'] . " KEC. " . $alamatPj[$i]['kecamatan_pj'] . " " . $alamatPj[$i]['kota_pj'] . " (" . $alamatPj[$i]['kodepos_pj'] . ")",
                    'nama_pj' => $data['nama_pj'],
                    'hubungan' => $data['hubungan']
                ];
            } else {
                $pj[$i] = [
                    'alamat_pj' => "-",
                    'nama_pj' => "-",
                    'hubungan' => "-"
                ];
            }
            $i++;
        }
        $data = array_replace_recursive($pj, $pasien);
        return $data;
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
            'alamat' => $data['alamat'] . " RT " . $data['rt'] . " RW " . $data['rw'] . " Kel. " . $data['kelurahan'] . " Kec. " . $data['kecamatan'] . " " . $data['kota_kab'] . " (" . $data['kodepos'] . ")",
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
                'alamat_pj' => $alamatPj['alamat_pj'] . " RT " . $alamatPj['rt_pj'] . " RW " . $alamatPj['rw_pj'] . " KEL. " . $alamatPj['kelurahan_pj'] . " KEC. " . $alamatPj['kecamatan_pj'] . " " . $alamatPj['kota_pj'] . " (" . $alamatPj['kodepos_pj'] . ")",
                'nama_pj' => $data['nama_pj'],
                'hubungan' => $data['hubungan']
            ];
            $data = array_merge($pasien, $pj);
            echo json_encode($data);
        }
    }


    ####################################### CRUD DATA BY ADMIN #######################################
    public function addByAdmin()
    {
        $pj = $this->request->getVar('hubungan');
        if ($pj == "Mandiri") {
            if (!$this->validate($this->validation)) {
                return $this->validasiDataByAdmin();
            } else {
                return $this->addDataByAdmin();
            }
        } else {
            if (!$this->validate(array_merge($this->validation, $this->val_pj))) {
                return $this->validasiDataByAdmin();
            } else {
                return $this->addDataByAdmin();
            }
        }
    }

    private function addDataByAdmin()
    {
        $this->cPendaftar = new Pendaftar();
        $this->addPasien();
        #ambil id dari pasien yang ditambahkan kemudian confirm
        $id = $this->db->table('pasien')->selectMax('id')->get()->getRowArray();
        $this->cPendaftar->confirmProcess($id['id']);
        $this->session->setFlashdata('success', 'Registrasi pasien berhasil !');
        return redirect()->to('/pasien');
    }

    private function validasiDataByAdmin()
    {
        $data = [
            'title' => 'Tambah Pasien',
            'path' => 'Tambah Pasien',
            'pasien' => $this->model->findAll(),
            'paket' => $this->paket->findAll(),
            'validation' => $this->validator
        ];
        $this->session->setFlashdata('error', 'Registrasi pasien gagal ! <br> Periksa kembali form inputan');
        echo view('backend/tambahPasien', $data);
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
            'kota_kab' => $this->request->getVar('kota'),
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
                $alamat = [
                    'alamat' => $this->request->getVar('alamat-pj'),
                    'rt' => $this->request->getVar('rt-pj'),
                    'rw' => $this->request->getVar('rw-pj'),
                    'kodepos' => $this->request->getVar('kodepos-pj'),
                    'kelurahan' => $this->request->getVar('kelurahan-pj'),
                    'kecamatan' => $this->request->getVar('kecamatan-pj'),
                    'kota_kab' => $this->request->getVar('kota-pj'),
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

    public function delete($id)
    {
        $data = $this->model->find($id);
        $id_pj = $data['id_pj'];
        $id_status = $data['id_status'];
        $id_domisili = $data['id_domisili'];

        $this->model->delete($id);
        $this->db->table('penanggung_jawab')->where('id', $id_pj)->delete();
        $this->db->table('status')->where('id', $id_status)->delete();
        $this->db->table('alamat')->where('id', $id_domisili)->delete();

        $this->session->setFlashdata('success', 'Data pasien berhasil di hapus !');
        return redirect()->to('/pasien');
    }
}
