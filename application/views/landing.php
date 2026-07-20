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
        class="flex items-center justify-center gap-2 w-full rounded-2xl bg-amber-500 text-white text-lg font-bold text-center py-4 hover:bg-amber-600">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="22"
          height="22"
          viewBox="0 0 24 24"
          fill="currentColor">
          <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9 8v-1c0-2.76 4.03-4 9-4s9 1.24 9 4v1H6zM19 8h2v2h-2v2h-2v-2h-2V8h2V6h2v2z" />
        </svg>
        Daftar Gratis
      </a>

      <a href="<?= site_url('Pengunjung/signin') ?>"
        class="flex items-center justify-center gap-2 w-full rounded-2xl border-2 border-stone-300 bg-white text-stone-900 text-lg font-bold text-center py-4 hover:bg-stone-50">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="22"
          height="22"
          viewBox="0 0 24 24"
          fill="currentColor">
          <path d="M10 17l5-5-5-5v3H3v4h7v3zm9-14H5c-1.1 0-2 .9-2 2v3h2V5h14v14H5v-3H3v3c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
        </svg>
        Masuk
      </a>
    </div>
  </div>

  <article class="bg-white rounded-2xl shadow-sm border border-stone-200 p-4">
    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M4.5 4.5h6v6h-6zm9 0h6v6h-6zm-9 9h6v6h-6zm10.5 0h1.5m-1.5 3h3m-6-3h1.5m1.5 1.5h1.5m-3 3h6" />
      </svg>
    </div>
    <h3 class="text-lg font-extrabold mb-1">Scan cepat saat laris</h3>
    <p class="text-stone-700 leading-7">Cocok untuk antrian cepat. Penjual tinggal scan QR pelanggan atau lanjutkan
      transaksi manual saat perlu.</p>
  </article>

  <article class="bg-white rounded-2xl shadow-sm border border-stone-200 p-4">
    <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-800 flex items-center justify-center mb-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M6.75 7.5 8.25 5.25h7.5L17.25 7.5H19.5A1.5 1.5 0 0 1 21 9v9a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 18V9a1.5 1.5 0 0 1 1.5-1.5h2.25ZM12 16.5A3.75 3.75 0 1 0 12 9a3.75 3.75 0 0 0 0 7.5Z" />
      </svg>
    </div>
    <h3 class="text-lg font-extrabold mb-1">Pelanggan simpan QR sendiri</h3>
    <p class="text-stone-700 leading-7">Pelanggan tinggal scan QR penjual untuk dapetin QR pelanggan, lalu simpan di galeri atau login.</p>
  </article>

  <article class="bg-white rounded-2xl shadow-sm border border-stone-200 p-4">
    <div class="w-12 h-12 rounded-2xl bg-violet-100 text-violet-800 flex items-center justify-center mb-3">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 6v15m-7.5-9h15M5.25 6.75h13.5A.75.75 0 0 1 19.5 7.5v3a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75v-3a.75.75 0 0 1 .75-.75ZM9 6.75c-1.5 0-2.25-.75-2.25-1.875S7.5 3 9 3c1.5 0 3 2.25 3 3.75m0 0C12 5.25 13.5 3 15 3c1.5 0 2.25.75 2.25 1.875S16.5 6.75 15 6.75" />
      </svg>
    </div>
    <h3 class="text-lg font-extrabold mb-1">Kasih hadiah pelanggan jadi mudah</h3>
    <p class="text-stone-700 leading-7">Setiap selesai scan, penjual langsung bisa kasih hadiah pelanggan sesuai poin yg ditampilkan.</p>
  </article>

  <div class="bg-stone-900 text-white rounded-2xl p-5">
    <h3 class="text-xl font-extrabold mb-3">Dibuat untuk penjual yang butuh serba simpel</h3>
    <ul class="space-y-3 text-base leading-6">
      <li class="flex items-start gap-3">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="text-amber-300 shrink-0 mt-1">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
        </svg>
        <span>Tampilan kontras tinggi dan tombol besar.</span>
      </li>

      <li class="flex items-start gap-3">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="text-amber-300 shrink-0 mt-1">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
        </svg>
        <span>Bahasa mudah dipahami, tanpa istilah ribet.</span>
      </li>

      <li class="flex items-start gap-3">
        <svg xmlns="http://www.w3.org/2000/svg"
          width="32"
          height="32"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="text-amber-300 shrink-0 mt-1">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
        </svg>
        <span>Alur singkat supaya transaksi tetap cepat.</span>
      </li>
    </ul>
  </div>

  <div class="bg-white rounded-2xl shadow-sm border-2 border-green-200 p-5 text-left">
    <h3 class="text-xl font-extrabold mb-2">Butuh bantuan daftar?</h3>
    <p class="text-stone-700 leading-7 mb-4">Admin bisa bantu pendaftaran, instalasi, lupa pin,
      sampai jelasin cara pakai.</p>
    <a href="https://wa.me/6281901088918?text=halo%20admin%20pelanggansetia.com" target="_blank"
      rel="noopener noreferrer"
      class="flex items-center justify-center gap-2 w-full rounded-2xl bg-green-500 text-white text-lg font-bold text-center py-4 hover:bg-green-600">
      <svg xmlns="http://www.w3.org/2000/svg"
        width="22"
        height="22"
        viewBox="0 0 24 24"
        fill="currentColor">
        <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm0 14H6l-2 2V4h16v12z" />
      </svg>
      <span>Chat admin WhatsApp</span>
    </a>
  </div>
</section>