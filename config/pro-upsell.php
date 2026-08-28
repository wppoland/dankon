<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-tipping-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Tipping Pro',
    'url'        => 'https://plogins.com/plogins-tipping-pro/pricing/',
    'sellable'   => true,
    'price_from' => 29,
    'currency'   => 'EUR',
    'lead'       => [
        'en' => 'The 0.4.0 release ships round-up tipping, tip goal progress bar, recipient splitting, tip reports and post-purchase tipping.',
        'pl' => 'Wydanie 0.4.0 dostarcza zaokrąglenie w górę, cel zbiórki, podział na odbiorców, raporty napiwków i napiwek po zakupie.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Round-up tip', 'desc' => 'Round the order total up and add the difference as the tip in one tap (shipped).'],
            'pl' => ['title' => 'Zaokrąglenie w górę', 'desc' => 'Zaokrąglij sumę zamówienia w górę i dodaj różnicę jako napiwek jednym kliknięciem (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Tip goals and progress bars', 'desc' => 'Show a fundraising goal with a live progress bar so shoppers can see how close a campaign is to its target (shipped).'],
            'pl' => ['title' => 'Cele zbiórki i paski postępu', 'desc' => 'Pokaż cel zbiórki z paskiem postępu na żywo, aby klient widział, jak blisko kampania jest celu (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Recipient / cause splitting', 'desc' => 'Let shoppers choose which cause or recipient their tip supports, and split totals across multiple recipients (shipped).'],
            'pl' => ['title' => 'Podział na odbiorców / cele', 'desc' => 'Pozwól klientowi wybrać cel lub odbiorcę napiwku i podziel sumy między wielu odbiorców (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Tip reports', 'desc' => 'Break down tips by period, preset and recipient, with CSV export for accounting (shipped).'],
            'pl' => ['title' => 'Raporty napiwków', 'desc' => 'Rozbij napiwki według okresu, presetu i odbiorcy, z eksportem CSV do księgowości (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Post-purchase tipping', 'desc' => 'Invite a tip on the thank-you page after checkout (shipped).'],
            'pl' => ['title' => 'Napiwek po zakupie', 'desc' => 'Zaproponuj napiwek na stronie podziękowania po zamówieniu (wdrożone).'],
        ],
    ],
];
