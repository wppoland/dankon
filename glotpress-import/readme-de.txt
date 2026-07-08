=== Plogins Tipping - Tips and Gratuity for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, tips, donations, checkout, gratuity
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Erfordert Plugins: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Ermögliche deinen Kunden, an der Kasse ein optionales Trinkgeld oder eine Spende hinzuzufügen: voreingestellte Beträge, die auf die Bestellsumme angewendet und live aktualisiert werden.

== Description ==

Trinkgeld fügt dem WooCommerce-Checkout eine optionale Trinkgeld- oder Spendenkontrolle hinzu.
Kunden wählen einen voreingestellten Betrag, entweder einen Pauschalbetrag oder einen Prozentsatz ihres Betrags
Das Trinkgeld wird als Gebühr zu den Bestellsummen addiert und in der Bestellung gespeichert.

Wenn du einen Betrag auswählen, werden die Gesamtbeträge über den WooCommerce-eigenen Checkout neu berechnet
AJAX, daher ist in der Zahl, die Kunden sehen, bevor sie bezahlen, immer das Trinkgeld enthalten.
Prozentvorgaben werden aus der aktuellen Zwischensumme errechnet, bleiben also erhalten
korrekt, wenn sich der Warenkorb ändert.

Alles lebt auf einem Bildschirm unter <strong>WooCommerce → Trinkgeld</strong>: das Label und
Beschreibungskäufer sehen, ob es sich bei den Voreinstellungen um feste Beträge oder Prozentsätze handelt, und
die voreingestellten Werte selbst.

Wenn du den Code lesen möchten, findest du ihn auf GitHub unter https://github.com/wppoland/plogins-tipping
es, melde einen Fehler oder schlage einen voreingestellten Workflow vor, den wir übersehen haben.

= Documentation and links =

* <strong>Dokumentation</strong> - https://plogins.com/de/plogins-tipping/docs/
* <strong>Plugin-Seite</strong> - https://plogins.com/de/plogins-tipping/
* <strong>Quellcode</strong> – https://github.com/wppoland/plogins-tipping
* <strong>Fehlerberichte und Funktionsanfragen</strong> – https://github.com/wppoland/plogins-tipping/issues


= Features =

* Voreingestellte Trinkgeldbeträge: feste Währungswerte oder ein Prozentsatz des Warenkorbs.
* Wird als native WooCommerce-Warenkorbgebühr angewendet und wird daher in den Gesamtbeträgen und auf der Bestellung angezeigt.
* Wird über WooCommerce Checkout AJAX neu berechnet, sobald der Kunde einen Betrag auswählt.
* Bearbeitbare Beschriftung und Beschreibung.
* Standardmäßig aktiviert: „Kein Trinkgeld“ ist vorausgewählt und Trinkgelder werden als nicht steuerpflichtige Gebühr hinzugefügt.
* Es wird nichts gerendert, wenn das Trinkgeld deaktiviert ist oder keine Voreinstellungen festgelegt sind, sodass die Kasse nie mit einem leeren Steuerelement überfüllt ist.
* Die Tasten sind über die Tastatur bedienbar und verfügen über einen sichtbaren Fokusring, eine ARIA-Live-Statuszeile und eine bewegungsreduzierte Handhabung.
* Wird mit einer POT-Datei zur Übersetzung geliefert und entfernt deren Option bei der Deinstallation.
* Erklärt HPOS-Kompatibilität. Das Steuerelement wird beim klassischen Checkout (Shortcode) gerendert.

== Installation ==

1. Lade das Plugin nach „/wp-content/plugins/plogins-tipping“ hoch oder installiere es über Plugins → Neu hinzufügen.
2. Aktiviere es. WooCommerce muss installiert und aktiv sein.
3. Gehe zu <strong>WooCommerce → Trinkgeld</strong>, aktiviere Trinkgeld und lege deine Voreinstellungen fest.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Ja. WooCommerce muss installiert und aktiv sein.

= Are tips taxed? =

Nein. Trinkgelder und Spenden werden als nicht steuerpflichtige Gebühr hinzugefügt.

= How does a percentage tip work? =

Aus der Zwischensumme des Warenkorbs wird zum Zeitpunkt des Kaufs ein voreingestellter Prozentsatz berechnet
Die Auswahl wird immer dann neu berechnet, wenn sich der Warenkorb ändert, sodass immer die angezeigt wird
aktuelle Bestellung.

= Where is the tip stored? =

Das Trinkgeld wird der Bestellung als Standard-WooCommerce-Gebühr hinzugefügt und erscheint daher im
Bestellsummen, E-Mails und Berichte. Der Betrag wird auch als Bestellmeta für gespeichert
Wirtschaftsprüfung.

= Is tipping optional for customers? =

Ja. Die Standardauswahl ist „Kein Trinkgeld“, sodass die vollständige Opt-in-Option erhalten bleibt.


= Does this plugin work on WordPress Multisite? =

Ja. Dieses Plugin ist mit WordPress Multisite kompatibel. Aktiviere es im Netzwerk oder auf einzelnen Websites. Jede Site behält ihre eigenen Einstellungen und Daten.

== Screenshots ==

1. Die Trinkgeldkontrolle auf der Checkout-Seite.
2. Der Bildschirm mit den Trinkgeldeinstellungen unter WooCommerce.

== External Services ==

Trinkgeld stellt keine Verbindung zu externen Diensten her, sendet keine Daten an diese und lädt keine Ressourcen von diesen. Es läuft vollständig auf deiner eigenen Website.

Die Trinkgeldauswahl des Kunden wird in WordPresss eigener „admin-ajax.php“ auf demselben Ursprung gepostet, dann berechnet WooCommerce die Checkout-Gesamtsummen neu; Es ist kein Dritter beteiligt. Die Einstellungen werden in der Option „tipping_settings“ gespeichert (wobei „tipping_db_version“ das Schema verfolgt), und jedes Trinkgeld wird sowohl als native WooCommerce-Warenkorbgebühr als auch als Bestellmeta „_tipping_amount“ erfasst. Das Plugin versendet keine eigenen E-Mails.

== Changelog ==

= 1.0.1 =
* Erste stabile Version.

= 0.1.3 =
* Umbenannt in „Plogins Tipping for WooCommerce“, um einen markanteren Plugin-Namen zu erhalten.

= 0.1.2 =
* „TipSelection::resolveAmountForChoice()“ und optionales „$base“-Argument für „tipping/fee_amount“ für die auftragsbasierte Trinkgeldauflösung.

= 0.1.1 =
* Filter „Trinkgeld/Empfänger“ für PRO-Empfängerlisten (standardmäßig leer).
* Optionale „Empfänger“-ID in Sitzung und AJAX; blieb bei getippten Bestellungen als „_tipping_recipient“ bestehen.
* Aktion „tipping/control_before_options“ für PRO UI vor voreingestellten Schaltflächen.
* Voreingestellter Index als Auftragsmeta „_tipping_preset“ für die Berichterstellung gespeichert.

= 0.1.0 =
* Erstveröffentlichung: voreingestellte Trinkgelder/Spenden an der Kasse, angewendet als WooCommerce-Warenkorbgebühr mit Live-Gesamtsummen, plus einem WooCommerce-Einstellungsbildschirm.
