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

Lass Kundinnen und Kunden an der Kasse ein optionales Trinkgeld oder eine Spende hinzufügen: voreingestellte Beträge, die auf die Bestellsumme angewendet und live aktualisiert werden.

== Description ==

Tipping fügt dem WooCommerce-Checkout eine optionale Trinkgeld- oder Spenden-Kontrolle hinzu.
Kundinnen und Kunden wählen einen voreingestellten Betrag – entweder einen Festbetrag oder einen Prozentsatz ihrer
Bestellung – und das Trinkgeld wird als Gebühr zu den Bestellsummen addiert und in der Bestellung gespeichert.

Die Auswahl eines Betrags berechnet die Summen über den eigenen Checkout-AJAX von WooCommerce neu,
sodass die Zahl vor der Zahlung immer das Trinkgeld enthält.
Prozent-Voreinstellungen werden aus der aktuellen Zwischensumme berechnet und bleiben daher
korrekt, wenn sich der Warenkorb ändert.

Alles liegt auf einem Bildschirm unter <strong>WooCommerce → Tipping</strong>: die Beschriftung und
Beschreibung, die Käufer sehen, ob Voreinstellungen Festbeträge oder Prozentsätze sind, und
die Voreinstellungswerte selbst.

Der Code liegt auf GitHub unter https://github.com/wppoland/plogins-tipping, falls du ihn lesen,
einen Fehler melden oder einen Voreinstellungs-Workflow vorschlagen möchtest, den wir übersehen haben.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-tipping/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-tipping/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-tipping
* <strong>Fehlerberichte und Funktionswünsche</strong> – https://github.com/wppoland/plogins-tipping/issues


= Features =

* Voreingestellte Trinkgeldbeträge: feste Währungswerte oder ein Prozentsatz des Warenkorbs.
* Als native WooCommerce-Warenkorbgebühr angewendet, sodass sie in Summen und in der Bestellung erscheint.
* Wird neu berechnet, sobald der Kunde einen Betrag wählt, über WooCommerce-Checkout-AJAX.
* Bearbeitbare Beschriftung und Beschreibung.
* Standardmäßig opt-in: „Kein Trinkgeld“ ist vorausgewählt, und Trinkgelder werden als nicht steuerpflichtige Gebühr hinzugefügt.
* Rendert nichts, wenn Trinkgeld deaktiviert ist oder keine Voreinstellungen gesetzt sind, sodass der Checkout nie mit einer leeren Kontrolle überladen ist.
* Buttons sind per Tastatur bedienbar, mit sichtbarem Fokus-Ring, ARIA-Live-Statuszeile und Unterstützung für reduzierte Bewegung.
* Enthält eine POT-Datei zur Übersetzung und entfernt seine Option bei der Deinstallation.
* Deklariert HPOS-Kompatibilität. Die Kontrolle wird im klassischen Checkout (Shortcode) gerendert.

== Installation ==

1. Lade das Plugin nach `/wp-content/plugins/plogins-tipping` hoch oder installiere es über Plugins → Installieren.
2. Aktiviere es. WooCommerce muss installiert und aktiv sein.
3. Gehe zu <strong>WooCommerce → Tipping</strong>, aktiviere Trinkgeld und lege deine Voreinstellungen fest.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. WooCommerce muss installiert und aktiv sein.

= Are tips taxed? =

Nein. Trinkgelder und Spenden werden als nicht steuerpflichtige Gebühr hinzugefügt.

= How does a percentage tip work? =

Eine Prozent-Voreinstellung wird zum Zeitpunkt der Auswahl aus der Warenkorb-Zwischensumme berechnet
und bei jeder Warenkorbänderung neu berechnet, sodass sie immer die
aktuelle Bestellung widerspiegelt.

= Where is the tip stored? =

Das Trinkgeld wird der Bestellung als Standard-WooCommerce-Gebühr hinzugefügt und erscheint daher in den
Bestellsummen, E-Mails und Berichten. Der Betrag wird auch als Bestell-Meta zur
Nachverfolgung gespeichert.

= Is tipping optional for customers? =

Ja. Die Standardauswahl ist „Kein Trinkgeld“, sodass es vollständig optional bleibt.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es netzwerkweit oder auf einzelnen Websites; jede Website behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Die Trinkgeld-Kontrolle auf der Checkout-Seite.
2. Der Tipping-Einstellungsbildschirm unter WooCommerce.

== External Services ==

Tipping stellt keine Verbindung zu externen Diensten her, sendet keine Daten dorthin und lädt keine Ressourcen von dort. Es läuft vollständig auf deiner eigenen Website.

Die Trinkgeld-Auswahl des Kunden wird an die eigene `admin-ajax.php` von WordPress auf derselben Domain gesendet, dann berechnet WooCommerce die Checkout-Summen neu; kein Dritter ist beteiligt. Einstellungen liegen in der Option `tipping_settings` (mit `tipping_db_version` für die Schema-Version), und jedes Trinkgeld wird sowohl als native WooCommerce-Warenkorbgebühr als auch als Bestell-Meta `_tipping_amount` erfasst. Das Plugin versendet keine eigenen E-Mails.

== Translations ==

Plogins Tipping enthält deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche. Die Textdomain ist `plogins-tipping`, sodass Sprachpakete von WordPress.org diese mitgelieferten Übersetzungen ebenfalls überschreiben oder erweitern können.

== Changelog ==

= 1.0.2 =
* Deutsche, polnische und spanische Übersetzungen für die Plugin-Oberfläche mitgeliefert.

= 1.0.1 =
* Erste stabile Version.

= 0.1.3 =
* Für einen eindeutigeren Plugin-Namen in Plogins Tipping für WooCommerce umbenannt.

= 0.1.2 =
* `TipSelection::resolveAmountForChoice()` und optionales `$base`-Argument in `tipping/fee_amount` für auftragsbasierte Trinkgeld-Auflösung.

= 0.1.1 =
* Filter `tipping/recipients` für PRO-Empfängerlisten (standardmäßig leer).
* Optionale `recipient`-ID in Session und AJAX; gespeichert als `_tipping_recipient` bei Bestellungen mit Trinkgeld.
* Aktion `tipping/control_before_options` für PRO-UI vor Voreinstellungs-Buttons.
* Voreinstellungsindex als Bestell-Meta `_tipping_preset` für Berichte gespeichert.

= 0.1.0 =
* Erstveröffentlichung: voreingestellte Trinkgelder/Spenden am Checkout, angewendet als WooCommerce-Warenkorbgebühr mit Live-Summen, plus ein WooCommerce-Einstellungsbildschirm.
