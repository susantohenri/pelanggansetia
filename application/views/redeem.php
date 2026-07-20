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
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M20 6h-2.18c.11-.31.18-.65.18-1 0-1.66-1.34-3-3-3-1.05 0-1.96.54-2.5 1.35L12 4.02 11.5 3.35C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.1 0-2 .9-2 2v2c0 .55.45 1 1 1h1v9c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-9h1c.55 0 1-.45 1-1V8c0-1.1-.9-2-2-2zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm6 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM5 8h14v2H5V8zm7 11H7v-7h5v7zm5 0h-3v-7h5v7z" />
      </svg>
      <span>Tukar Poin</span>
    </button>
    <a href="<?= site_url() ?>"
      class="mt-3 w-full block text-center bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded flex items-center justify-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path d="M18.3 5.71 12 12l6.3 6.29-1.41 1.42L10.59 13.41 4.29 19.71 2.88 18.29 9.17 12 2.88 5.71 4.29 4.29l6.3 6.3 6.29-6.3z" />
      </svg>
      <span>Tidak</span>
    </a>
  </form>
</div>