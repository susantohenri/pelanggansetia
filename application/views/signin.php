<form class="bg-white shadow-md rounded-lg p-6 w-80" method="POST" action="">
  <input type="hidden" name="token" value="<?= $token ?>">

  <!-- Nomor HP -->
  <label class="block mb-2 text-sm font-medium text-gray-700">Nomor HP</label>
  <input required type="tel" name="username" placeholder="08xxxxxxxxxx" value="<?= $username ?>"
    class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <!-- PIN -->
  <label class="block mb-2 text-sm font-medium text-gray-700">PIN</label>
  <input required type="password" name="password" maxlength="6" placeholder="******"
    class="w-full border rounded px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500">

  <?php if ('' != $error): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-1 rounded mb-4">
      <?= $error ?>
    </div>
  <?php endif; ?>

  <!-- Tombol Login -->
  <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
    Masuk
  </button>
  <div class="w-full text-right pr-2">
    <a href="https://wa.me/6281901088918?text=halo%20admin%20pelanggansetia.com" target="_blank"
      class="text-sm"
      rel="noopener noreferrer">Lupa PIN?</a>
  </div>
</form>