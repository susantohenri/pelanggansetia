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
      <span class="material-icons text-base">add</span>
      <span>Kasih Poin</span>
    </a>
    <a href="<?= site_url("Penjual/redeem/{$md5pelanggan}") ?>"
      class="mt-3 w-full block text-center bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <span class="material-icons text-base">card_giftcard</span>
      <span>Kasih Hadiah</span>
    </a>
  </form>
</div>