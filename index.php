<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SirenDesk - Digital Agency</title>

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

  <!-- Custom CSS SirenDesk -->
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <div class="site-bg"></div>

  <header class="navbar" id="navbar">
    <a href="#hero" class="brand" aria-label="SirenDesk Home">
      <img src="sirendesk-logo.png" alt="SirenDesk Logo" />
      <span>SirenDesk</span>
    </a>

    <nav class="nav-links" id="navLinks">
      <a href="#problem">Problem</a>
      <a href="#services">Services</a>
      <a href="#benefits">Benefits</a>
      <a href="#testimonials">Testimonial</a>
      <a href="#faq">FAQ</a>
    </nav>

    <a href="#contact" class="btn btn-primary">
      <i class="bi bi-chat-dots me-2"></i>
      Konsultasi Gratis
    </a>

    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu">
      <span></span><span></span><span></span>
    </button>
  </header>

  <main>
    <section class="hero section" id="hero">
      <div class="hero-content reveal">
        <p class="eyebrow">Digital Agency • Website • Landing Page • Ads</p>
        <h1>Bangun Bisnis yang Terlihat Profesional, Dipercaya, dan Siap Closing.</h1>
        <p class="subheadline">
          SirenDesk membantu bisnis masuk ke era digital dengan website & landing page berkonversi tinggi,
          desain social media yang konsisten, social media management, dan iklan Meta/TikTok yang lebih terarah.
        </p>

        <div class="hero-actions">
          <a class="btn btn-primary" href="#contact">Mulai Digitalisasi Bisnis</a>
          <a class="btn btn-secondary" href="#services">Lihat Layanan</a>
        </div>

        <div class="mini-proof" aria-label="Social proof awal">
          <div class="avatar-stack">
            <span></span><span></span><span></span>
          </div>
          <p>Dirancang untuk UMKM, creator, jasa lokal, brand online, dan bisnis yang ingin naik kelas.</p>
        </div>
      </div>

      <div class="hero-visual reveal delay-1">
        <div class="glass-card hero-card">
          <div class="hero-card-top">
            <div>
              <p>Conversion Dashboard</p>
              <h3>Landing Page Performance</h3>
            </div>
            <span class="status-dot">Live</span>
          </div>

          <div class="metric-grid">
            <div>
              <span>Leads</span>
              <strong>0</strong>
            </div>
            <div>
              <span>Campaign</span>
              <strong>0</strong>
            </div>
            <div>
              <span>Creative</span>
              <strong>0</strong>
            </div>
            <div>
              <span>Clients</span>
              <strong id="performanceClientCounter">0</strong>
            </div>
          </div>

          <div class="chart-bars" aria-hidden="true">
            <i style="height: 42%"></i>
            <i style="height: 65%"></i>
            <i style="height: 50%"></i>
            <i style="height: 78%"></i>
            <i style="height: 92%"></i>
            <i style="height: 70%"></i>
          </div>

          <div class="floating-badge badge-one">High-Converting Page</div>
          <div class="floating-badge badge-two">Modern Brand System</div>
        </div>
      </div>
    </section>

    <section class="social-proof section-sm reveal" aria-label="Social proof">
      <p>Platform digitalisasi untuk bisnis yang ingin tampil lebih proper di internet.</p>
      <div class="proof-row">
        <span>Website</span>
        <span>Landing Page</span>
        <span>Canva Template</span>
        <span>Social Media</span>
        <span>Meta Ads</span>
        <span>TikTok Ads</span>
      </div>
    </section>

    <section class="section problem" id="problem">
      <div class="section-heading reveal">
        <p class="eyebrow">Problem Identification</p>
        <h2>Banyak bisnis sebenarnya bagus, tapi kalah karena tampilannya belum meyakinkan.</h2>
        <p>
          Di era digital, customer sering menilai bisnis dari kesan pertama: website, landing page, konten, dan iklan.
          Kalau bagian itu berantakan, trust bisa turun sebelum mereka sempat beli.
        </p>
      </div>

      <div class="problem-grid">
        <article class="problem-card reveal">
          <span>01</span>
          <h3>Website belum profesional</h3>
          <p>Bisnis sudah jalan, tapi tampilan online masih terasa seadanya dan belum membangun kepercayaan.</p>
        </article>

        <article class="problem-card reveal delay-1">
          <span>02</span>
          <h3>Konten tidak konsisten</h3>
          <p>Feed social media terlihat acak, tidak punya arah visual, dan sulit membuat audience ingat brand.</p>
        </article>

        <article class="problem-card reveal delay-2">
          <span>03</span>
          <h3>Iklan belum terarah</h3>
          <p>Budget ads keluar, tapi pesan, audience, creative, dan landing page belum dibuat untuk closing.</p>
        </article>
      </div>
    </section>

    <section class="section offer" id="services">
      <div class="section-heading reveal">
        <p class="eyebrow">Penawaran</p>
        <h2>Satu partner digital untuk membangun sistem online bisnis kamu.</h2>
        <p>SirenDesk tidak cuma bikin desain yang cantik. Fokusnya adalah membuat aset digital yang rapi, jelas, dan punya arah bisnis.</p>
      </div>

      <div class="service-grid">
        <article class="service-card featured reveal">
          <div class="service-icon">✦</div>
          <h3>Website & Landing Page</h3>
          <p>Website company profile, landing page promo, dan halaman penawaran yang disusun dengan struktur konversi.</p>
          <ul>
            <li>Hero section yang kuat</li>
            <li>CTA jelas</li>
            <li>Responsive mobile</li>
            <li>Copywriting basic</li>
          </ul>
        </article>

        <article class="service-card reveal delay-1">
          <div class="service-icon">◆</div>
          <h3>Template Canva Social Media</h3>
          <p>Template feed, carousel, story, dan promo yang mudah diedit sendiri oleh tim bisnis.</p>
          <ul>
            <li>Brand color system</li>
            <li>Reusable template</li>
            <li>Format IG/TikTok friendly</li>
          </ul>
        </article>

        <article class="service-card reveal delay-2">
          <div class="service-icon">◈</div>
          <h3>Social Media Management</h3>
          <p>Pengelolaan konten agar brand terlihat hidup, konsisten, dan lebih dekat dengan target market.</p>
          <ul>
            <li>Content planning</li>
            <li>Caption direction</li>
            <li>Posting management</li>
          </ul>
        </article>

        <article class="service-card reveal delay-3">
          <div class="service-icon">⬢</div>
          <h3>Advertising</h3>
          <p>Setup dan pengelolaan Meta Ads & TikTok Ads dengan strategi creative, audience, dan funnel yang lebih terarah.</p>
          <ul>
            <li>Meta Ads</li>
            <li>TikTok Ads</li>
            <li>Campaign monitoring</li>
          </ul>
        </article>
      </div>
    </section>

    <section class="section features" id="features">
      <div class="section-heading reveal">
        <p class="eyebrow">Product Features</p>
        <h2>Apa saja yang akan kamu dapatkan?</h2>
      </div>

      <div class="feature-list">
        <div class="feature-item reveal">
          <span>01</span>
          <div>
            <h3>Struktur landing page berorientasi konversi</h3>
            <p>Headline, subheadline, problem, offer, benefit, trust, FAQ, dan CTA dibuat agar customer punya alasan untuk mengambil tindakan.</p>
          </div>
        </div>

        <div class="feature-item reveal delay-1">
          <span>02</span>
          <div>
            <h3>Desain modern dengan identitas brand</h3>
            <p>Visual dibuat clean, premium, dan konsisten agar bisnis kamu terlihat lebih serius di mata calon customer.</p>
          </div>
        </div>

        <div class="feature-item reveal delay-2">
          <span>03</span>
          <div>
            <h3>Mobile responsive</h3>
            <p>Karena mayoritas calon customer melihat bisnis lewat HP, halaman dibuat nyaman dibaca di berbagai ukuran layar.</p>
          </div>
        </div>

        <div class="feature-item reveal delay-3">
          <span>04</span>
          <div>
            <h3>CTA yang jelas dan mudah dihubungi</h3>
            <p>Tombol dan alur kontak dibuat simpel agar calon customer tidak bingung harus melakukan apa setelah tertarik.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section benefits" id="benefits">
      <div class="benefit-copy reveal">
        <p class="eyebrow">Product Benefits</p>
        <h2>Bukan sekadar online. Tapi online dengan arah yang jelas.</h2>
        <p>
          SirenDesk membantu bisnis kamu punya tampilan yang lebih dipercaya, komunikasi yang lebih rapi,
          dan jalur yang lebih mudah untuk mengubah pengunjung menjadi prospek.
        </p>
        <a href="#contact" class="btn btn-primary">Bicarakan Project Kamu</a>
      </div>

      <div class="benefit-grid">
        <div class="benefit-card reveal delay-1">
          <h3>Brand terlihat lebih premium</h3>
          <p>Customer lebih mudah percaya ketika bisnis punya visual dan halaman yang proper.</p>
        </div>

        <div class="benefit-card reveal delay-2">
          <h3>Pesan bisnis lebih jelas</h3>
          <p>Penawaran tidak lagi muter-muter. Calon customer paham kamu menjual apa dan kenapa mereka perlu peduli.</p>
        </div>

        <div class="benefit-card reveal delay-3">
          <h3>Tim lebih hemat waktu</h3>
          <p>Template, sistem konten, dan halaman digital membuat pekerjaan marketing lebih terstruktur.</p>
        </div>

        <div class="benefit-card reveal delay-4">
          <h3>Iklan punya tujuan</h3>
          <p>Ads tidak berdiri sendiri. Campaign diarahkan ke halaman dan pesan yang mendukung konversi.</p>
        </div>
      </div>
    </section>

    <section class="section trust" id="trust">
      <div class="trust-panel reveal">
        <div>
          <p class="eyebrow">Trust</p>
          <h2>Angka awal SirenDesk hari ini. Siap bertumbuh bareng client pertama.</h2>
          <p>Bagian ini bisa kamu update manual di file HTML saat SirenDesk berkembang.</p>
        </div>

        <div class="stats-grid">
          <div class="stat-card">
            <strong class="counter" data-target="0">0</strong>
            <span>Client Happy</span>
          </div>

          <div class="stat-card">
            <strong class="counter" data-target="0">0</strong>
            <span>Campaigns Managed</span>
          </div>

          <div class="stat-card">
            <strong class="counter" data-target="0">0</strong>
            <span>Website Built</span>
          </div>

          <div class="stat-card">
            <strong class="counter" data-target="0">0</strong>
            <span>Creative Assets</span>
          </div>
        </div>
      </div>
    </section>

    <section class="section testimonials" id="testimonials">
      <div class="section-heading reveal">
        <p class="eyebrow">Testimonial</p>
        <h2>Ruang testimoni untuk client pertama SirenDesk.</h2>
        <p>Sementara masih placeholder. Nanti bisa diganti dengan review asli setelah project pertama selesai.</p>
      </div>

      <div class="testimonial-grid">
        <article class="testimonial-card reveal">
          <div class="stars">★★★★★</div>
          <p>“SirenDesk membantu bisnis kami punya landing page yang lebih rapi dan mudah dipahami customer.”</p>
          <div class="client">
            <span></span>
            <div>
              <strong>Client Name</strong>
              <small>Business Owner</small>
            </div>
          </div>
        </article>

        <article class="testimonial-card reveal delay-1">
          <div class="stars">★★★★★</div>
          <p>“Desain social media jadi lebih konsisten, brand terlihat lebih serius, dan tim lebih mudah upload konten.”</p>
          <div class="client">
            <span></span>
            <div>
              <strong>Client Name</strong>
              <small>Marketing Lead</small>
            </div>
          </div>
        </article>

        <article class="testimonial-card reveal delay-2">
          <div class="stars">★★★★★</div>
          <p>“Campaign ads lebih terarah karena funnel dan pesan penawarannya dibuat lebih jelas dari awal.”</p>
          <div class="client">
            <span></span>
            <div>
              <strong>Client Name</strong>
              <small>Founder</small>
            </div>
          </div>
        </article>
      </div>
    </section>

    <section class="section process" id="process">
      <div class="section-heading reveal">
        <p class="eyebrow">How It Works</p>
        <h2>Proses kerja yang simpel, biar project cepat jalan.</h2>
      </div>

      <div class="process-grid">
        <div class="process-step reveal">
          <span>1</span>
          <h3>Discovery</h3>
          <p>Kita bahas bisnis, target customer, masalah utama, dan tujuan digital yang ingin dicapai.</p>
        </div>

        <div class="process-step reveal delay-1">
          <span>2</span>
          <h3>Strategy</h3>
          <p>Kita susun struktur halaman, arah visual, pesan brand, dan kebutuhan campaign.</p>
        </div>

        <div class="process-step reveal delay-2">
          <span>3</span>
          <h3>Execution</h3>
          <p>Website, template, konten, atau ads mulai dikerjakan dengan update progress yang jelas.</p>
        </div>

        <div class="process-step reveal delay-3">
          <span>4</span>
          <h3>Launch</h3>
          <p>Aset digital siap digunakan, dites, lalu dikembangkan sesuai kebutuhan bisnis.</p>
        </div>
      </div>
    </section>

    <section class="section faq" id="faq">
      <div class="section-heading reveal">
        <p class="eyebrow">FAQ</p>
        <h2>Pertanyaan yang sering muncul.</h2>
      </div>

      <div class="faq-list reveal">
        <div class="faq-item active">
          <button>Apa SirenDesk cocok untuk bisnis yang baru mulai?</button>
          <div class="faq-content">
            <p>Cocok. Justru aset digital yang rapi sejak awal bisa membantu bisnis terlihat lebih serius dan lebih mudah menjelaskan penawaran ke calon customer.</p>
          </div>
        </div>

        <div class="faq-item">
          <button>Apakah bisa hanya membuat landing page saja?</button>
          <div class="faq-content">
            <p>Bisa. Landing page bisa dibuat untuk promosi produk, jasa, event, lead generation, katalog, atau kebutuhan campaign ads.</p>
          </div>
        </div>

        <div class="faq-item">
          <button>Apakah template Canva bisa diedit sendiri?</button>
          <div class="faq-content">
            <p>Bisa. Template dibuat agar mudah dipakai ulang, jadi tim kamu bisa mengganti teks, foto, warna, dan elemen sesuai kebutuhan konten.</p>
          </div>
        </div>

        <div class="faq-item">
          <button>Apakah SirenDesk juga bisa bantu iklan?</button>
          <div class="faq-content">
            <p>Bisa. SirenDesk dapat membantu Meta Ads dan TikTok Ads mulai dari setup campaign, arahan creative, hingga monitoring dasar.</p>
          </div>
        </div>

        <div class="faq-item">
          <button>Berapa biaya jasanya?</button>
          <div class="faq-content">
            <p>Biaya menyesuaikan kebutuhan project. Kamu bisa mulai dari konsultasi dulu agar scope, timeline, dan estimasi budget lebih jelas.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="section contact" id="contact">
      <div class="contact-card reveal">
        <div>
          <p class="eyebrow">Call To Action</p>
          <h2>Siap bikin bisnis kamu terlihat lebih proper secara digital?</h2>
          <p>
            Mulai dari website, landing page, template Canva, social media, sampai ads.
            Kita rapikan digital presence bisnis kamu dari dasar.
          </p>
        </div>

        <form class="contact-form" id="contactForm">
          <label>
            Nama
            <input type="text" id="name" placeholder="Nama kamu" required />
          </label>

          <label>
            Kebutuhan
            <select id="service" required>
              <option value="">Pilih layanan</option>
              <option>Website / Landing Page</option>
              <option>Template Canva Social Media</option>
              <option>Social Media Management</option>
              <option>Meta Ads / TikTok Ads</option>
              <option>Konsultasi Digitalisasi Bisnis</option>
            </select>
          </label>

          <label>
            Pesan
            <textarea id="message" rows="4" placeholder="Ceritakan singkat kebutuhan bisnis kamu"></textarea>
          </label>

          <button type="submit" class="btn btn-primary">Kirim Pesan</button>

          <small>
            Pesan yang dikirim akan masuk ke halaman admin SirenDesk.
          </small>
        </form>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="footer-brand">
      <img src="sirendesk-logo.png" alt="SirenDesk Logo" />
      <div>
        <strong>SirenDesk</strong>
        <p>Digital agency for modern business.</p>
      </div>
    </div>

    <p>© <span id="year"></span> SirenDesk. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JavaScript -->
  <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  </script>

  <!-- Custom JavaScript SirenDesk -->
  <script src="script.js"></script>
</body>
</html>