<div class="max-w-md mx-auto">

  <!-- Search -->
  <div class="mb-4">
    <div class="relative">
      <svg xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24"
        class="absolute left-3 top-2.5 text-gray-400">
        <circle cx="11" cy="11" r="7" />
        <path stroke-linecap="round" d="m20 20-3.5-3.5" />
      </svg>

      <input
        type="text"
        id="search"
        placeholder="Cari Nama / No. HP pelanggan..."
        class="w-full border rounded-lg pl-10 pr-3 py-2 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
    </div>
  </div>

  <!-- List -->
  <div class="space-y-3">

    <?php foreach ($pelanggans as $pelanggan): ?>
      <a href="<?= site_url("Penjual/pelanggandetail/{$pelanggan->id}") ?>" class="block">
        <div data-hp="<?= $pelanggan->username ?>" data-nama="<?= $pelanggan->nama ?>" class="customer-item w-80 bg-white rounded-xl shadow p-4 flex justify-between items-center">
          <div>
            <h3 class="font-semibold text-lg">
              <?= $pelanggan->nama ?> <?= $pelanggan->username ?>
            </h3>

            <p class="text-sm text-gray-500">
              <b>terakhir datang:</b>
              <?= $pelanggan->lastVisit ?>
            </p>
          </div>

          <div class="text-blue-500 hover:text-blue-700">
            <svg xmlns="http://www.w3.org/2000/svg"
              width="32"
              height="32"
              fill="currentColor"
              viewBox="0 0 24 24">
              <path d="M10 17l5-5-5-5v10z" />
            </svg>
          </div>
        </div>
      </a>
    <?php endforeach; ?>

  </div>

</div>
<script type="text/javascript">
  const search = document.getElementById("search");

  search.addEventListener("keyup", function() {
    const keyword = this.value.toLowerCase();
    document.querySelectorAll(".customer-item").forEach(item => {
      const nama = (item.dataset.nama || "").toLowerCase();
      const hp = (item.dataset.hp || "").toLowerCase();
      if (nama.includes(keyword) || hp.includes(keyword)) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  });
</script>