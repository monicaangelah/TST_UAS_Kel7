<h2>Status Akademik</h2>
<p>Indeks Prestasi (IP): <?= esc($ip) ?></p>
<p>Indeks Prestasi Kumulatif (IPK): <?= esc($ipk) ?></p>

<table>
    <thead>
        <tr>
            <th>Mata Kuliah</th>
            <th>Nilai</th>
            <th>SKS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grades as $grade): ?>
        <tr>
            <td><?= esc($grade['mata_kuliah_id']) ?></td>
            <td><?= esc($grade['nilai']) ?></td>
            <td><?= esc($grade['sks']) ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>