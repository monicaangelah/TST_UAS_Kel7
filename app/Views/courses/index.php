<h2>Available Courses</h2>
<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>SKS</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($courses as $course): ?>
        <tr>
            <td><?= esc($course['kode']) ?></td>
            <td><?= esc($course['nama']) ?></td>
            <td><?= esc($course['sks']) ?></td>
            <td>
                <a href="/courses/register/<?= $course['id'] ?>">Register</a>
                <a href="/courses/unregister/<?= $course['id'] ?>">Unregister</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>