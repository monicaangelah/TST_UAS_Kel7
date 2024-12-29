<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Admin</h1>
        <p>Selamat Datang, <?= esc($username) ?>!</p>

        <div class="mt-4">
            <h3>Menu</h3>
            <div class="list-group">
                <a href="/admin/courses" class="list-group-item list-group-item-action">Daftar Mata Kuliah</a>
                <a href="/admin/input-mahasiswa" class="list-group-item list-group-item-action">Input Data Mahasiswa</a>
                <a href="/admin/input-dosen" class="list-group-item list-group-item-action">Input Data Dosen</a>
            </div>  
        </div>    
    </div>
</body>
</html>
