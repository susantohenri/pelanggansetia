<div class="flex flex-col gap-3">
  <?php if (0 == $pelanggan['earn']): ?>
    <div class="bg-white shadow-md rounded-lg p-6 w-80">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
      <h1 class="text-sm mb-1 text-blue-600 text-center">pelanggansetia.com</h1>
      <div id="qrcode"></div>
      <h1 class="text-sm mt-1 text-blue-600">Tunjukkan QR code ini kepada penjual</h1>
      <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), {
          text: "<?= $qr ?>",
          width: 256,
          height: 256
        });
      </script>
    </div>
  <?php endif; ?>
  <div class="bg-white shadow-md rounded-lg p-6 w-80">
    <h1 class="text-center text-xl border-b mb-3 pb-2">Kasih Poin</h1>
    <h1><b>Pelanggan: </b><?= $pelanggan['nama'] ?></h1>
    <h1><b>Hadiah: </b><?= $pelanggan['redeem'] ?>x</h1>
    <h1><b>Poin: </b><?= $pelanggan['poin'] ?></h1>
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

    <label class="text-xl text-center block mb-2 font-medium text-gray-700">
      Poin yang ditambahkan:
    </label>
    <input required name="nilai" type="text" placeholder="Nama Pelanggan" value="1"
      class="text-center w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
      </svg>
      <span>Tambahkan</span>
    </button>
    <a href="<?= site_url() ?>"
      class="mt-3 w-full block text-center bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M18.3 5.71 12 12l6.3 6.29-1.41 1.42L10.59 13.41 4.29 19.71 2.88 18.29 9.17 12 2.88 5.71 4.29 4.29l6.3 6.3 6.29-6.3z" />
      </svg>
      <span>Batal</span>
    </a>
  </form>
</div>