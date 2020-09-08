<?php

namespace App\Controllers;

class Image extends BaseController
{
    public function __construct()
    {
        $this->image = \Config\Services::image();
    }

    public function uploadGambar($id = null, $file, $img)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        if ($file->isValid()) {
            if ($file->getName() != "profile.png") {
                $namaFile = $file->getRandomName();
                $file->move('./assets/img/profile', $namaFile);
                $this->thumbnail($namaFile);
            } else {
                $namaFile = "profile.png";
            }
        } else {
            if ($img) {
                $namaFile = $img[0];
            } else {
                $namaFile = "profile.png";
            }
        }
        return $namaFile;
    }

    public function addGambar($file)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        if ($file->isValid()) {
            if ($file->getName() != "profile.png") {
                $namaFile = $file->getRandomName();
                $file->move('./assets/img/profile', $namaFile);
                $this->thumbnail($namaFile);
            } else {
                $namaFile = "profile.png";
            }
        } else {
            $namaFile = "profile.png";
        }
        return $namaFile;
    }

    public function hapusGambar($id, $img)
    {
        if (!session()->get('username')) {
            return redirect()->to('/login');
        }
        if ($img[0] != "profile.png") {
            unlink(FCPATH . '/assets/img/profile/' . $img[0]);
            if (file_exists(FCPATH . '/assets/img/thumbnail/thumb_' . $img[0])) {
                unlink(FCPATH . '/assets/img/thumbnail/thumb_' . $img[0]);
            }
        }
    }

    public function thumbnail($file)
    {
        $this->image->withFile('./assets/img/profile/' . $file)
            ->fit(250, 250, 'center')
            ->save('./assets/img/thumbnail/thumb_' . $file);
    }
}
