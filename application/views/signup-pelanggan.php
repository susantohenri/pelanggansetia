<form class="bg-white shadow-md rounded-lg p-6 w-80" method="POST" action="">
  <input type="hidden" name="token" value="<?= $token ?>">

  <?php if ('' != $error): ?>
    <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-1 rounded mb-4">
      <?= $error ?>
    </div>
  <?php endif; ?>

  <?php if ('' != $success): ?>
    <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-1 rounded mb-4">
      <?= $success ?>
    </div>
  <?php endif; ?>

  <!-- Nama Pelanggan -->
  <label class="block mb-2 text-sm font-medium text-gray-700">Nama Pelanggan</label>
  <input required name="nama" type="text" placeholder="Nama Pelanggan" value="<?= $nama ?>"
    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- Tombol Registrasi -->
  <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
    <span class="material-icons text-base">person_add</span>
    <span>Daftar</span>
  </button>
</form>