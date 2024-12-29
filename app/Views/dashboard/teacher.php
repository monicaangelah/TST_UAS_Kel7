<link rel="stylesheet" href="/css/style.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Dashboard Dosen</h1>
        <p>Selamat Datang, <?= esc($username) ?>!</p>

        <div class="mt-4">
            <h3>Menu</h3>
            <div class="list-group">
                <a href="/teacher/input-nilai" class="list-group-item list-group-item-action">Input Nilai</a>
            </div>  
        </div>   
    </div>
</body>
</html>
