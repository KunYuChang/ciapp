<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $this->sendTestEmail();

        return view("Home/index");
    }

    private function sendTestEmail()
    {
        $email = \Config\Services::email();
        $email->setTo("mischiefsub@gmail.com");
        $email->setSubject("Test Email");
        $email->setMessage("Hello from <i>CodeIgniter</i>");

        if ($email->send()) {
            echo "郵件已寄出";
        } else {
            echo "郵件未寄出";
        }
    }
}
