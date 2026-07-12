<div class="flex flex-col gap-3">
  <div class="bg-white shadow-md rounded-lg p-6 w-80">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <div id="qrcode"></div>
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

    <!-- Nama Pelanggan -->
    <label class="block mb-2 text-sm font-medium text-gray-700">Nama Pelanggan</label>
    <input required name="nama" type="text" placeholder="Nama Pelanggan" value="<?= $nama ?>"
      class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <!-- Nomor HP -->
    <label class="block mb-2 text-sm font-medium text-gray-700">Nomor HP</label>
    <input required name="username" type="tel" placeholder="08xxxxxxxxxx" value="<?= $username ?>"
      class="w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <!-- PIN -->
    <label class="block mb-2 text-sm font-medium text-gray-700">PIN</label>
    <input name="password" type="password" maxlength="6" placeholder="******"
      class="w-full border rounded px-3 py-2 mb-6 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">
      Perbaharui Data
    </button>
    <a href="<?= site_url('Penjual/logout') ?>"
      class="mt-3 w-full block text-center bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
      Download QR
    </a>
  </form>
</div>