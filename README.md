Phishing Simülasyonu: Öğrenciler için İş ve Staj Avantajları
Bu proje, üniversite öğrencilerinin iş ve staj bulma konusundaki zaaflarından yararlanarak, onların kişisel bilgilerini çalmayı hedefleyen bir phishing simülasyonudur. Proje, kullanıcıların phishing saldırılarına nasıl düşebileceklerini göstermeyi ve bu tür saldırılara karşı nasıl korunabileceklerini öğretmeyi amaçlamaktadır. Eğer kullanıcılar bu phishing senaryosuna düşerlerse, son sayfada hangi bilgilerin kritik olduğu, hangilerinin orta seviyede risk taşıdığı ve korunmak için neler yapmaları gerektiği gibi ipuçlarıyla karşılaşacaklardır.

Kullanılan Teknolojiler

Bu projede aşağıdaki teknolojiler kullanılmıştır:

HTML: Web sayfalarının yapısını oluşturmak için.
CSS: Web sayfalarının stil ve tasarımını düzenlemek için.
PHP: Sunucu tarafında işlemler yapmak ve dinamik içerik oluşturmak için.
JavaScript: Kullanıcı etkileşimlerini ve dinamik davranışları yönetmek için.
Nasıl Kullanılır?

Yerel Ortamda Çalıştırma

XAMPP Kurulumu: Eğer bilgisayarınızda XAMPP yüklü değilse, XAMPP resmi sitesinden indirip kurun.
XAMPP Başlatma: XAMPP'ı başlatın ve Apache ile MySQL servislerini çalıştırın.
Proje Dosyalarını Yükleme: Proje dosyalarını XAMPP'ın htdocs klasörüne kopyalayın.
Veritabanı Entegrasyonu: phpMyAdmin sayfasına gidin ve projeye ait veritabanını (database.sql gibi) içe aktarın.
Projeyi Çalıştırma: Tarayıcınızda http://localhost/proje-klasör-adı adresine giderek projeyi çalıştırın.
Public Web Sitesi Olarak Yayınlama

Eğer bu projeyi herkese açık bir web sitesi olarak yayınlamak istiyorsanız:

Hosting Seçimi: Bir hosting firmasından hosting hizmeti satın alın.
Dosyaları Yükleme: Hosting firmanızın size sağladığı FTP erişimi veya dosya yöneticisi aracılığıyla proje dosyalarını sunucuya yükleyin.
Veritabanı Kurulumu: Hosting panelinizdeki phpMyAdmin veya benzeri bir araçla veritabanını oluşturun ve projeye entegre edin.
Domain Ayarları: Eğer bir domain kullanıyorsanız, domain ayarlarını hosting panelinizden yapılandırın.
Proje Yapısı ve Kod Açıklamaları

Proje dosyalarında her bir bölümün ne işe yaradığı ve nasıl çalıştığı yorum satırlarıyla açıklanmıştır. Örneğin:

index.html: Kullanıcıların ilk karşılaştığı sayfa. Burada phishing senaryosu başlar.
style.css: Tüm sayfaların stil ve tasarımını içerir.
script.js: Kullanıcı etkileşimlerini yönetir.
process.php: Kullanıcıların girdiği bilgileri işler ve veritabanına kaydeder.
database.sql: Projenin kullandığı veritabanı yapısını içerir.
Eğer projeyi modifiye etmek isterseniz, yorum satırlarını takip ederek hangi kısımların ne işe yaradığını anlayabilir ve değişiklik yapabilirsiniz.

Katkıda Bulunma

Bu proje açık kaynaklıdır ve herkes katkıda bulunabilir. Eğer projeye katkıda bulunmak isterseniz:

Repository'yi forklayın.
Yeni bir branch oluşturun (git checkout -b feature/yeni-özellik).
Değişikliklerinizi yapın ve commit edin (git commit -m 'Yeni özellik eklendi').
Branch'inizi pushlayın (git push origin feature/yeni-özellik).
GitHub üzerinden bir Pull Request açın.
