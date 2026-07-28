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

Permite que los clientes añadan una propina o donación opcional en el pago: importes preestablecidos, aplicados al total del pedido y actualizados en directo.

== Description ==

Tipping añade un control opcional de propinas o donaciones al pago de WooCommerce.
Los clientes eligen un importe preestablecido, ya sea una cantidad fija o un porcentaje de su
pedido, y la propina se añade a los totales del pedido como una tarifa y se guarda en el pedido.

Al elegir un importe se recalculan los totales a través del propio AJAX de pago de WooCommerce,
así que la cifra que ven los clientes antes de pagar siempre incluye la propina.
Los preajustes porcentuales se calculan a partir del subtotal actual, por lo que siguen siendo
correctos si el carrito cambia.

Todo está en una sola pantalla en <strong>WooCommerce → Tipping</strong>: la etiqueta y la
descripción que ven los compradores, si los preajustes son importes fijos o porcentajes, y
los propios valores preestablecidos.

El código está en GitHub en https://github.com/wppoland/plogins-tipping por si quieres leerlo,
informar de un error o sugerir un flujo de trabajo con preajustes que se nos haya pasado.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-tipping/docs/
* <strong>Página del plugin</strong> - https://plogins.com/es/plogins-tipping/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-tipping
* <strong>Informes de errores y peticiones de funciones</strong> - https://github.com/wppoland/plogins-tipping/issues


= Features =

* Importes de propina preestablecidos: valores fijos en moneda o un porcentaje del carrito.
* Aplicado como tarifa nativa del carrito de WooCommerce, así que aparece en los totales y en el pedido.
* Se recalcula en cuanto el cliente elige un importe, mediante el AJAX de pago de WooCommerce.
* Etiqueta y descripción editables.
* Opt-in por defecto: «Sin propina» está preseleccionado y las propinas se añaden como tarifa no sujeta a impuestos.
* No renderiza nada cuando las propinas están desactivadas o no hay preajustes, así que el pago nunca se llena con un control vacío.
* Botones operables con teclado, con anillo de foco visible, línea de estado ARIA live y manejo de movimiento reducido.
* Incluye un archivo POT para traducción y elimina su opción al desinstalar.
* Declara compatibilidad con HPOS. El control se renderiza en el pago clásico (shortcode).

== Installation ==

1. Sube el plugin a `/wp-content/plugins/plogins-tipping` o instálalo desde Plugins → Añadir nuevo.
2. Actívalo. WooCommerce debe estar instalado y activo.
3. Ve a <strong>WooCommerce → Tipping</strong>, activa las propinas y configura tus preajustes.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. WooCommerce debe estar instalado y activo.

= Are tips taxed? =

No. Las propinas y donaciones se añaden como una tarifa no sujeta a impuestos.

= How does a percentage tip work? =

Un preajuste porcentual se calcula a partir del subtotal del carrito en el momento de la
selección y se recalcula cada vez que cambia el carrito, así que siempre refleja el
pedido actual.

= Where is the tip stored? =

La propina se añade al pedido como una tarifa estándar de WooCommerce, así que aparece en los
totales del pedido, correos electrónicos e informes. El importe también se guarda como metadatos del pedido para
auditoría.

= Is tipping optional for customers? =

Sí. La selección predeterminada es «Sin propina», de modo que sigue siendo totalmente opcional.


= Does this plugin work on WordPress Multisite? =

Sí. Este plugin es compatible con WordPress Multisite. Actívalo en toda la red o en sitios concretos; cada sitio conserva sus propios ajustes y datos.

== Screenshots ==

1. El control de propinas en la página de pago.
2. La pantalla de ajustes de Tipping en WooCommerce.

== External Services ==

Tipping no se conecta, ni envía datos, ni carga recursos desde ningún servicio externo. Funciona íntegramente en tu propio sitio.

La elección de propina del cliente se envía al propio `admin-ajax.php` de WordPress en el mismo origen; después WooCommerce recalcula los totales del pago; no interviene ningún tercero. Los ajustes se guardan en la opción `tipping_settings` (con `tipping_db_version` para el seguimiento del esquema), y cada propina se registra tanto como tarifa nativa del carrito de WooCommerce como metadato del pedido `_tipping_amount`. El plugin no envía ningún correo electrónico propio.

== Translations ==

Plogins Tipping incluye traducciones al polaco, alemán y español para la interfaz del plugin. El dominio de texto es `plogins-tipping`, así que los paquetes de idioma de WordPress.org también pueden sustituir o ampliar estas traducciones incluidas.

== Changelog ==

= 1.0.2 =
* Añadidas traducciones al polaco, alemán y español para la interfaz del plugin.

= 1.0.1 =
* Primera versión estable.

= 0.1.3 =
* Renombrado a Plogins Tipping para WooCommerce para un nombre de plugin más distintivo.

= 0.1.2 =
* `TipSelection::resolveAmountForChoice()` y argumento opcional `$base` en `tipping/fee_amount` para la resolución de propinas basada en pedidos.

= 0.1.1 =
* Filtro `tipping/recipients` para listas de destinatarios PRO (vacío por defecto).
* ID opcional de `recipient` en sesión y AJAX; persistido como `_tipping_recipient` en pedidos con propina.
* Acción `tipping/control_before_options` para la interfaz PRO antes de los botones preestablecidos.
* Índice preestablecido guardado como metadato del pedido `_tipping_preset` para informes.

= 0.1.0 =
* Lanzamiento inicial: propinas/donaciones preestablecidas en el pago, aplicadas como tarifa del carrito de WooCommerce con totales en directo, más una pantalla de ajustes de WooCommerce.
