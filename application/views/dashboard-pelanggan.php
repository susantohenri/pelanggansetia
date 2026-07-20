<div class="flex flex-col gap-3" id="kartuPelanggan">
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

    <button type="submit"
      class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 24 24"
        fill="currentColor">
        <path d="M17 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z" />
      </svg>
      <span>Perbaharui Data</span>
    </button>

    <a id="downloadQR"
      class="mt-3 w-full block text-center bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg"
        width="18"
        height="18"
        viewBox="0 0 24 24"
        fill="currentColor">
        <path d="M5 20h14v-2H5v2zM19 9h-4V3H9v6H5l7 7 7-7z" />
      </svg>
      <span>Download QR</span>
    </a>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
      document.getElementById("downloadQR").addEventListener("click", function() {

        html2canvas(document.getElementById("kartuPelanggan"), {
          scale: 3,
          backgroundColor: "#ffffff",
          useCORS: true
        }).then(function(canvas) {

          const link = document.createElement("a");
          const nama = document.querySelector('input[name="nama"]').value || "pelanggan";

          link.download = nama.replace(/\s+/g, "-") + ".png";
          link.href = canvas.toDataURL("image/png");
          link.click();

        });

      });
    </script>
  </form>
</div>