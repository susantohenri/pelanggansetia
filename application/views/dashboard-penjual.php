<div class="flex flex-col gap-3">

  <div class="grid grid-cols-1 gap-4 w-full max-w-md">

    <!-- Pelanggan Datang Kembali -->
    <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-500">Pelanggan Datang Kembali</p>
        <h2 class="text-3xl font-bold text-blue-600"><?= $this->session->userdata('retention') ?></h2>
        <p class="text-xs text-gray-400">Minggu ini</p>
      </div>

      <div class="bg-blue-100 p-3 rounded-full">
        <span class="material-icons text-blue-600 text-3xl">refresh</span>
      </div>
    </div>

    <!-- Hadiah Diberikan -->
    <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-500">Hadiah Diberikan</p>
        <h2 class="text-3xl font-bold text-green-600"><?= $this->session->userdata('redemption') ?></h2>
        <p class="text-xs text-gray-400">Minggu ini</p>
      </div>

      <div class="bg-green-100 p-3 rounded-full">
        <span class="material-icons text-green-600 text-3xl">card_giftcard</span>
      </div>
    </div>

    <!-- Pelanggan Setia -->
    <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-500">Pelanggan Setia</p>
        <h2 class="text-2xl font-bold text-yellow-600"><?= $this->session->userdata('pelanggansetia')['nama'] ?></h2>
        <p class="text-xs text-gray-400">Total poin dikumpulkan: <?= $this->session->userdata('pelanggansetia')['earn'] ?></p>
      </div>

      <div class="bg-yellow-100 p-3 rounded-full">
        <span class="material-icons text-yellow-600 text-3xl">emoji_events</span>
      </div>
    </div>

  </div>

  <div class="bg-white shadow-md rounded-lg p-2 w-80">
    <video id="qr-video"
      class="w-full rounded-lg border"
      playsinline></video>

    <div id="result"
      class="mt-4 p-3 bg-white rounded text-center font-semibold">
      arahkan kamera ke QR code pelanggan
    </div>

    <script type="module">
      import QrScanner from "https://cdn.jsdelivr.net/npm/qr-scanner@1.4.2/qr-scanner.min.js";

      const video = document.getElementById("qr-video");
      const result = document.getElementById("result");

      const scanner = new QrScanner(
        video,
        (scanResult) => {
          result.textContent = scanResult.data;
          scanner.stop();
          location.href = scanResult.data;
        }, {
          preferredCamera: "environment",
          highlightScanRegion: true,
          highlightCodeOutline: true,
        }
      );

      scanner.start();
    </script>
  </div>

  <a href="<?= site_url('Penjual/daftarkanpelanggan') ?>"
    class="mt-1 w-full bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
    <span class="material-icons">person_add</span>
    <span>Pelanggan Baru</span>
  </a>

  <a href="https://wa.me/6281901088918?text=halo%20admin%20pelanggansetia.com" target="_blank"
    rel="noopener noreferrer"
    class="mt-1 w-full bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
    <span class="material-icons">chat</span>
    <span>Tanya Admin</span>
  </a>
</div>