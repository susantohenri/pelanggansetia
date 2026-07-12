<div class="flex flex-col gap-3">

  <div class="bg-white shadow-md rounded-lg p-2 w-90">
    <video id="qr-video"
      class="w-full rounded-lg border"
      playsinline></video>

    <div id="result"
      class="mt-4 p-3 bg-white rounded text-center font-semibold">
      Arahkan kamera ke QR Code
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
    class="mt-1 w-full flex items-center justify-center gap-2 bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
    <span class="material-icons">person_add</span>
    <span>Tambah Pelanggan</span>
  </a>
</div>