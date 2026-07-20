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
    <h1 class="text-center text-xl border-b mb-3 pb-2">Pelanggan Anda</h1>
    <h1><b>Nama: </b><?= $pelanggan['nama'] ?></h1>
    <h1><b>Hadiah: </b><?= $pelanggan['redeem'] ?>x</h1>
    <h1><b>Poin: </b><?= $pelanggan['poin'] ?></h1>
    <a href="<?= site_url("Penjual/scanqrpelanggan/{$md5pelanggan}") ?>"
      class="mt-3 w-full block text-center bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
      </svg>
      <span>Kasih Poin</span>
    </a>
    <a href="<?= site_url("Penjual/redeem/{$md5pelanggan}") ?>"
      class="mt-3 w-full block text-center bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35L12 4.02 11.5 3.35C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.1 0-2 .9-2 2v2c0 .55.45 1 1 1h1v9c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-9h1c.55 0 1-.45 1-1V8c0-1.1-.9-2-2-2zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm6 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM5 8h14v2H5V8zm7 11H7v-7h5v7zm5 0h-3v-7h5v7z" />
      </svg>
      <span>Kasih Hadiah</span>
    </a>
  </form>
</div>