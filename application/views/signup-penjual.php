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

  <!-- Nama Toko -->
  <label class="block mb-2 text-sm font-medium text-gray-700">Nama Toko</label>
  <input required name="nama" type="text" placeholder="Nama Toko" value="<?= $nama ?>"
    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- Nomor HP -->
  <label class="block mb-2 text-sm font-medium text-gray-700">Nomor HP</label>
  <input required name="username" type="tel" placeholder="08xxxxxxxxxx" value="<?= $username ?>"
    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- PIN -->
  <label class="block mb-2 text-sm font-medium text-gray-700">PIN</label>
  <input required name="password" type="password" maxlength="6" placeholder="******"
    class="w-full border rounded px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- Tombol Registrasi -->
  <button type="submit"
    class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 12a4 4 0 100-8 4 4 0 000 8zm0 2c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M19 8v6M16 11h6" />
    </svg>
    <span>Daftar</span>
  </button>
</form>