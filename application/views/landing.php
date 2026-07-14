<section class="max-w-md mx-auto flex flex-col gap-4">
  <div class="bg-white rounded-2xl shadow-sm border-2 border-amber-200 p-5 text-left">
    <span
      class="inline-flex items-center rounded-full bg-amber-100 text-amber-900 font-semibold text-sm px-3 py-1 mb-3">
      Bikin pelanggan kamu dateng terus
    </span>
    <h2 class="text-3xl leading-tight font-extrabold mb-3">Loyalty sederhana tanpa cetak kupon</h2>
    <p class="text-stone-700 text-base leading-7 mb-4">Catat transaksi pelanggan, tampilkan QR kupon digital, lalu
      lihat siapa yang paling sering balik lagi.</p>
    <div class="grid gap-3">
      <a href="<?= site_url('Pengunjung/signuppenjual') ?>"
        class="block w-full rounded-2xl bg-amber-500 text-white text-lg font-bold text-center py-4 hover:bg-amber-600">Coba Gratis</a>
      <a href="<?= site_url('Pengunjung/signin') ?>"
        class="block w-full rounded-2xl border-2 border-stone-300 bg-white text-stone-900 text-lg font-bold text-center py-4 hover:bg-stone-50">Pakai Sekarang</a>
    </div>
  </div>

  <article class="bg-white rounded-2xl shadow-sm border border-stone-200 p-4">
    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-3">
      <span class="material-icons">qr_code_scanner</span>
    </div>
    <h3 class="text-lg font-extrabold mb-1">Scan cepat saat laris</h3>
    <p class="text-stone-700 leading-7">Cocok untuk antrian cepat. Penjual tinggal scan QR pelanggan atau lanjutkan
      transaksi manual saat perlu.</p>
  </article>

  <article class="bg-white rounded-2xl shadow-sm border border-stone-200 p-4">
    <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-800 flex items-center justify-center mb-3">
      <span class="material-icons">photo_camera</span>
    </div>
    <h3 class="text-lg font-extrabold mb-1">Pelanggan simpan QR sendiri</h3>
    <p class="text-stone-700 leading-7">Pelanggan tinggal scan QR penjual untuk dapetin QR pelanggan, lalu simpan di galeri atau login.</p>
  </article>

  <article class="bg-white rounded-2xl shadow-sm border border-stone-200 p-4">
    <div class="w-12 h-12 rounded-2xl bg-violet-100 text-violet-800 flex items-center justify-center mb-3">
      <span class="material-icons">redeem</span>
    </div>
    <h3 class="text-lg font-extrabold mb-1">Kasih hadiah pelanggan jadi mudah</h3>
    <p class="text-stone-700 leading-7">Setiap selesai scan, penjual langsung bisa kasih hadiah pelanggan sesuai poin yg ditampilkan.</p>
  </article>

  <div class="bg-stone-900 text-white rounded-2xl p-5">
    <h3 class="text-xl font-extrabold mb-3">Dibuat untuk penjual yang butuh serba simpel</h3>
    <ul class="space-y-3 text-base leading-6">
      <li class="flex gap-3"><span class="material-icons text-amber-300">check_circle</span><span>Tampilan kontras
          tinggi dan tombol besar.</span></li>
      <li class="flex gap-3"><span class="material-icons text-amber-300">check_circle</span><span>Bahasa mudah
          dipahami, tanpa istilah ribet.</span></li>
      <li class="flex gap-3"><span class="material-icons text-amber-300">check_circle</span><span>Alur singkat
          supaya transaksi tetap cepat.</span></li>
    </ul>
  </div>

  <div class="bg-white rounded-2xl shadow-sm border-2 border-green-200 p-5 text-left">
    <h3 class="text-xl font-extrabold mb-2">Butuh bantuan daftar?</h3>
    <p class="text-stone-700 leading-7 mb-4">Admin bisa bantu pendaftaran, instalasi, lupa pin,
      sampai jelasin cara pakai.</p>
    <a href="https://wa.me/6281901088918?text=halo%20admin%20pelanggansetia.com" target="_blank"
      rel="noopener noreferrer"
      class="block w-full rounded-2xl bg-green-500 text-white text-lg font-bold text-center py-4 hover:bg-green-600">Chat
      admin WhatsApp</a>
  </div>
</section>