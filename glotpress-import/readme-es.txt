=== Plogins Tipping - Tips and Gratuity for WooCommerce ===
Contributors: motylanogha
Tags: woocommerce, tips, donations, checkout, gratuity
Requires at least: 6.5
Tested up to: 7.0
Requires PHP: 8.1
Requiere complementos: woocommerce
Stable tag: 1.0.1
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Permita que los clientes agreguen una propina o donación opcional al finalizar la compra: montos preestablecidos, aplicados al total del pedido y actualizados en vivo.

== Description ==

Las propinas agregan un control opcional de propinas o donaciones al proceso de pago de WooCommerce.
Los clientes eligen una cantidad preestablecida, ya sea una cifra fija o un porcentaje de su
pedido, y la propina se añade a los totales del pedido como una tarifa y se guarda en el pedido.

Al elegir una cantidad se recalculan los totales a través del propio proceso de pago de WooCommerce
AJAX, por lo que la cifra que ven los clientes antes de pagar siempre incluye la propina.
Los ajustes preestablecidos porcentuales se calculan a partir del subtotal actual, por lo que permanecen
corregir si el carrito cambia.

Todo se encuentra en una pantalla en <strong>WooCommerce → Tipping</strong>: la etiqueta y
descripción que ven los compradores, si los ajustes preestablecidos son cantidades fijas o porcentajes, y
los propios valores preestablecidos.

El código está en GitHub en https://github.com/wppoland/plogins-tipping si quieres leerlo.
informarlo, informar un error o sugerir un flujo de trabajo preestablecido que nos hayamos perdido.

= Documentation and links =

* <strong>Documentación</strong> - https://plogins.com/es/plogins-tipping/docs/
* <strong>Página de complementos</strong> - https://plogins.com/es/plogins-tipping/
* <strong>Código fuente</strong> - https://github.com/wppoland/plogins-tipping
* <strong>Informes de errores y solicitudes de funciones</strong> - https://github.com/wppoland/plogins-tipping/issues


= Features =

* Montos de propina preestablecidos: valores de moneda fijos o un porcentaje del carrito.
* Se aplica como una tarifa de carrito nativa de WooCommerce, por lo que se muestra en totales y en el pedido.
* Se vuelve a calcular tan pronto como el cliente elige un monto, a través de AJAX de pago de WooCommerce.
* Etiqueta y descripción editables.
* Participación predeterminada: "Sin propina" está preseleccionado y las propinas se agregan como una tarifa no sujeta a impuestos.
* No muestra nada cuando la propina está desactivada o no se establecen ajustes preestablecidos, por lo que la caja nunca se llena con un control vacío.
* Los botones se pueden operar con el teclado, con un anillo de enfoque visible, una línea de estado en vivo ARIA y manejo de movimiento reducido.
* Se envía con un archivo POT para traducir y elimina su opción de desinstalación.
* Declara compatibilidad con HPOS. El control se representa en el pago clásico (código abreviado).

== Installation ==

1. Cargue el complemento en `/wp-content/plugins/plogins-tipping`, o instálelo a través de Complementos → Añadir nuevo.
2. Actívalo. WooCommerce debe estar instalado y activo.
3. Vaya a <strong>WooCommerce → Propinas</strong>, activa las propinas y configure sus ajustes preestablecidos.

== Frequently Asked Questions ==

= Does it require WooCommerce? =

Sí. WooCommerce debe estar instalado y activo.

= Are tips taxed? =

No. Las propinas y donaciones se agregan como una tarifa no sujeta a impuestos.

= How does a percentage tip work? =

Se calcula un porcentaje preestablecido a partir del subtotal del carrito en el momento de
selección y se recalcula cada vez que cambia el carrito, por lo que siempre refleja el
orden actual.

= Where is the tip stored? =

La propina se añade al pedido como una tarifa estándar de WooCommerce, por lo que aparece en el
totales de pedidos, correos electrónicos e informes. El importe también se guarda como meta del pedido para
auditoría.

= Is tipping optional for customers? =

Sí. La selección predeterminada es "Sin propina", manteniéndola totalmente habilitada.


= Does this plugin work on WordPress Multisite? =

Sí. Este complemento es compatible con WordPress Multisite. Activarlo en red o activarlo en sitios individuales; Cada sitio mantiene su propia configuración y datos.

== Screenshots ==

1. El control de propinas en la página de pago.
2. La pantalla de configuración de propinas en WooCommerce.

== External Services ==

Tipping no se conecta, envía datos ni carga recursos desde ningún servicio externo. Se ejecuta completamente en tu propio sitio.

La elección de propina del cliente se publica en el `admin-ajax.php` de WordPress en el mismo origen, luego WooCommerce recalcula los totales de pago; ningún tercero está involucrado. La configuración se mantiene en la opción `tipping_settings` (con `tipping_db_version` rastreando el esquema), y cada propina se registra como una tarifa nativa del carrito de WooCommerce y como el meta del pedido `_tipping_amount`. El complemento no envía ningún correo electrónico propio.

== Changelog ==

= 1.0.1 =
* Primera versión estable.

= 0.1.3 =
* Renombrado a Plogins Tipping para WooCommerce para obtener un nombre de complemento más distintivo.

= 0.1.2 =
* `TipSelection::resolveAmountForChoice()` y argumento opcional `$base` en `tipping/fee_amount` para la resolución de propinas basada en pedidos.

= 0.1.1 =
* Filtro `propinas/destinatarios` para listas de destinatarios PRO (vacío por defecto).
* ID de `destinatario` opcional en sesión y AJAX; persistió como `_tipping_recipient` en los pedidos con propina.
* Acción `tipping/control_before_options` para PRO UI antes de los botones preestablecidos.
* Índice preestablecido guardado como meta de orden `_tipping_preset` para informes.

= 0.1.0 =
* Lanzamiento inicial: propinas/donaciones preestablecidas en el proceso de pago, aplicadas como una tarifa de carrito de WooCommerce con totales en vivo, además de una pantalla de configuración de WooCommerce.
