<?php
// index.php
require_once 'db.php'; // Veritabanı bağlantısını dahil et

// Ziyaretçi IP adresini al
$ip = $_SERVER['REMOTE_ADDR']; // Proxy kullanıyorsa doğru IP olmayabilir

// Ziyaret tarihini al
$visitDate = date('Y-m-d H:i:s');

// IP adresini ve ziyaret tarihini veritabanına kaydet
try {
    $sql = "INSERT INTO ziyaretciler (ip_address, visit_date) VALUES (:ip, :visit_date)";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':ip'         => $ip,
        ':visit_date' => $visitDate
    ]);
} catch (PDOException $e) {
    echo "Ziyaretçi kaydı hatası: " . $e->getMessage();
}

// Daha sonra normal HTML içerik:
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa | Siber Güvenlik Şirketi</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
   <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="index.php">Siber Academy</a>
            </div>
            <div class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="active">Anasayfa</a></li>
                <li><a href="index.php#hakkimizda">Hakkımızda</a></li>
                <li><a href="iletisim.php">İletişim</a></li>
                <li><a href="basvur.php">Başvur</a></li>
            </ul>
        </div>
    </nav>
    <header class="hero-section">
        <h1>Yeni Nesil Siber Güvenlik Çözümleri</h1>
        <p>Dijital varlıklarınızı korumak için en gelişmiş teknolojileri kullanıyoruz</p>
        <div class="hero-buttons">
            <a href="#hizmetler" class="btn primary">Hizmetlerimiz</a>
            <a href="basvur.php" class="btn secondary">Başvurular</a>
        </div>
    </header>

    <main>
        <section class="about-section reveal" id="hakkimizda">
            <div class="about-content">
                <div class="about-text">
                    <h2>Hakkımızda</h2>
                    <p>Siber güvenlik alanında uzman kadromuzla, işletmenizin dijital varlıklarını korumak için en son teknolojileri kullanıyoruz. 1 yılı aşkın tecrübemizle, güvenliğiniz bizim önceliğimizdir.</p>
                </div>
                <div class="about-stats">
                    <div class="stat">
                        <h3>200+</h3>
                        <p>Mutlu Müşteri</p>
                    </div>
                    <div class="stat">
                        <h3>500+</h3>
                        <p>Tamamlanan Proje</p>
                    </div>
                    <div class="stat">
                        <h3>24/7</h3>
                        <p>Teknik Destek</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="intro-section" id="hizmetler">
            <h2>Hizmetlerimiz</h2>
            <div class="services-grid">
                <div class="service-card reveal" data-service="penetration">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Sızma Testleri</h3>
                    <p>Sistemlerinizin güvenlik açıklarını profesyonel ekibimizle tespit ediyoruz.</p>
                </div>
                <div class="service-card reveal" data-service="firewall">
                    <i class="fas fa-lock"></i>
                    <h3>Güvenlik Duvarı Çözümleri</h3>
                    <p>En güncel firewall teknolojileri ile ağınızı koruyoruz.</p>
                </div>
                <div class="service-card reveal" data-service="consulting">
                    <i class="fas fa-user-shield"></i>
                    <h3>Siber Güvenlik Danışmanlığı</h3>
                    <p>Kurumunuza özel güvenlik stratejileri geliştiriyoruz.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Modals -->
    <div class="modal" id="modal-penetration">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-shield-alt"></i> Sızma Testleri</h2>
                <button class="close-modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>Detaylı sızma testi hizmetlerimiz şunları içerir:</p>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Web Uygulama Güvenlik Testleri</li>
                    <li><i class="fas fa-check-circle"></i> Ağ Güvenliği Testleri</li>
                    <li><i class="fas fa-check-circle"></i> Mobil Uygulama Güvenlik Testleri</li>
                    <li><i class="fas fa-check-circle"></i> Sosyal Mühendislik Testleri</li>
                </ul>
            </div>
            <div class="modal-footer">
                 <button class="modal-btn" onclick="window.location.href='iletisim.php'">Detaylı Bilgi Al</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-firewall">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-lock"></i> Güvenlik Duvarı Çözümleri</h2>
                <button class="close-modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>Modern güvenlik duvarı çözümlerimiz:</p>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Yeni Nesil Firewall Sistemleri</li>
                    <li><i class="fas fa-check-circle"></i> DDoS Koruma</li>
                    <li><i class="fas fa-check-circle"></i> VPN Çözümleri</li>
                    <li><i class="fas fa-check-circle"></i> Log Yönetimi</li>
                </ul>
            </div>
            <div class="modal-footer">
                 <button class="modal-btn" onclick="window.location.href='iletisim.php'">Detaylı Bilgi Al</button>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-consulting">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class="fas fa-user-shield"></i> Siber Güvenlik Danışmanlığı</h2>
                <button class="close-modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <p>Danışmanlık hizmetlerimiz:</p>
                <ul>
                    <li><i class="fas fa-check-circle"></i> Güvenlik Politikaları Oluşturma</li>
                    <li><i class="fas fa-check-circle"></i> Risk Analizi</li>
                    <li><i class="fas fa-check-circle"></i> Uyumluluk Değerlendirmesi</li>
                    <li><i class="fas fa-check-circle"></i> Güvenlik Eğitimleri</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="modal-btn" onclick="window.location.href='iletisim.php'">Detaylı Bilgi Al</button>
            </div>
        </div>
    </div>

    <!-- JavaScript eklentisi -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tüm service card'ları seç
        const serviceCards = document.querySelectorAll('.service-card');
        const modals = document.querySelectorAll('.modal');
        const closeButtons = document.querySelectorAll('.close-modal');
        
        // Mobil menü toggle
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function() {
                navMenu.classList.toggle('active');
                this.querySelector('i').classList.toggle('fa-bars');
                this.querySelector('i').classList.toggle('fa-times');
            });
        }

        // Her karta tıklama olayı ekle
        serviceCards.forEach(card => {
            card.addEventListener('click', function() {
                const serviceType = this.getAttribute('data-service');
                const modal = document.getElementById(`modal-${serviceType}`);
                modal.classList.add('active');
            });
        });

        // Kapatma düğmelerine tıklama olayı ekle
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.modal').classList.remove('active');
            });
        });

        // Modal dışına tıklandığında kapat
        modals.forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        });

        const dropdowns = document.querySelectorAll('.dropdown');
        
        dropdowns.forEach(dropdown => {
            const dropbtn = dropdown.querySelector('.dropbtn');
            const dropdownContent = dropdown.querySelector('.dropdown-content');
            
            // Tıklama olayını dinle
            dropbtn.addEventListener('click', function(e) {
                e.preventDefault(); // Link tıklamasını engelle
                
                // Diğer açık dropdownları kapat
                document.querySelectorAll('.dropdown-content').forEach(content => {
                    if (content !== dropdownContent) {
                        content.classList.remove('show');
                    }
                });
                
                // Tıklanan dropdownı aç/kapat
                dropdownContent.classList.toggle('show');
            });
            
            // Sayfa herhangi bir yerine tıklandığında dropdown'ı kapat
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdownContent.classList.remove('show');
                }
            });
        });
    });

    // Scroll Reveal
    function reveal() {
        const reveals = document.querySelectorAll('.reveal');
        
        reveals.forEach(element => {
            const windowHeight = window.innerHeight;
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < windowHeight - elementVisible) {
                element.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', reveal);

    // İlk yüklemede de çalıştır
    reveal();
    </script>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>İletişim</h3>
                <p><i class="fas fa-envelope"></i> info@siberacademy.co</p>
                <p><i class="fas fa-phone"></i> +90 521 451 3770 </p>
            </div>
            <div class="footer-section">
                <h3>Sosyal Medya</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Siber Güvenlik Şirketi. Tüm hakları saklıdır.</p>
        </div>
    </footer>
</body>
</html>
