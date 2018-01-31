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
* projekt otwarty oparty o PHP i framework Yii - możesz go łatwo dostosować do własnych potrzeb

# Instalacja

## Na serwerze z PHP i Postgresql (hosting)

To zalecany wariant instalacji, który umożliwia dostęp do serwisu przez przeglądarkę
internetową.

### Wymagania

* PHP 5.4 lub nowszy
* Baza danych - do wyboru: mysql, postgresql, sqlite.

### Instalacja

* Pobierz archiwum wydanej wersji (zakładka [Releases](https://github.com/tomplus/ufaktura/releases))
* Rozpakuj do podkatalogu na serwerze hostingowym
* Zabezpiecz katalog (htaccess)
* Wskaż domene (lub sub-domenę) na podkatalog `web/`
* Utwórz bazę danych i wgraj schemat korzystając z odpowiednich plików z repozytorium (katalog db).

### Konfiguracja

Konfiguracja dostępu do bazy znajduje się w pliku: `src/config/db.php`. Otwórz 
go w edytorze i zmień wartośc `dsn` w zależności od typu bazy danych

#### MySQL

Schemat bazy danych znajduje się w pliku [db/db.mysql.sql](db/db.mysql.sql).

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

#### PostgreSQL

Schemat bazy danych znajduje się w pliku [db/db.postgresql.sql](db/db.postgresql.sql).

```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;dbname=yii2basic'
    'username' => 'ufaktura',
    'password' => 'pass',
];
```

#### SQLite

Baza zalecana przy uruchamianiu serwisu na własnym komputerze, patrz niżej.
Gotowa pusta baza danych znajduje się w katalogu `db` wydania.


```php
<?php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:../db/ufaktura.db'
];
```

### Uruchomienie

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
docker pull tpimages/ufaktura:latest
```

Zamiast `latest` możesz podać dowolną inną wydaną wersje.

2. Utwórz katalog w którym zapisywane będą dane (baza sqlite) i skopiuj tam pustą bazę z kontenera.

```
mkdir /home/tomplus/ufaktura
docker run --volume=/home/tomplus/ufaktura:/tmp -it --rm --name ufaktura tpimages/ufaktura:latest cp /ufaktura/db/ufaktura.db /tmp/
```

3. Uruchom obraz wskazując katalog z baza danych

```
docker run -p 8080:8080 --volume=/home/tomplus/ufaktura:/ufaktura/db -it --rm --name tpimages/ufaktura ufaktura:latest
```

Serwis jest dostepny z przeglądarki pod adresem http://localhost:8080

### Konfiguracja

## Ze źródeł (dla ekspertów)

To sposób dla programistów, którzy chcą zmodyfikować serwis.

### Wymagania

* PHP 5.1 lub wyższy
* Pakiety dodatkowe (przykład dla Ubuntu):
  ```apt-get install php-mbstring php-bcmath php-xml php-pgsql php-mysql php-sqlite3```
* PHP Composer (https://getcomposer.org/download/)

### Instalacja

1. Aplikacja znajduje się w katalogu `src/`

```
cd src/
```

2. Instalacja zależności z `composer.json`.

```
./composer.phar install
```

3. Utworzenie pustej bazy danych sqlite3

```
cd db
make
```

4. Uruchomienie serwera w PHP
```
./yii serve
```

4. Serwis jest dostępny pod adresem http://localhost:8080 Wprowadzane zmiany od razu wpływaja na działanie aplikacji.

# Licencja

Aplikacja udostępniona na licencji [MIT](https://pl.wikipedia.org/wiki/Licencja_MIT).
