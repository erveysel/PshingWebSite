<?php
// staj-basvurusu.php
require_once 'db.php'; // Veritabanı bağlantısı

// Form gönderildiyse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ajax ile gelen asıl form gönderimi ise
    if (isset($_POST['ajax_submit']) && $_POST['ajax_submit'] === 'true') {
        // Onay kutuları kontrol ediliyor; değerlerin "on" olduğundan emin oluyoruz
        $onay = $_POST['onay'] ?? '';
        $kvkk = $_POST['kvkk'] ?? '';

        if ($onay !== 'on' || $kvkk !== 'on') {
            echo json_encode(['success' => false, 'message' => "Lütfen formdaki onay kutularını işaretleyiniz."]);
            exit;
        } else {
            $adSoyad    = $_POST['ad_soyad'] ?? '';
            $email      = $_POST['email'] ?? '';
            $universite = $_POST['universite'] ?? '';
            $tcNo       = $_POST['tc_no'] ?? '';
            $anneKizlik = $_POST['anne_kizlik_soyadi'] ?? '';
            $ozet       = $_POST['ozet'] ?? '';
            $telNo      = $_POST['tel_no'] ?? '';
            $dogumTarihi = $_POST['dogum_tarihi'] ?? '';
            $dogumYeri  = $_POST['dogum_yeri'] ?? '';
            $adres      = $_POST['adres'] ?? '';
            $babaAdi    = $_POST['baba_adi'] ?? '';
            $anneAdi    = $_POST['anne_adi'] ?? '';
            $medeniHal  = $_POST['medeni_hal'] ?? '';
            $bankaAdi   = $_POST['banka_adi'] ?? '';
            

            // Başvuru tarihi
            $basvuruTarihi = date('Y-m-d H:i:s');

            try {
                $sql = "INSERT INTO staj_basvurulari 
                        (ad_soyad, email, universite, tc_no, anne_kizlik_soyadi, ozet, basvuru_tarihi,
                        tel_no, dogum_tarihi, dogum_yeri, adres, baba_adi, anne_adi, medeni_hal,
                        banka_adi)
                        VALUES 
                        (:ad_soyad, :email, :universite, :tc_no, :anne_kizlik_soyadi, :ozet, :basvuru_tarihi,
                        :tel_no, :dogum_tarihi, :dogum_yeri, :adres, :baba_adi, :anne_adi, :medeni_hal,
                        :banka_adi)";
                $stmt = $db->prepare($sql);
                $stmt->execute([
                    ':ad_soyad'            => $adSoyad,
                    ':email'               => $email,
                    ':universite'          => $universite,
                    ':tc_no'               => $tcNo,
                    ':anne_kizlik_soyadi'  => $anneKizlik,
                    ':ozet'                => $ozet,
                    ':basvuru_tarihi'      => $basvuruTarihi,
                    ':tel_no'              => $telNo,
                    ':dogum_tarihi'        => $dogumTarihi,
                    ':dogum_yeri'          => $dogumYeri,
                    ':adres'               => $adres,
                    ':baba_adi'            => $babaAdi,
                    ':anne_adi'            => $anneAdi,
                    ':medeni_hal'          => $medeniHal,
                    ':banka_adi'           => $bankaAdi,
                    
                ]);

                echo json_encode(['success' => true, 'redirect' => 'ps.html']);
                exit;
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'message' => "Veritabanına kaydedilirken hata oluştu: " . $e->getMessage()]);
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staj Başvurusu | Siber Güvenlik Şirketi</title>
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
                <li><a href="iletisim.php">İletişim</a></li>
                <li><a href="basvur.php" class="active">Başvur</a></li>
            </ul>
        </div>
    </nav>

    <div class="application-page">
        <!-- Form'a id ekledik -->
        <form id="applicationForm" action="" method="post" class="application-form">
            <h1><i class=""></i>Başvuru Formu</h1>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="ad_soyad">Ad Soyad</label>
                    <input type="text" id="ad_soyad" name="ad_soyad" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="universite">Üniversite</label>
                    <input type="text" id="universite" name="universite" required>
                </div>
                
                <div class="form-group">
                    <label for="bolum">Bölüm</label>
                    <input type="text" id="bolum" name="bolum" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tc_no">T.C. Kimlik Numarası</label>
                    <input type="text" id="tc_no" name="tc_no" required>
                </div>
                
                <div class="form-group">
                    <label for="anne_kizlik_soyadi">Anne Kızlık Soyadı'nın 1 ve 3. harfi</label>
                    <input type="text" id="anne_kizlik_soyadi" name="anne_kizlik_soyadi" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="tel_no">Telefon Numarası</label>
                    <input type="tel" id="tel_no" name="tel_no" required>
                </div>
                
                <div class="form-group">
                    <label for="dogum_tarihi">Doğum Tarihi</label>
                    <input type="date" id="dogum_tarihi" name="dogum_tarihi" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="dogum_yeri">Doğum Yeri</label>
                    <input type="text" id="dogum_yeri" name="dogum_yeri" required>
                </div>
                
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <textarea id="adres" name="adres" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="baba_adi">Baba Adı</label>
                    <input type="text" id="baba_adi" name="baba_adi" required>
                </div>
                
                <div class="form-group">
                    <label for="anne_adi">Anne Adı</label>
                    <input type="text" id="anne_adi" name="anne_adi" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="medeni_hal">Medeni Hal</label>
                    <select id="medeni_hal" name="medeni_hal" required>
                        <option value="">Seçiniz</option>
                        <option value="bekar">Bekar</option>
                        <option value="evli">Evli</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="banka_adi">Kullandığınız Banka'nın Adı</label>
                    <input type="text" id="banka_adi" name="banka_adi" required>
                </div>
            </div>



            <div class="form-group">
                <label for="ozet">Kendinizi Kısaca 2 Cümle ile Tanıtın</label>
                <textarea id="ozet" name="ozet" rows="5" required></textarea>
            </div>

            <!-- Onay kutuları ve bağlantılar -->
            <div class="form-group">
                <input type="checkbox" id="onay" name="onay" required value="on">
                <label for="onay">
                    Sadece okudum, onaylıyorum (<a href="onay.html" target="_blank">Detayları Görüntüle</a>)
                </label>
            </div>
            
            <div class="form-group">
                <input type="checkbox" id="kvkk" name="kvkk" required value="on">
                <label for="kvkk">
                    KVKK Aydınlatma Metnini okudum, kabul ediyorum (<a href="kvkk.html" target="_blank">Detayları Görüntüle</a>)
                </label>
            </div>
            
            <div class="form-submit">
                <button type="submit" class="submit-button">
                    <i class="fas fa-paper-plane"></i> Başvuruyu Gönder
                </button>
            </div>

            <div class="loader-message" style="display: none;">
                Lütfen bekleyiniz...
            </div>
        </form>
    </div>

    <!-- Pop-up Modal: Form gönderilince açılacak -->
    <div id="loadingModal" class="modal">
        <div class="modal-content">
            <div class="loading-animation">
                <div class="spinner"></div>
            </div>
            <p>Yoğunluk nedeniyle başvurunuz onaylanırken, lütfen bekleyiniz...</p>
            <div class="countdown">
                <span class="timer">10</span> saniye
            </div>
        </div>
    </div>

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
        
        // Form dosya yükleme için
        const fileInput = document.getElementById('cv');
        const fileLabel = document.querySelector('.file-input-label');
        const fileName = document.querySelector('.file-name');
        
        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                    fileLabel.classList.add('has-file');
                } else {
                    fileName.textContent = 'Dosya seçilmedi';
                    fileLabel.classList.remove('has-file');
                }
            });
        }
        
        // Form gönderimi işlemi
        const form = document.getElementById('applicationForm');
        const modal = document.getElementById('loadingModal');
        const timerElement = document.querySelector('.timer');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Standart form gönderimini engelle
            
            // Tüm form alanlarının kontrolü
            if (!form.checkValidity()) {
                // Form geçerli değilse, tarayıcı varsayılan doğrulama mesajlarını gösterir
                return;
            }
            
            // Modal'ı göster
            modal.classList.add('active');
            
            // Geri sayım başlat
            let timeLeft = 60;
            timerElement.textContent = timeLeft;
            
            const countdownInterval = setInterval(function() {
                timeLeft--;
                timerElement.textContent = timeLeft;
                
                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    
                    // Form verilerini al
                    const formData = new FormData(form);
                    formData.append('ajax_submit', 'true');
                    
                    // Ajax ile form gönderimi
                    fetch('staj-basvurusu.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Başarılı ise yönlendir
                            window.location.href = data.redirect;
                        } else {
                            // Hata durumunda
                            alert(data.message);
                            modal.classList.remove('active');
                        }
                    })
                    .catch(error => {
                        console.error('Hata:', error);
                        alert('Bir hata oluştu, lütfen tekrar deneyiniz.');
                        modal.classList.remove('active');
                    });
                }
            }, 1000);
        });
    });
    </script>
</body>
</html>
