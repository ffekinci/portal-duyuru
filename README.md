# portal-duyuru
KOUOSL Portal -  Duyuru Modülü

## Kurulum
Öncelikle portalın ana dizininde bulunan **composer.json** dosyasındaki **repositories** kısmına modülümüzün github linkini ekleyiniz:
```bash
 {
    "type": "vcs",
    "url": "https://github.com/ffekinci/portal-duyuru.git"
 }
````
Ardından modül sayfalarına erişebilmek için **backend/config/main.php** ve **frontend/config/main.php** dosyalarındaki **modules** kısmına şu kod bloğunu ekleyiniz:
```php
'duyuru' => [
            'class' => 'kouosl\duyuru\Module',
        ]
````

Bu değişikliklerin ardından yaptığımız değişikliklerin sisteme uygulanması için ssh üzerinde portalın bulunduğu dizine gelip şu kodları sırasıyla çalıştırıyoruz:
```bash
composer update
composer require kouosl/portal-duyuru:dev-master
````

Son olarak ilgili modül tablolarımızın oluşabilmesi için şu migration komutunu çalıştırınız:
```bash
php yii migrate --migrationPath=@vendor/kouosl/portal-duyuru/migrations
````

Frontend Sayfası:
>http://portal.kouosl/duyuru/duyuru

Backend Sayfaları:
>http://portal.kouosl/admin/duyuru/duyuru
>http://portal.kouosl/admin/duyuru/kategori


## Backend
![backend](https://user-images.githubusercontent.com/37485719/50739367-696bb380-11f0-11e9-886e-186d349df8a6.png)

Modülün backend kısmına sadece giriş yapan kullanıcılar erişebilmektedir. Ayrıca buradaki başlık ve buton kısımları translation kullanılarak oluşturulmuştur. Burada gridview aracılığıyla tüm duyurular listelenmektedir. Buradaki 1 ve 2 ile isimlendirilen alandaki veriler farklı tablolar arasında **HasOne ilişkisi** kullanılarak yapılmıştır. Bu kod bloğu aşağıda yer almaktadır.


![getfonksiyon](https://user-images.githubusercontent.com/37485719/50739397-d717df80-11f0-11e9-955f-6ab6b1a2e9d8.png)

![kategori](https://user-images.githubusercontent.com/37485719/50739435-67eebb00-11f1-11e9-9692-22a93485e32b.png)

Ayrıca backend kısmında duyuru oluştururken ArrayHelper yardımıyla id yerine kategori tablosundaki title verileri dropdownliste çekilmiştir.

![date](https://user-images.githubusercontent.com/37485719/50739529-fb74bb80-11f2-11e9-8f79-8098e7669f7d.png)


**Tarih seçimi içinde farklı bir modül kullanılmış olup bunun kurulumu için şu komutlar çalıştırılmalıdır:**

```bash
curl -sS https://getcomposer.org/installer | php
php composer.phar require kartik-v/yii2-widget-datetimepicker "dev-master"
```

Duyuru oluşturma kısmında duyuruyu oluşturan kişinin idsi ve oluşturulan tarih Controller üzerinden otomatik çekilmektedir.

![oto](https://user-images.githubusercontent.com/37485719/50739507-9faa3280-11f2-11e9-944d-dd512a7542d4.png)


## Frontend
![frontend](https://user-images.githubusercontent.com/37485719/50739538-0cbdc800-11f3-11e9-8ded-e908fc1697f2.png)
**Modülün frontend kısmında kullanıcı sadece bulunduğu tarih aralığını kapsayan duyuruları görüntüleyebilir.**


## Console
![console](https://user-images.githubusercontent.com/37485719/50739564-63c39d00-11f3-11e9-97c4-479dffdb26b0.gif)

Örnek olarak şu komutun çıktısını görüntüleyebilirsiniz.
```bash
php yii duyuru
```

## Api
Api kısmı için /api dizinine DuyuruControllerı oluşturulmuştur. Fakat bu kısımda portal sisteminden kaynaklı hata ile karşılaşılmıştır.


## Translation (Çeviri)
![translation](https://user-images.githubusercontent.com/37485719/50739631-4ba04d80-11f4-11e9-9225-ca17938d321f.png)

Çeviri karşılıkları **messages\tr-TR** dizinindeki **duyuru.php** içinde yer almaktadır. Çeviri için şu komut kullanılmıştır:
```php
Module::t('duyuru','KOUOSL Announcement Module')
```

## Authorization (Yetkilendirme)
![auth](https://user-images.githubusercontent.com/37485719/50739686-b3ef2f00-11f4-11e9-9125-16ff1f0f0b0c.png)

Yukarıda backend kısmındaki authorization örneğini görüntülemektesiniz. Bu yetkilendirmeyi Controller içerisindeki behavior kısmından yapmaktayız. Burada duyuruların listelendiği anasayfaya tüm kullanıcıların, diğer sayfalara ise giriş yapmamış kullanıcıların erişebilmesi şeklinde ayarlanmıştır.


