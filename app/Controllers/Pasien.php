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
        ],
        'alamat-pj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field alamat wajib diisi'
            ]
        ],
        'rt-pj' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field RT wajib diisi',
                'numeric' => 'Field harus berupa angka'
            ]
        ],
        'rw-pj' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field RW wajib diisi',
                'numeric' => 'Field harus berupa angka'
            ]
        ],
        'kodepos-pj' => [
            'rules' => 'required|numeric',
            'errors' => [
                'required' => 'Field kodepos wajib diisi',
                'numeric' => 'Kodepos harus berupa nomor'
            ]
        ],
        'kelurahan-pj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field kelurahan wajib diisi'
            ]
        ],
        'kecamatan-pj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field kecamatan wajib diisi'
            ]
        ],
        'pilih-pj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Silahkan pilih salah satu'
            ]
        ],
        'kota-pj' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Field kota wajib diisi'
            ]
        ],
    ];

    public function __construct()
    {
        $this->model = new PasienModel();
        $this->paket = new PaketModel();
        $this->alamat = new AlamatModel();
        $this->pj = new PjModel();
        $this->status = new StatusModel();
    }

    public function add()
    {
        $pj = $this->request->getVar('hubungan');
        if ($pj == "Mandiri") {
            if (!$this->validate($this->validation)) {
                $data = [
                    'pasien' => $this->model->findAll(),
                    'paket' => $this->paket->findAll(),
                    'validation' => $this->validator
                ];
                $this->session->setFlashdata('error', 'Registrasi pasien gagal !');
                return view('frontend/index', $data);
            } else {
                $this->addPasien();
                $this->session->setFlashdata('success', 'Registrasi pasien berhasil !');
                return redirect()->to('/');
            }
        } else {
            if (!$this->validate(array_merge($this->validation, $this->val_pj))) {
                $data = [
                    'pasien' => $this->model->findAll(),
                    'paket' => $this->paket->findAll(),
                    'validation' => $this->validator
                ];
                $this->session->setFlashdata('error', 'Registrasi pasien gagal !');
                return view('frontend/index', $data);
            } else {
                $this->addPasien();
                $this->session->setFlashdata('success', 'Registrasi pasien berhasil !');
                return redirect()->to('/');
            }
        }
    }

    public function addPasien()
    {
        $kota = $this->request->getVar('pilih') . ' ' . $this->request->getVar('kota');
        $alamat = [
            'alamat' => $this->request->getVar('alamat'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'kodepos' => $this->request->getVar('kodepos'),
            'kelurahan' => $this->request->getVar('kelurahan'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota_kab' => $kota,
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
    }

    public function addPj()
    {
        $pj = $this->request->getVar('hubungan');
        if ($pj == "Mandiri") {
            # dont add data
            return null;
        } else {
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
            'n_kontrol' => '0',
            'is_confirm' => '0',
            'is_done' => '0',
        ];
        $this->status->save($data);
        $id = $this->db->table('status')->selectMax('id')->get()->getResultArray();
        return $id[0];
    }
}
