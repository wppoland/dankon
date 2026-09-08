<?php
/**
 * Default settings, merged under the option key `tipping_settings`.
 *
 * The plugin ships enabled with three percentage presets on the checkout.
 * Merchants tune the label, the preset type (fixed amounts or a percentage of
 * the cart) and the preset values from the Tipping admin screen.
 *
 * @package Tipping
 *
 * @return array<string, mixed>
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

return [
    // Master switch.
    'enabled' => true,

    // Customer-facing copy, empty on purpose. An English sentence here is not a
    // gettext call, so it never reaches the .pot and no language pack can ever
    // replace it once it has been merged over the stored option. Empty means
    // "use Tipping\Service\Texts", which is translated; anything a merchant
    // types still wins and is stored exactly as typed.
    'label'       => '',
    'description' => '',
    // "Leave the description blank to hide it" stopped working the moment blank
    // came to mean "use the translated default", and a merchant who had hidden it
    // would have had it pushed back onto their checkout with no way to remove it
    // again. One text field cannot express both "not customised" and "off", so
    // "off" gets a control of its own. True keeps what the plugin does today.
    'show_description' => true,

    // Preset type: 'percent' (of the cart subtotal) or 'fixed' (currency amounts).
    'type' => 'percent',

    // Preset values. For 'percent' these are whole percentages (e.g. 5 = 5%);
    // for 'fixed' they are amounts in the store currency.
    'presets' => [5, 10, 15],
];
