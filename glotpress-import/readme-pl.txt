=== Plogins Tipping - Tips and Gratuity for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, tips, donations, checkout, gratuity
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Requires Plugins: woocommerce
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Pozwól klientom dodać opcjonalny napiwek lub darowiznę przy kasie: wstępnie ustawione kwoty, doliczane do sumy zamówienia i aktualizowane na żywo.

== Description ==

Tipping dodaje opcjonalną kontrolkę napiwków lub darowizn do kasy WooCommerce.
Klienci wybierają wstępnie ustawioną kwotę — stałą lub procentową względem
zamówienia — a napiwek jest doliczany do sumy zamówienia jako opłata i zapisywany w zamówieniu.

Wybór kwoty przelicza sumy przez własny mechanizm AJAX kasy WooCommerce,
więc kwota widoczna przed zapłatą zawsze uwzględnia napiwek.
Wstępnie ustawione wartości procentowe są liczone od bieżącej sumy częściowej, więc pozostają
poprawne, gdy koszyk się zmienia.

Wszystko jest na jednym ekranie w <strong>WooCommerce → Tipping</strong>: etykieta i
opis widoczne dla kupujących, to, czy ustawienia wstępne to kwoty stałe czy procentowe, oraz
same wartości wstępne.

Kod jest na GitHubie pod adresem https://github.com/wppoland/plogins-tipping, jeśli chcesz go przejrzeć,
zgłosić błąd lub zaproponować przepływ pracy z ustawieniami wstępnymi, który nam umknął.

= Documentation and links =

* <strong>Dokumentacja</strong> - https://plogins.com/pl/plogins-tipping/docs/
* <strong>Strona wtyczki</strong> - https://plogins.com/pl/plogins-tipping/
* <strong>Kod źródłowy</strong> - https://github.com/wppoland/plogins-tipping
* <strong>Zgłoszenia błędów i propozycje funkcji</strong> - https://github.com/wppoland/plogins-tipping/issues


= Features =

* Wstępnie ustawione kwoty napiwków: stałe wartości walutowe lub procent koszyka.
* Stosowane jako natywna opłata koszyka WooCommerce, więc widać je w sumach i w zamówieniu.
* Przeliczane natychmiast po wyborze kwoty przez klienta, za pośrednictwem AJAX kasy WooCommerce.
* Edytowalna etykieta i opis.
* Domyślnie opcjonalne: wstępnie wybrane jest „Bez napiwku”, a napiwki są dodawane jako opłata nieopodatkowana.
* Nic nie jest renderowane, gdy napiwki są wyłączone lub nie ustawiono wartości wstępnych, więc kasa nigdy nie jest zaśmiecona pustą kontrolką.
* Przyciski obsługiwane z klawiatury, z widocznym obramowaniem fokusu, linią statusu ARIA live i obsługą ograniczonego ruchu.
* Dołączony plik POT do tłumaczeń; opcja jest usuwana przy odinstalowaniu.
* Deklaruje zgodność z HPOS. Kontrolka renderuje się w klasycznej kasie (shortcode).

== Installation ==

1. Prześlij wtyczkę do `/wp-content/plugins/plogins-tipping` lub zainstaluj przez Wtyczki → Dodaj nową.
2. Włącz ją. WooCommerce musi być zainstalowane i aktywne.
3. Przejdź do <strong>WooCommerce → Tipping</strong>, włącz napiwki i ustaw wartości wstępne.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Tak. WooCommerce musi być zainstalowane i aktywne.

= Are tips taxed? =

Nie. Napiwki i darowizny są dodawane jako opłata nieopodatkowana.

= How does a percentage tip work? =

Wstępnie ustawiony procent jest liczony od sumy częściowej koszyka w momencie
wyboru i przeliczany przy każdej zmianie koszyka, więc zawsze odzwierciedla
aktualne zamówienie.

= Where is the tip stored? =

Napiwek jest dodawany do zamówienia jako standardowa opłata WooCommerce, więc pojawia się w
sumach zamówień, e-mailach i raportach. Kwota jest też zapisywana jako meta zamówienia do
audytu.

= Is tipping optional for customers? =

Tak. Domyślnie wybrane jest „Bez napiwku”, więc pozostaje to w pełni opcjonalne.


= Does this plugin work on WordPress Multisite? =

Tak. Ta wtyczka jest kompatybilna z WordPress Multisite. Włącz ją dla całej sieci lub w poszczególnych witrynach; każda witryna zachowuje własne ustawienia i dane.

== Screenshots ==

1. Kontrolka napiwków na stronie kasy.
2. Ekran ustawień Tipping w WooCommerce.

== External Services ==

Tipping nie łączy się, nie wysyła danych ani nie ładuje zasobów z żadnej usługi zewnętrznej. Działa w całości na Twojej własnej witrynie.

Wybór napiwku klienta jest wysyłany do własnego `admin-ajax.php` WordPressa z tej samej domeny, a następnie WooCommerce przelicza sumy kasy; żaden podmiot trzeci nie jest zaangażowany. Ustawienia są przechowywane w opcji `tipping_settings` (z `tipping_db_version` śledzącym schemat), a każdy napiwek jest rejestrowany zarówno jako natywna opłata koszyka WooCommerce, jak i jako meta zamówienia `_tipping_amount`. Wtyczka nie wysyła własnych wiadomości e-mail.

== Translations ==

Plogins Tipping zawiera polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki. Domena tekstowa to `plogins-tipping`, więc pakiety językowe z WordPress.org mogą też nadpisywać lub rozszerzać te dołączone tłumaczenia.

== Changelog ==

= 1.0.2 =
* Dodano dołączone polskie, niemieckie i hiszpańskie tłumaczenia interfejsu wtyczki.

= 1.0.1 =
* Pierwsza stabilna wersja.

= 0.1.3 =
* Zmieniono nazwę na Plogins Tipping dla WooCommerce, aby uzyskać bardziej charakterystyczną nazwę wtyczki.

= 0.1.2 =
* `TipSelection::resolveAmountForChoice()` i opcjonalny argument `$base` w `tipping/fee_amount` do rozstrzygania napiwków na podstawie zamówienia.

= 0.1.1 =
* Filtr `tipping/recipients` dla list odbiorców PRO (domyślnie pusty).
* Opcjonalny identyfikator `recipient` w sesji i AJAX; zapisywany jako `_tipping_recipient` w zamówieniach z napiwkiem.
* Akcja `tipping/control_before_options` dla interfejsu PRO przed przyciskami wartości wstępnych.
* Indeks wartości wstępnej zapisywany jako meta zamówienia `_tipping_preset` do raportowania.

= 0.1.0 =
* Pierwsza wersja: wstępnie ustawione napiwki/darowizny przy kasie, stosowane jako opłata koszyka WooCommerce z sumami na żywo, plus ekran ustawień WooCommerce.
