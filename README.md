# WFR - Team 9
Grundsätzlich benötigen Sie eine Standard-LAMP-Einrichtung mit einigen zusätzlichen Abhängigkeiten und Konfigurationen.
Im Produktionsbetrieb wurde XAMPP unter Windows benutzt. Hierfür muss eine Verbindung zu Apache und MYSQL aufgebaut werden.
Die .env.example-Datei muss in .env umbenannt werden. Es muss eine lokale Datenbank angelegt werden und der Datenbankname, sowie die MYSQL-Zugangsdaten müssen in der .env eingetragen werden.
Zusätzlich wird composer benötigt. Composer ist ein Tool für die Abhängigkeitsverwaltung in PHP-Anwendungen und kann, abhängig vom Betriebssystem auf der folgenden Seite installiert werden: https://getcomposer.org/download/.
Zum Schluss wird noch Node.js mit npm benötigt. 

Hinweis: 
Wichtig! Da sich einige Abhängigkeiten zwischen der ersten und der zweiten Kombination unterscheiden, sollte das Projekt für jede Kombination einzelnt geclont und die obenstehenden Schritte im dazugehörigen Branch ausgeführt werden. Sonst werden Abhänigkeiten installiert, die bei Projektausführung nicht gefunden werden, wodurch es zu Fehlern kommen kann.

Die Kombination mit Blade und Laravel befindet sich im Master-Branch und eine Kopie davon zu Übersichtlichkeitszwecken in Kombination-1-Blade+Laravel-Branch.
Die Kombination mit Vue und Laravel befindet sich nur im Branch Kombination-2-Vue+Laravel.

Der Branch old-Master war ursprünglich der Master. Aufgrund von Konflikten durch eine Fehlerhafte Tailwind-Installation musste das Projekt allerdings relativ früh neu aufgesetzt werden.


Die folgenden Schritte sollten auch in der angegebenen Reihenfolge ausgeführt werden:
## Project setup
```
composer install
npm install
```

### Creates Database-Migrations $ Database-Seeds
```
php artisan migrate
php artisan db:seed
```

### Creates Key
```
php artisan key:generate
```

Dieses SweetAlert-Extension wird nur für die Blade Kombination gebraucht. Die beiden Befehle müssen für die Vue-Kombination nicht ausgeführt werden. 
### Publish Sweetalert-Extension
```
php artisan sweetalert:publish
php artisan vendor:publish --provider=" Gloudemans\Shoppingcart\ShoppingcartServiceProvider" --tag="config"
```

### Starting Laravel development server 
```
php artisan serve
```
