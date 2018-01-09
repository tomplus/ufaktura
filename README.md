# micro-Faktura

micro-Faktura to serwis do wystawiania faktur, który można uruchomić na serwerze hostingowym.
Pozwala wystawiać najprostsze faktury (max. 3 pozycje) dla podatników zwolnionych z VAT.
Idealne dla osób prowadzących działalność usługą dla niewielkiel liczby klientów,
których wymagania odnośnie systemu fakturowania nie są wygórowane.

Cechy charakterystyczne:

* do samodzielnego uruchomienia serwerze hostingowym z PHP i bazą danych
* prosty schemat bazy danych do ew. eksportu do dodatkowych narzedzi (np. Excel)
* faktura może zawierać maksymalnie 3 pozycje
* tylko faktury zwolnione z VAT (dawny Rachnuek)
* generuje fakturę w formacie PDF do wydruku lub wysyłki przez mailem
* brak autoryzacji / autentykacji - zadbaj o to konfigurujac serwer HTTP

# Instalacja

## Na serwerze z PHP i Postgresql (hosting)

TODO

## Na własnym komputerze (Docker)

TODO

## Ze źródeł (dla ekspertów)

Pakiety wymagane przez ubuntu: apt-get install php php-mbstring php-xml php-pgsql php-sqlite3

1. Konieczna instalacja PHP Composer - https://getcomposer.org/download/
2. Instalacja zależności ./composer.phar install
3. Konfiguacja bazy danych
4. Uruchomienie ./yii serve

# Licencja

Aplikacja udostępniona na licencji [MIT](https://pl.wikipedia.org/wiki/Licencja_MIT), autor Tomasz Prus.
