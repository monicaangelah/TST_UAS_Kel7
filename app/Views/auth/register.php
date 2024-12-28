<h2>Register</h2>
<form method="post" action="/register">
    <?= csrf_field() ?>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
        <option value="admin">Admin</option>
    </select>
    <br>
    <button type="submit">Register</button>
</form>