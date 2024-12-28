<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            // Periksa apakah request berasal dari JSON
            if ($this->request->isAJAX() || $this->request->getHeaderLine('Content-Type') === 'application/json') {
                // Ambil data dari JSON
                $json = $this->request->getJSON();
                dd($this->request->getJSON());
    
                // Validasi data
                $validation = $this->validate([
                    'username' => 'required|min_length[3]|is_unique[users.username]',
                    'password' => 'required|min_length[6]',
                    'role'     => 'required|in_list[student,teacher,admin]',
                ], (array) $json);
    
                if (!$validation) {
                    // Kembalikan respons validasi error
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Validation failed',
                        'errors' => $this->validator->getErrors(),
                    ])->setStatusCode(400); // Bad Request
                }
    
                $model = new UserModel();
    
                try {
                    // Simpan data ke database
                    $model->save([
                        'username' => $json->username,
                        'password' => password_hash($json->password, PASSWORD_DEFAULT),
                        'role'     => $json->role,
                    ]);
    
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'User registered successfully',
                    ])->setStatusCode(201); // Created
                } catch (\Exception $e) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Failed to save user',
                        'error' => $e->getMessage(),
                    ])->setStatusCode(500); // Internal Server Error
                }
            } else {
                // Tangani request dari HTML (bukan JSON)
                $validation = $this->validate([
                    'username' => 'required|min_length[3]|is_unique[users.username]',
                    'password' => 'required|min_length[6]',
                    'role'     => 'required|in_list[student,teacher,admin]',
                ]);
    
                if (!$validation) {
                    return view('auth/register', [
                        'validation' => $this->validator,
                    ]);
                }
    
                $model = new UserModel();
    
                try {
                    $model->save([
                        'username' => $this->request->getPost('username'),
                        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                        'role'     => $this->request->getPost('role'),
                    ]);
    
                    return redirect()->to('/login')->with('message', 'Registration successful!');
                } catch (\Exception $e) {
                    return view('auth/register', [
                        'error' => 'Failed to save user. Please try again.',
                    ]);
                }
            }
        }
    
        // Jika metode GET, tampilkan form registrasi
        return view('auth/register');
    }    
    

    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('username', $username)->first();

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id'   => $user['id'],
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                    'logged_in' => true,
                ]);

                return redirect()->to('/dashboard');
            }

            // Tampilkan error jika login gagal
            return view('auth/login', ['error' => 'Invalid username or password.']);
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}