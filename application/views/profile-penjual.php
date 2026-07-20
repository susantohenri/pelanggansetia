<div class="flex flex-col gap-3">
  <div class="bg-white shadow-md rounded-lg p-6 w-80">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <h1 class="text-sm mb-1 text-blue-600 text-center">pelanggansetia.com</h1>
    <div id="qrcode"></div>
    <h1 class="text-sm mt-1 text-blue-600">Tunjukkan QR code ini kepada pelanggan</h1>
    <script type="text/javascript">
      new QRCode(document.getElementById("qrcode"), {
        text: "<?= $qr ?>",
        width: 256,
        height: 256
      });
    </script>
  </div>

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
    <input name="password" type="password" maxlength="6" placeholder="******"
      class="w-full border rounded px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <button type="submit"
      class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M17 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm0 16H5V5h11v4h4v10zm-6-2c1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3 1.34 3 3 3z" />
      </svg>
      <span>Simpan</span>
    </button>

    <a href="<?= site_url('Penjual/logout') ?>"
      class="mt-3 w-full bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M10 17l5-5-5-5v3H3v4h7v3zm9-14H5c-1.1 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
      </svg>
      <span>Keluar</span>
    </a>
  </form>
</div>