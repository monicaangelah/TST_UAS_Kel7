<h2>Buat Tiket Helpdesk</h2>
<form method="post" action="/helpdesk">
    <?= csrf_field() ?>
    <label for="title">Judul:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="description">Deskripsi:</label>
    <textarea name="description" id="description" required></textarea>
    <br>
    <button type="submit">Kirim Tiket</button>
</form>
<?= isset($message) ? '<p>' . $message . '</p>' : '' ?>