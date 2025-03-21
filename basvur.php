<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Başvuru | Siber Güvenlik Şirketi</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .application-page {
            padding: 7rem 2rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .application-header {
            text-align: center;
            margin-bottom: 4rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .application-header h1 {
            font-size: 3rem;
            color: #1a237e;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .application-header p {
            font-size: 1.3rem;
            color: #444;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .criteria-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
            margin-bottom: 4rem;
            padding: 0 1rem;
        }

        .criteria-card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .criteria-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #1a237e, #ff3b30);
        }

        .criteria-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .criteria-card h3 {
            color: #1a237e;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 1.5rem;
        }

        .criteria-card h3 i {
            color: #ff3b30;
            font-size: 2rem;
            background: rgba(255, 59, 48, 0.1);
            padding: 15px;
            border-radius: 50%;
        }

        .criteria-card ul {
            list-style: none;
            padding: 0;
        }

        .criteria-card ul li {
            margin-bottom: 1rem;
            padding-left: 2rem;
            position: relative;
            color: #555;
            line-height: 1.6;
        }

        .criteria-card ul li:before {
            content: "✓";
            color: #1a237e;
            position: absolute;
            left: 0;
            font-weight: bold;
            background: rgba(26, 35, 126, 0.1);
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .application-buttons {
            display: flex;
            justify-content: center;
            gap: 2.5rem;
            margin-top: 4rem;
            padding: 0 1rem;
        }

        .application-btn {
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.4s ease;
            font-size: 1.1rem;
            position: relative;
            overflow: hidden;
        }

        .internship-btn {
            background: linear-gradient(135deg, #1a237e, #283593);
            color: white;
        }

        .job-btn {
            background: linear-gradient(135deg, #ff3b30, #ff1744);
            color: white;
        }

        .application-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .application-btn:hover::before {
            left: 100%;
        }

        .application-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .application-btn i {
            font-size: 1.3rem;
        }

        @media (max-width: 768px) {
            .application-header h1 {
                font-size: 2.2rem;
            }

            .application-header p {
                font-size: 1.1rem;
            }

            .criteria-card {
                padding: 2rem;
            }

            .criteria-card h3 {
                font-size: 1.3rem;
            }

            .application-buttons {
                flex-direction: column;
                align-items: center;
                gap: 1.5rem;
            }

            .application-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
                padding: 1rem 2rem;
            }
        }
    </style>
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
        <div class="application-header">
            <h1><i class="fas fa-user-plus"></i> Kariyer Fırsatları</h1>
            <p>Siber güvenlik alanında kariyer yapmak isteyen yetenekli bireyleri arıyoruz. Aşağıdaki kriterlere uyuyorsanız, hemen başvurun!</p>
        </div>

        <div class="criteria-section">
            <div class="criteria-card">
                <h3><i class="fas fa-graduation-cap"></i> Stajyer Adayları İçin Kriterler</h3>
                <ul>
                    <li>Bilgisayar Mühendisliği, Yazılım Mühendisliği veya ilgili bölümlerde öğrenci olmak</li>
                    <li>En az 3. sınıf öğrencisi olmak</li>
                    <li>Python, Java veya C++ dillerinden en az birinde temel bilgi</li>
                    <li>Linux işletim sistemi deneyimi</li>
                    <li>İngilizce okuma ve yazma becerisi</li>
                    <li>Takım çalışmasına yatkın olmak</li>
                    <li>Haftada en az 3 gün staj yapabilecek olmak</li>
                </ul>
            </div>

            <div class="criteria-card">
                <h3><i class="fas fa-user-tie"></i> Uzman Adayları İçin Kriterler</h3>
                <ul>
                    <li>Bilgisayar Mühendisliği veya ilgili bölümlerden mezun olmak</li>
                    <li>En az 2 yıl siber güvenlik deneyimi</li>
                    <li>CEH, OSCP veya benzeri sertifikalara sahip olmak</li>
                    <li>Penetrasyon testi deneyimi</li>
                    <li>Güvenlik açığı analizi ve raporlama tecrübesi</li>
                    <li>Proje yönetimi becerileri</li>
                    <li>Müşteri iletişimi ve sunum yetenekleri</li>
                </ul>
            </div>
        </div>

        <div class="application-buttons">
            <a href="staj-basvurusu.php" class="application-btn internship-btn">
                <i class="fas fa-graduation-cap"></i> Staj Başvurusu Yap
            </a>
            <a href="staj-basvurusu.php" class="application-btn job-btn">
                <i class="fas fa-user-tie"></i> İş Başvurusu Yap
            </a>
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
    });
    </script>
</body>
</html> 