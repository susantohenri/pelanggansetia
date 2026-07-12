<form class="bg-white shadow-md rounded-lg p-6 w-80" method="POST" action="">
  <input type="hidden" name="token" value="<?= $token ?>">

  <!-- Nama Toko -->
  <label class="block mb-2 text-sm font-medium text-gray-700"><?= $label_nama ?></label>
  <input required name="nama" type="text" placeholder="<?= $label_nama ?>" value="<?= $nama ?>"
    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- Nomor HP -->
  <label class="block mb-2 text-sm font-medium text-gray-700">Nomor HP</label>
  <input required name="username" type="tel" placeholder="08xxxxxxxxxx" value="<?= $username ?>"
    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- PIN -->
  <label class="block mb-2 text-sm font-medium text-gray-700">PIN</label>
  <input required name="password" type="password" maxlength="6" placeholder="******"
    class="w-full border rounded px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <?php if ('' != $error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded mb-4">
      <?= $error ?>
    </div>
  <?php endif; ?>

  <?php if ('' != $success): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-1 rounded mb-4">
      <?= $success ?>
    </div>
  <?php endif; ?>

  <!-- Tombol Registrasi -->
  <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
    Daftar
  </button>
</form>