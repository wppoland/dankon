=== Plogins Tipping - Tips and Gratuity for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, tips, donations, checkout, gratuity
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Wymaga wtyczek: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Pozwól klientom dodać opcjonalny napiwek lub darowiznę przy kasie: wstępnie ustawione kwoty, doliczane do sumy zamówienia i aktualizowane na bieżąco.

== Description ==

Napiwki dodają opcjonalną kontrolę napiwków lub darowizn do kasy WooCommerce.
Klienci wybierają ustaloną kwotę – kwotę stałą lub procent kwoty
zamówienia, a napiwek doliczany jest do sumy zamówienia jako opłata i zapisywany na zamówieniu.

Wybranie kwoty powoduje ponowne obliczenie sumy w ramach własnej kasy WooCommerce
AJAX, więc kwota, którą klienci widzą przed zapłaceniem, zawsze uwzględnia napiwek.
Zadane wartości procentowe są obliczane na podstawie bieżącej sumy częściowej, więc pozostają
poprawne, jeśli koszyk się zmieni.

Wszystko znajduje się na jednym ekranie w sekcji <strong>WooCommerce → Napiwki</strong>: etykieta i
opis, który kupujący widzą, czy ustawienia wstępne są stałymi kwotami, czy wartościami procentowymi, oraz
same ustawione wartości.

Kod znajduje się na GitHubie pod adresem https://github.com/wppoland/plogins-tipping, jeśli chcesz przeczytać
go, zgłoś błąd lub zaproponuj gotowy przepływ pracy, który przeoczyliśmy.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-tipping/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-tipping/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-tipping
* <strong>Raporty o błędach i prośby o nowe funkcje</strong> - https://github.com/wppoland/plogins-tipping/issues


= Features =

* Wstępnie ustawione kwoty napiwków: stałe wartości walut lub procent koszyka.
* Stosowana jako natywna opłata za koszyk WooCommerce, więc wyświetla się w sumie i na zamówieniu.
* Oblicza się ponownie, gdy tylko klient wybierze kwotę, za pośrednictwem kasy WooCommerce AJAX.
* Edytowalna etykieta i opis.
* Domyślna opcja wyboru: wstępnie wybrana jest opcja „Bez napiwku”, a napiwki są dodawane jako opłata niepodlegająca opodatkowaniu.
* Nic nie jest renderowane, gdy napiwki są wyłączone lub nie ustawiono żadnych ustawień wstępnych, więc kasa nigdy nie jest zaśmiecona pustą kontrolką.
* Przyciski można obsługiwać za pomocą klawiatury, z widocznym pierścieniem ostrości, linią stanu na żywo ARIA i obsługą przy ograniczonym ruchu.
* Dostarczany z plikiem POT do tłumaczenia i usuwa tę opcję podczas dezinstalacji.
* Deklaruje kompatybilność z HPOS. Kontrolka renderuje się przy kasie klasycznej (krótki kod).

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/plogins-tipping` lub zainstaluj poprzez Wtyczki → Dodaj nową.
2. Aktywuj. WooCommerce musi być zainstalowany i aktywny.
3. Przejdź do <strong>WooCommerce → Napiwki</strong>, włącz napiwki i ustaw swoje ustawienia wstępne.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. WooCommerce musi być zainstalowany i aktywny.

= Are tips taxed? =

Nie. Napiwki i datki są dodawane jako opłata niepodlegająca opodatkowaniu.

= How does a percentage tip work? =

Wstępnie ustawiony procent jest obliczany z sumy częściowej koszyka w momencie
wybór i przeliczany za każdym razem, gdy zmienia się koszyk, więc zawsze odzwierciedla
aktualne zamówienie.

= Where is the tip stored? =

Napiwek jest dodawany do zamówienia jako standardowa opłata WooCommerce, więc pojawia się w pliku
sumy zamówień, e-maile i raporty. Kwota jest również zapisywana jako meta zamówienia
audyt.

= Is tipping optional for customers? =

Tak. Domyślnym wyborem jest „Bez napiwku”, co oznacza pełną zgodę.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Aktywuj go w sieci lub aktywuj na poszczególnych stronach; każda witryna przechowuje własne ustawienia i dane.

== Screenshots ==

1. Kontrola napiwków na stronie kasy.
2. Ekran ustawień napiwków w WooCommerce.

== External Services ==

Tipping nie łączy się, nie wysyła danych ani nie ładuje zasobów z żadnej usługi zewnętrznej. Działa całkowicie na Twojej własnej stronie.

Napiwki wybrane przez klienta są publikowane we własnym pliku `admin-ajax.php` WordPressa z tego samego źródła, a następnie WooCommerce ponownie oblicza sumę transakcji; żadna osoba trzecia nie jest zaangażowana. Ustawienia są przechowywane w opcji `tipping_settings` (z opcją `tipping_db_version` śledzącą schemat), a każdy napiwek jest rejestrowany zarówno jako natywna opłata za koszyk WooCommerce, jak i jako meta zamówienia `_tipping_amount`. Wtyczka nie wysyła żadnych własnych wiadomości e-mail.

== Changelog ==

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.3 =
* Zmieniono nazwę na Plogins Tipping dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.2 =
* `TipSelection::resolveAmountForChoice()` i opcjonalny argument `$base` na `tipping/fee_amount` w przypadku rozstrzygania napiwków na podstawie zamówienia.

= 0.1.1 =
* Filtr `napiwki/odbiorcy` dla list odbiorców PRO (domyślnie pusty).
* Opcjonalny identyfikator „odbiorcy” w sesji i AJAX; utrzymywany jako „_odbiorca_napiwków” w przypadku zamówień z napiwkiem.
* Akcja `tipping/control_before_options` dla PRO UI przed zaprogramowanymi przyciskami.
* Wstępnie ustawiony indeks zapisany jako meta zamówienia `_tipping_preset` na potrzeby raportowania.

= 0.1.0 =
* Pierwsza wersja: wstępnie ustawione napiwki/darowizny przy kasie, stosowane jako opłata za koszyk WooCommerce z bieżącymi sumami oraz ekran ustawień WooCommerce.
