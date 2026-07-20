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
        <svg xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="text-blue-600">
          <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z" />
        </svg>
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
        <svg xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="text-green-600">
          <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35L12 4.02 11.5 3.35C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.1 0-2 .9-2 2v2c0 .55.45 1 1 1h1v9c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-9h1c.55 0 1-.45 1-1V8c0-1.1-.9-2-2-2zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm6 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM5 8h14v2H5V8zm7 11H7v-7h5v7zm5 0h-3v-7h5v7z" />
        </svg>
      </div>
    </div>


    <!-- Pelanggan Setia -->
    <div class="bg-white rounded-xl shadow-md p-4 flex items-center justify-between">
      <div>
        <p class="text-sm text-gray-500">Pelanggan Setia</p>
        <h2 class="text-2xl font-bold text-yellow-600"><?= $this->session->userdata('pelanggansetia')['nama'] ?></h2>
        <p class="text-xs text-gray-400">
          Total poin dikumpulkan: <?= $this->session->userdata('pelanggansetia')['earn'] ?>
        </p>
      </div>

      <div class="bg-yellow-100 p-3 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="text-yellow-600">
          <path d="M19 5h-2V3H7v2H5c-1.1 0-2 .9-2 2v2c0 2.55 1.92 4.63 4.39 4.94C8.1 15.17 9.37 16.4 11 16.82V19H8v2h8v-2h-3v-2.18c1.63-.42 2.9-1.65 3.61-2.88C19.08 13.63 21 11.55 21 9V7c0-1.1-.9-2-2-2zM5 9V7h2v5.83C5.84 12.41 5 10.8 5 9zm14 0c0 1.8-.84 3.41-2 3.83V7h2v2z" />
        </svg>
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
    <svg xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      viewBox="0 0 24 24">
      <path stroke-linecap="round"
        stroke-linejoin="round"
        d="M12 12a4 4 0 100-8 4 4 0 000 8zm0 2c-4.418 0-8 1.79-8 4v2h16v-2c0-2.21-3.582-4-8-4z" />
      <path stroke-linecap="round"
        stroke-linejoin="round"
        d="M19 8v6M16 11h6" />
    </svg>
    <span>Pelanggan Baru</span>
  </a>

  <a href="https://wa.me/6281901088918?text=halo%20admin%20pelanggansetia.com"
    target="_blank"
    rel="noopener noreferrer"
    class="mt-1 w-full bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg"
      width="16"
      height="16"
      fill="none"
      stroke="currentColor"
      stroke-width="2"
      viewBox="0 0 24 24">
      <path stroke-linecap="round"
        stroke-linejoin="round"
        d="M21 11.5a8.38 8.38 0 01-9 8.5 8.38 8.38 0 01-4-.98L3 21l1.98-5A8.38 8.38 0 014 11.5a8.5 8.5 0 1117 0z" />
    </svg>
    <span>Tanya Admin</span>
  </a>
</div>