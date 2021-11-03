# Beni Oku
## _Blog Uygulaması_


## Kullanılan Teknolojiler
- Laravel
- Livewire
- Fortify

## Kurulum

```sh
git clone https://github.com/bilginnet/myblog.git
cd myblog
composer install
php artisan migrate
php artisan db:seed
php artisan serve
```
veya 
```sh
composer install
php artisan app:reset
php artisan serve
```

## Uygulama Hakkında

1. Rol Yönetici: Admin sayfasına girebilir ve tüm makaleyi listeler. Her makaleyi silebilir.
2. Rol Moderatör: Admin sayfasına girebilir ve tüm makaleyi listeler. Kendi makalesini silebilir.
3. Rol Yazar: Admin sayfasına girebilir ama yalnızca kendi makalesini listeler ve silebilir.
4. Rol Okuyucu (Varsayılan): Admin sayfasına giremez. Sadece puanlama yapabilir.
5. Gerekli Factory sınıfları oluşturuldu ve Database Seeder sınıfına eklendi.
6. Tüm rol kullanıcıları için tek ekran login yapıldı. 
7. Admin sayfasında kullanıcılar için parola değiştirme ve profil güncelleme ekranları yapıldı.
8. Admin sayfasında bulunan post listesi livewire ile yapıldı. Sayfa geçişleri ve silme işlemi anlık yapılıyor.
9. Aşağıdaki olaylar Policy ile kontrol edildi:
    - Kulanıcı rolü reader ise admin sayfasına giremiyor. Bu kontrol middleware yazılarak sağlandı.
    - Admin sayfasında eğer kullanıcı rolü author ise sadece kendi yazılarını görüyor ve değiştirebiliyor.
    - Admin sayfasında eğer kullanıcı moderator ise tüm listeyi görüyor sadece kendi yazdıklarını değiştirebiliyor.
    - Admin sayfasında kullanıcı admin ise tüm listeye müdahale edebiliyor.
10. Post/Show sayfasında oy verme işlemi yapıldı gerekli ilişki metotları oluşturuldu.
11. Yine Post/Show sayfasında ortalama avg belirttiğiniz gibi son %30’luk kısım 2 kat etkili ondan önceki 70% lik kısım 2 kat düşük olarak hesaplandı.
12. Yine Post/Show sayfasında önceki ve sonraki posta erişmek için gerekli linkler belirtildi.
