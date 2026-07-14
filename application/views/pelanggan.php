<div class="max-w-md mx-auto">

  <!-- Search -->
  <div class="mb-4">
    <div class="relative">
      <span class="material-icons absolute left-3 top-2.5 text-gray-400">
        search
      </span>

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
      <a href="<?= site_url("Penjual/pelanggandetail/{$pelanggan->id}") ?>">
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

          <a class="text-blue-500 hover:text-blue-700">
            <span class="material-icons">
              chevron_right
            </span>
          </a>
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