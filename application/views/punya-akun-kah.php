<form class="bg-white shadow-md rounded-lg p-6 w-80" method="POST" action="">
  <input type="hidden" name="token" value="<?= $token ?>">

  <h1 class="mb-5 text-2xl text-center">sudah punya akun pelanggansetia.com?</h1>

  <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">
    Belum
  </button>

  <a href="<?= site_url('Pengunjung/signin') ?>"
    class="mt-3 w-full block text-center bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">
    Sudah
  </a>
</form>