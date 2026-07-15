<div class="flex flex-col gap-3">
  <div class="bg-white shadow-md rounded-lg p-6 w-80">
    <h1 class="text-center text-xl border-b mb-3 pb-2">Tukar Poin dg Hadiah</h1>
    <h1><b>Pelanggan: </b><?= $pelanggan['nama'] ?></h1>
    <h1><b>Pernah dapet hadiah: </b><?= $pelanggan['redeem'] ?>x</h1>
    <h1><b>Poin sekarang: </b><?= $pelanggan['poin'] ?></h1>
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

    <label class="text-center block mb-2 font-medium text-gray-700">
      Poin yang digunakan:
    </label>
    <input required name="nilai" type="text" placeholder="Nama Pelanggan" value="<?= $pelanggan['poin'] ?>"
      class="text-center w-full border rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

    <button type="submit" class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
      <span class="material-icons text-base">card_giftcard</span>
      <span>Berikan Hadiah</span>
    </button>
    <a href="<?= site_url() ?>"
      class="mt-3 w-full block text-center bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <span class="material-icons text-base">close</span>
      <span>Tidak</span>
    </a>
  </form>
</div>