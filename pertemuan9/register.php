public function register()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password

        // Validasi input dan simpan ke database
        $this->model->addUser($username, $email, $password);
    }

    $this->view('register');
}