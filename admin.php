<?php
date_default_timezone_set("Asia/Jakarta");

// =============================
// SIRENDESK ADMIN DATA
// =============================

// File counter dari fitur Clients Landing Page Performance.
$counterFile = __DIR__ . "/client_counter.txt";

// File data pesan masuk dari form website.
$leadsFile = __DIR__ . "/leads.json";

// =============================
// DELETE ALL LEADS ACTION
// =============================
// Jika tombol Delete All diklik, semua data pesan masuk dikosongkan,
// total pesan masuk kembali 0, dan client counter juga kembali 0.
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_all_leads"])) {
    file_put_contents($leadsFile, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    file_put_contents($counterFile, "0");

    header("Location: admin.php?deleted=1");
    exit;
}

// Membaca jumlah client/leads dari file counter.
$clientCount = 0;

if (file_exists($counterFile)) {
    $clientCount = (int) trim(file_get_contents($counterFile));
}

// Membaca data pesan masuk.
$leads = [];

if (file_exists($leadsFile)) {
    $leads = json_decode(file_get_contents($leadsFile), true);

    if (!is_array($leads)) {
        $leads = [];
    }
}

$totalLeads = count($leads);

// Informasi sederhana website.
$domain = $_SERVER["HTTP_HOST"] ?? "sirendesk.web.id";
$currentDate = date("d F Y");
$currentTime = date("H:i");

// Daftar file penting website.
$files = [
    "index.php",
    "style.css",
    "script.js",
    "admin.php",
    "save-lead.php",
    "client-counter.php",
    "client_counter.txt",
    "leads.json",
    "sirendesk-logo.png"
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SirenDesk Admin</title>

  <!-- Bootstrap CSS -->
  <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet"
  />

  <!-- Bootstrap Icons -->
  <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
  />

  <style>
    :root {
      --cyan-light: #A7EBF2;
      --cyan: #54ACBF;
      --blue: #26658C;
      --navy: #023859;
      --dark: #011C40;
      --white-soft: #F6FAFD;
      --glass: rgba(255, 255, 255, 0.08);
      --border: rgba(167, 235, 242, 0.18);
    }

    * {
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      margin: 0;
      font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: var(--white-soft);
      background:
        radial-gradient(circle at top left, rgba(167, 235, 242, 0.28), transparent 32%),
        radial-gradient(circle at bottom right, rgba(84, 172, 191, 0.22), transparent 35%),
        linear-gradient(135deg, var(--dark), var(--navy), #011225);
    }

    a {
      text-decoration: none;
    }

    .admin-shell {
      width: min(1120px, 92%);
      margin: 0 auto;
      padding: 32px 0;
    }

    .admin-nav {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 32px;
      padding: 18px 20px;
      border: 1px solid var(--border);
      border-radius: 24px;
      background: rgba(1, 28, 64, 0.72);
      backdrop-filter: blur(18px);
      box-shadow: 0 24px 70px rgba(0, 0, 0, 0.22);
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--white-soft);
      font-weight: 800;
      letter-spacing: -0.03em;
    }

    .brand img {
      width: 42px;
      height: 42px;
      object-fit: contain;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.05);
    }

    .admin-badge {
      padding: 8px 14px;
      border-radius: 999px;
      color: var(--cyan-light);
      background: rgba(167, 235, 242, 0.08);
      border: 1px solid var(--border);
      font-size: 14px;
    }

    .visit-btn {
      border: none;
      border-radius: 999px;
      padding: 10px 18px;
      font-weight: 700;
      color: var(--dark);
      background: linear-gradient(135deg, var(--cyan-light), var(--cyan));
      box-shadow: 0 16px 40px rgba(84, 172, 191, 0.25);
      transition: 0.25s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .visit-btn:hover {
      transform: translateY(-2px);
      color: var(--dark);
      box-shadow: 0 20px 50px rgba(84, 172, 191, 0.35);
    }

    .delete-all-btn {
      border: 1px solid rgba(255, 180, 180, 0.35);
      border-radius: 999px;
      padding: 10px 16px;
      font-weight: 800;
      color: #ffb4b4;
      background: rgba(255, 180, 180, 0.08);
      transition: 0.25s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .delete-all-btn:hover {
      background: rgba(255, 180, 180, 0.16);
      color: #ffd0d0;
      transform: translateY(-2px);
    }

    .section-title {
      margin-bottom: 24px;
    }

    .section-title .eyebrow {
      color: var(--cyan-light);
      font-weight: 800;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      font-size: 13px;
      margin-bottom: 8px;
    }

    .section-title h1 {
      font-size: clamp(32px, 5vw, 58px);
      font-weight: 950;
      letter-spacing: -0.06em;
      line-height: 1;
      margin-bottom: 14px;
    }

    .section-title p {
      color: rgba(246, 250, 253, 0.72);
      max-width: 720px;
      margin: 0;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      margin: 28px 0;
    }

    .stat-card,
    .info-card,
    .file-card,
    .lead-card {
      border: 1px solid var(--border);
      border-radius: 24px;
      background: var(--glass);
      backdrop-filter: blur(18px);
      box-shadow: 0 18px 60px rgba(0, 0, 0, 0.20);
    }

    .stat-card {
      padding: 24px;
    }

    .stat-card .icon {
      width: 42px;
      height: 42px;
      display: grid;
      place-items: center;
      border-radius: 14px;
      background: rgba(167, 235, 242, 0.12);
      color: var(--cyan-light);
      margin-bottom: 16px;
    }

    .stat-card strong {
      display: block;
      font-size: 38px;
      line-height: 1;
      font-weight: 950;
      letter-spacing: -0.05em;
      color: var(--white-soft);
    }

    .stat-card span {
      display: block;
      margin-top: 8px;
      color: rgba(246, 250, 253, 0.68);
      font-size: 14px;
    }

    .main-grid {
      display: grid;
      grid-template-columns: 1.35fr 0.65fr;
      gap: 18px;
      align-items: start;
    }

    .info-card,
    .file-card,
    .lead-card {
      padding: 26px;
    }

    .info-card h2,
    .file-card h2,
    .lead-card h2 {
      font-weight: 900;
      letter-spacing: -0.04em;
      margin-bottom: 18px;
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      gap: 18px;
      padding: 14px 0;
      border-bottom: 1px solid rgba(167, 235, 242, 0.12);
    }

    .info-row:last-child {
      border-bottom: none;
    }

    .info-row span {
      color: rgba(246, 250, 253, 0.62);
    }

    .info-row strong {
      text-align: right;
      color: var(--white-soft);
    }

    .file-list {
      display: grid;
      gap: 10px;
    }

    .file-item {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      padding: 12px 14px;
      border-radius: 16px;
      background: rgba(255, 255, 255, 0.05);
      color: rgba(246, 250, 253, 0.75);
    }

    .file-item .ok {
      color: var(--cyan-light);
      font-weight: 800;
    }

    .file-item .missing {
      color: #ffb4b4;
      font-weight: 800;
    }

    .note-box {
      margin-top: 18px;
      padding: 18px;
      border-radius: 20px;
      background: rgba(167, 235, 242, 0.08);
      border: 1px solid var(--border);
      color: rgba(246, 250, 253, 0.75);
    }

    .warning-box {
      margin-top: 18px;
      padding: 18px;
      border-radius: 20px;
      background: rgba(255, 180, 180, 0.08);
      border: 1px solid rgba(255, 180, 180, 0.22);
      color: rgba(246, 250, 253, 0.78);
    }

    .lead-card {
      margin-top: 18px;
    }

    .lead-header {
      display: flex;
      justify-content: space-between;
      gap: 16px;
      align-items: center;
      margin-bottom: 18px;
    }

    .lead-count {
      padding: 8px 14px;
      border-radius: 999px;
      background: rgba(167, 235, 242, 0.1);
      border: 1px solid var(--border);
      color: var(--cyan-light);
      font-weight: 800;
      font-size: 14px;
      white-space: nowrap;
    }

    .table {
      --bs-table-bg: rgba(255, 255, 255, 0.04);
      --bs-table-color: var(--white-soft);
      --bs-table-border-color: rgba(167, 235, 242, 0.14);
      --bs-table-hover-bg: rgba(167, 235, 242, 0.08);
      --bs-table-hover-color: var(--white-soft);
      border-radius: 18px;
      overflow: hidden;
      margin-bottom: 0;
    }

    .table thead th {
      color: var(--cyan-light);
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      border-bottom: 1px solid rgba(167, 235, 242, 0.2);
      white-space: nowrap;
    }

    .table td {
      color: rgba(246, 250, 253, 0.82);
      vertical-align: top;
    }

    .message-cell {
      max-width: 360px;
      white-space: normal;
      line-height: 1.5;
    }

    @media (max-width: 900px) {
      .stats-grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .main-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 560px) {
      .admin-nav,
      .lead-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .stats-grid {
        grid-template-columns: 1fr;
      }

      .info-row {
        flex-direction: column;
        gap: 4px;
      }

      .info-row strong {
        text-align: left;
      }
    }
  </style>
</head>
<body>

  <div class="admin-shell">
    <header class="admin-nav">
      <a href="index.php" class="brand">
        <img src="sirendesk-logo.png" alt="SirenDesk Logo" />
        <span>SirenDesk Admin</span>
      </a>

      <div class="d-flex align-items-center gap-2 flex-wrap">
        <span class="admin-badge">
          <i class="bi bi-shield-check me-1"></i>
          Admin Overview
        </span>
        <a href="index.php" class="visit-btn">
          <i class="bi bi-globe2"></i>
          Lihat Website
        </a>
      </div>
    </header>

    <section class="section-title">
      <p class="eyebrow">SirenDesk Control Panel</p>
      <h1>Dashboard sederhana untuk memantau website.</h1>
      <p>
        Halaman ini menampilkan ringkasan awal SirenDesk: jumlah pesan masuk,
        status file utama, informasi domain, dan data leads dari form website.
      </p>
    </section>

   <?php if (isset($_GET["deleted"])): ?>
      <div 
        class="alert alert-success alert-dismissible fade show" 
        role="alert" 
        style="border-radius: 18px;"
      >
        Semua data pesan masuk berhasil dikosongkan.

        <button 
          type="button" 
          class="btn-close" 
          data-bs-dismiss="alert" 
          aria-label="Close">
        </button>
      </div>
    <?php endif; ?>

    <section class="stats-grid">
      <div class="stat-card">
        <div class="icon"><i class="bi bi-person-lines-fill"></i></div>
        <strong><?= $totalLeads; ?></strong>
        <span>Total Pesan Masuk</span>
      </div>

      <div class="stat-card">
        <div class="icon"><i class="bi bi-whatsapp"></i></div>
        <strong><?= $clientCount; ?></strong>
        <span>Clients / Leads Counter</span>
      </div>

      <div class="stat-card">
        <div class="icon"><i class="bi bi-window-stack"></i></div>
        <strong>1</strong>
        <span>Website Active</span>
      </div>

      <div class="stat-card">
        <div class="icon"><i class="bi bi-check2-circle"></i></div>
        <strong>Live</strong>
        <span>Project Status</span>
      </div>
    </section>

    <section class="main-grid">
      <div class="info-card">
        <h2>Informasi Website</h2>

        <div class="info-row">
          <span>Brand</span>
          <strong>SirenDesk</strong>
        </div>

        <div class="info-row">
          <span>Domain Aktif</span>
          <strong><?= htmlspecialchars($domain); ?></strong>
        </div>

        <div class="info-row">
          <span>Jenis Website</span>
          <strong>Digital Agency Landing Page</strong>
        </div>

        <div class="info-row">
          <span>Layanan Utama</span>
          <strong>Website, Landing Page, Canva Template, Social Media, Ads</strong>
        </div>

        <div class="info-row">
          <span>Tanggal</span>
          <strong><?= $currentDate; ?></strong>
        </div>

        <div class="info-row">
          <span>Jam Server</span>
          <strong><?= $currentTime; ?> WIB</strong>
        </div>

        <div class="note-box">
          <strong>Catatan:</strong>
          data pesan masuk membaca file <b>leads.json</b>.
          Setiap user mengirim form dari halaman utama, datanya akan masuk ke tabel admin ini.
        </div>

        <div class="warning-box">
          <strong>Reminder:</strong>
          halaman ini belum memakai login. Kalau website sudah dipakai serius,
          sebaiknya halaman admin diberi password agar tidak bisa dilihat publik.
        </div>
      </div>

      <div class="file-card">
        <h2>Status File</h2>

        <div class="file-list">
          <?php foreach ($files as $file): ?>
            <?php $exists = file_exists(__DIR__ . "/" . $file); ?>

            <div class="file-item">
              <span><?= htmlspecialchars($file); ?></span>

              <?php if ($exists): ?>
                <span class="ok">Ada</span>
              <?php else: ?>
                <span class="missing">Belum ada</span>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="note-box">
          Kalau ada file yang “Belum ada”, upload file tersebut ke folder yang sama dengan <b>admin.php</b>.
        </div>
      </div>
    </section>

    <section class="lead-card">
      <div class="lead-header">
        <div>
          <h2>Data Pesan Masuk</h2>
          <p class="mb-0" style="color: rgba(246, 250, 253, 0.68);">
            Data ini berasal dari form kontak di halaman utama SirenDesk.
          </p>
        </div>

        <div class="d-flex align-items-center gap-2 flex-wrap">
          <span class="lead-count">
            <?= $totalLeads; ?> Pesan
          </span>

          <form method="POST" onsubmit="return confirm('Yakin ingin menghapus semua data pesan masuk dan reset counter ke 0?');">
            <button type="submit" name="delete_all_leads" class="delete-all-btn">
              <i class="bi bi-trash3"></i>
              Delete All
            </button>
          </form>
        </div>
      </div>

      <?php if (empty($leads)): ?>
        <div class="note-box">
          Belum ada pesan masuk dari form website.
        </div>
      <?php else: ?>
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kebutuhan</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Jam</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($leads as $index => $lead): ?>
                <tr>
                  <td><?= $index + 1; ?></td>
                  <td><?= htmlspecialchars($lead["name"] ?? "-"); ?></td>
                  <td><?= htmlspecialchars($lead["service"] ?? "-"); ?></td>
                  <td class="message-cell"><?= htmlspecialchars($lead["message"] ?? "-"); ?></td>
                  <td><?= htmlspecialchars($lead["date"] ?? "-"); ?></td>
                  <td><?= htmlspecialchars($lead["time"] ?? "-"); ?> WIB</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>