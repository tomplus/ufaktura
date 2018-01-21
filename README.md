# uFaktura (micro-faktura)

micro-Faktura to prosty serwis do wystawiania faktur, działający w przeglądarce.
Może zostać uruchomiony na serwerze hostingowym lub na komputerze stacjonarnym.
Pozwala wystawiać najprostsze faktury (max. 3 pozycje) dla podatników
zwolnionych z VAT (dawniej rachunki). Jest to narzędzie idealne dla osób prowadzących, 
działalność usługową dla niewielkiej liczby klientów.

Cechy charakterystyczne:

* do samodzielnego uruchomienia serwerze hostingowym z PHP i bazą danych
* możliwość uruchomienia na komputerze domowym
* prosty schemat bazy danych do ew. eksportu do dodatkowych narzedzi (np. Excel)
* faktura może zawierać maksymalnie 3 pozycje
* tylko faktury zwolnione z VAT
* generuje fakturę w formacie PDF do wydruku lub wysyłki przez mailem
* brak autoryzacji / autentykacji - zadbaj o to konfigurujac serwer HTTP
* projekt otwarty oparty o PHP i framework Yii - możesz dostosować do własnych potrzeb

# Instalacja

## Na serwerze z PHP i Postgresql (hosting)

To zalecany wariant instalacji, który umożliwia dostęp do serwisu przez przeglądarkę
internetową.

### Wymagania

* PHP 5.1 lub wyższej
* Baza danych - do wyboru: mysql, postgresql

### Instalacja

* Pobierz archiwum wydanej wersji (zakładka (Releases)[https://github.com/tomplus/ufaktura/releases])
* Rozpakuj do podkatalogu na serwerze hostingowym
* Zabezpiecz katalog (htaccess)
* Uruchamiaj skrypty z podkatalogu web/

### Konfiguracja

Konfiguracja dostępu do bazy znajduje się w pliku: `src/config/db.php`. Otwórz 
go w edytorze i zmień wartośc `dsn` w zależności od typu bazy danych

* MySQL

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'ufaktura',
    'password' => 'pass',
    'charset' => 'utf8',
];
```

* PostgreSQL

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic;user=root;password=pass',
    'username' => 'ufaktura',
    'password' => 'pass',
    'charset' => 'utf8',
];
```

* SQLite (zalecana tylko przy uruchamianiu na własnym komputerze, patrz niżej).

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:../db/ufaktura.db'
];
```

Po wejściu na adres strony i potwierdzeniu hasła dostępu, program jest gotowy do pracy.
Zanim wystawisz pierwszą fakturę, dodaj profil (swoje dane) oraz klientów.

## Na własnym komputerze (Docker)

Ten sposób instalacji pozwala uruchomić serwis na Twoim komputerze domowym lub
w firmie.

### Wymagania

* Linux, Windows, Mac
* Docker (https://docs.docker.com/engine/installation/)

### Instalacja

1. Pobranie obazu kontenera

```
docker pull
```

2. Przygotowanie bazy danych
```
```
gdzie `/moja/ściezka/z/baza/danych`

3. Uruchomienie

```
```

Serwis jest dostepny z przeglądarki pod adresem http://localhost:8080

### Konfiguracja

## Ze źródeł (dla ekspertów)

To sposób dla programistów, którzy chcą zmodyfikować serwis.

### Wymagania

* PHP 5.1 lub wyższy
* Pakiety dodatkowe (nazwy z systemu Ubuntu): php-mbstring php-xml php-pgsql php-sqlite3
* PHP Composer (https://getcomposer.org/download/)

### Instalacja

1. Instalacja zależności

```
./composer.phar install
```

2. Konfiguacja bazy danych sqlite
```
cd db
make
```

3. Uruchomienie serwera w PHP
```
./yii serve
```
4. Serwis jest dostępny pod adresem http://localhost:8080

# Licencja

Aplikacja udostępniona na licencji [MIT](https://pl.wikipedia.org/wiki/Licencja_MIT).
