<div class="flex flex-col gap-3">
  <div class="bg-white shadow-md rounded-lg p-6 w-80">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <div id="qrcode"></div>
    <script type="text/javascript">
      <?php
      $md5merchant = md5($this->session->userdata('merchant'));
      $md5customer = md5($this->session->userdata('id'));
      ?>
      new QRCode(document.getElementById("qrcode"), {
        text: "<?= site_url("Authenticated/transaction/{$md5merchant}/{$md5customer}") ?>",
        width: 256,
        height: 256
      });
    </script>
  </div>

  <div class="mt-1 w-full flex items-center justify-center gap-2 bg-yellow-500 text-white py-2 px-4">
    <span class="material-icons">person</span>
    <span><?= $this->session->userdata('nama') ?></span>
  </div>
</div>