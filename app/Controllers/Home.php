<?php

namespace App\Controllers;

use App\Models\CaravanModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function home()
    {
        $caravanModel = new CaravanModel();

        $caravans = $caravanModel->findAll();

        $data['caravans'] = $caravans;

        return view('home', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
