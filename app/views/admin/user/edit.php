<div class="container mt-0 bg-secondary" style="margin-left: 268px; padding: 20px; ">
    <h2 class="mb-3 text-white">İstifadəçi Düzəlişi</h2>
    <hr style="border: 2px solid #dc3545; width: 100%;">

    <!-- Düzenleme Formu -->
    <form action="/admin/user/update" method="post">
        <!-- Kullanıcı ID'sini gizli input olarak gönder -->
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user[0]['id']); ?>">

        <!-- Ad Soyad -->
        <div class="mb-3">
            <label for="fullname" class="form-label text-white">Ad Soyad</label>
            <input type="text" class="form-control" id="fullname" name="fullname"
                value="<?php echo htmlspecialchars($user[0]['fullname']); ?>"
                style="background-color: white; color: black; border: 1px solid #ccc;">
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label text-white">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?php echo htmlspecialchars($user[0]['email']); ?>"
                style="background-color: white; color: black; border: 1px solid #ccc;">
        </div>

        <!-- Şifrə -->
        <div class="mb-3">
            <label for="password" class="form-label text-white">Şifrə</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="Yeni şifrə daxil edin (boş buraxıla bilər)"
                style="background-color: white; color: black; border: 1px solid #ccc;">
        </div>

        <!-- Adres -->
        <div class="mb-3">
            <label for="address" class="form-label text-white">Adres</label>
            <input type="text" class="form-control" id="address" name="address"
                value="<?php echo htmlspecialchars($user[0]['address']); ?>"
                style="background-color: white; color: black; border: 1px solid #ccc;">
        </div>

        <!-- Rolu -->
        <div class="mb-3">
            <label for="role" class="form-label text-white">Rolu</label>
            <select class="form-control" id="role" name="role"
                style="background-color: white; color: black; border: 1px solid #ccc;">
                <option value="admin" <?php echo ($user[0]['role'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="user" <?php echo ($user[0]['role'] === 'user') ? 'selected' : ''; ?>>İstifadəçi</option>
            </select>
        </div>

        <!-- Submit düymələri -->
        <button type="submit" class="btn btn-success">Yadda Saxla</button>
        <a href="/admin/user" class="btn btn-secondary">Geri Qayıt</a>
    </form>
</div>