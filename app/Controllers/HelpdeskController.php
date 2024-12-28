<?php
namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\TicketModel;

class HelpdeskController extends BaseController
{
    public function create()
    {
        $model = new TicketModel();
        $model->insert([
            'user_id' => session()->get('user_id'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/helpdesk')->with('message', 'Tiket berhasil dibuat.');
    }
}