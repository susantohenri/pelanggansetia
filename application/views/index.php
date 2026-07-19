<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelanggansetia.com - <?= $page_title ?></title>
  <link rel="manifest" href="<?= base_url('manifest.json') ?>">
  <link href="<?= base_url('style.css') ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col h-screen">

  <!-- Header -->
  <header class="fixed top-0 left-0 w-full bg-white shadow-md p-4 text-center z-10">
    <a href="<?= base_url() ?>">
      <h1 class="text-2xl font-bold"><?= $header ?></h1>
    </a>
  </header>

  <!-- Login Form -->
  <main class="flex-1 flex items-center justify-center mt-16 mb-12 px-5 pt-5 pb-20">
    <?php include $page ?>
  </main>

  <!-- Bottom Navigation -->
  <nav class="fixed bottom-0 left-0 w-full bg-white border-t shadow-md flex justify-around py-2 z-10">
    <?php foreach ($menu as $index => $item): ?>
      <a href="<?= $item['href'] ?>" class="flex flex-col items-center text-<?= $index === $active_menu ? 'yellow' : 'gray' ?>-500">
        <span class="material-icons"><?= $item['icon'] ?></span>
        <span class="text-xs"><?= $item['label'] ?></span>
      </a>
    <?php endforeach; ?>
  </nav>

  <script type="text/javascript">
    if ('service-worker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('<?= base_url('service-worker.js') ?>')
          .then(reg => console.log('Service Worker terdaftar!', reg))
          .catch(err => console.error('Gagal daftar Service Worker:', err));
      });
    }
  </script>
</body>

</html>