<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    
    try {
        $sql = "INSERT INTO iletisim_mesajlari (name, email, subject, message, created_at)
                VALUES (:name, :email, :subject, :message, NOW())";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
    } catch (PDOException $e) {
        // Hata olsa bile gösterilmeyecek
    }
    
    $success_message = "Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim | Siber Güvenlik Şirketi</title>
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
                <li><a href="index.php">Anasayfa</a></li>
                <li><a href="index.php#hakkimizda">Hakkımızda</a></li>
                <li><a href="iletisim.php" class="active">İletişim</a></li>
                <li><a href="basvur.php">Başvur</a></li>
            </ul>
        </div>
    </nav>

    <div class="contact-page">
        <div class="contact-container">
            <div class="contact-info">
                <h2 class="contact-heading">
                    <i class="fas fa-map-marker-alt"></i>
                    İletişim Bilgileri
                </h2>
                
                <div class="contact-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="contact-info-text">
                        <h3>Adres</h3>
                        <p>Teknoloji Mahallesi, Siber Sokak No:1, 34000 İstanbul/Türkiye</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <i class="fas fa-phone"></i>
                    <div class="contact-info-text">
                        <h3>Telefon</h3>
                        <p>+90 (212) 212 3770</p>
                        <p>+90 (521) 451 3770</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <i class="fas fa-envelope"></i>
                    <div class="contact-info-text">
                        <h3>E-posta</h3>
                        <p>info@siberacademy.co</p>
                        <p>destek@siberacademy.xyz</p>
                    </div>
                </div>

                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3008.232948447939!2d28.97913611744384!3d41.03749997929945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab7650656bd63%3A0x8ca058b28c20b6c3!2zVGFrc2ltIE1leWRhbsSxLCBHw7xtw7zFn3N1eXUsIDM0NDM1IEJleW_En2x1L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1647682696252!5m2!1str!2str"
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="contact-form">
                <h2 class="contact-heading">
                    <i class="fas fa-envelope"></i>
                    Bize Ulaşın
                </h2>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Adınız Soyadınız</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-posta Adresiniz</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Konu</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Mesajınız</label>
                        <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="submit-button">
                            <i class="fas fa-paper-plane"></i> Mesaj Gönder
                        </button>
                    </div>

                    <?php if (isset($success_message)): ?>
                        <div class="success-message">
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($error_message)): ?>
                        <div class="error-message">
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <footer>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
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
    </script>
</body>
</html>
