# WFR - Team 9
Grundsätzlich benötigen Sie eine Standard-LAMP-Einrichtung mit einigen zusätzlichen Abhängigkeiten und Konfigurationen.
Im Produktionsbetrieb wurde XAMPP unter Windows benutzt. Hierfür muss eine Verbindung zu Apache und MYSQL aufgebaut werden.
Die .env.example-Datei muss in .env umbenannt werden. Es muss eine lokale Datenbank angelegt werden und der Datenbankname, sowie die MYSQL-Zugangsdaten müssen in der .env eingetragen werden.
Zusätzlich wird composer benötigt. Composer ist ein Tool für die Abhängigkeitsverwaltung in PHP-Anwendungen und kann, abhängig vom Betriebssystem auf der folgenden Seite installiert werden: https://getcomposer.org/download/.
Zum Schluss wird noch Node.js mit npm benötigt. 

Die folgenden Schritte sollten auch in der angegebenen Reihenfolge ausgeführt werden:
## Project setup
```
composer install
```

### Creates Database-Migrations $ Database-Seeds
```
php artisan migrate
php artisan db:seed
```

### Publish Sweetalert-Extension
```
php artisan sweetalert:publish

php artisan vendor:publish --provider=" Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="config"
```

### Starting Laravel development server 
```
php artisan serve
```