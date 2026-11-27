<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package dankon-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Dankon Pro',
    'url'        => 'https://plogins.com/dankon-pro/pricing/',
    'sellable'   => true,
    'price_from' => 29,
    'currency'   => 'EUR',
    'lead'       => [
        'en' => 'The 0.4.0 release ships round-up tipping, tip goal progress bar, tip recipients, tip reports and post-purchase tipping.',
        'pl' => 'Wydanie 0.4.0 dostarcza zaokrąglenie w górę, cel zbiórki, wybór odbiorcy napiwku, raporty napiwków i napiwek po zakupie.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Round-up tip', 'desc' => 'When the store turns rounding on, the tip a shopper picks is raised so the items subtotal plus the tip lands on the next whole amount, or on a multiple you set, such as 5. No tip stays zero (shipped).'],
            'pl' => ['title' => 'Zaokrąglenie w górę', 'desc' => 'Gdy włączysz zaokrąglanie, wybrany przez klienta napiwek rośnie tak, aby podsuma produktów razem z napiwkiem dała pełną kwotę albo ustawioną przez Ciebie wielokrotność, np. 5. Przy wyborze Bez napiwku napiwek wynosi zero (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Tip goals and progress bars', 'desc' => 'Show a fundraising goal with a live progress bar so shoppers can see how close a campaign is to its target (shipped).'],
            'pl' => ['title' => 'Cele zbiórki i paski postępu', 'desc' => 'Pokaż cel zbiórki z paskiem postępu na żywo, aby klient widział, jak blisko kampania jest celu (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Tip recipients', 'desc' => 'The shopper picks one cause or recipient for their tip from a dropdown, and reports show the tip total per recipient (shipped).'],
            'pl' => ['title' => 'Odbiorcy napiwków', 'desc' => 'Klient wybiera z listy jeden cel lub odbiorcę swojego napiwku, a raporty pokazują sumę napiwków dla każdego odbiorcy (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Tip reports', 'desc' => 'Break down tips from paid orders by period, preset and recipient, with CSV export for accounting (shipped).'],
            'pl' => ['title' => 'Raporty napiwków', 'desc' => 'Rozbij napiwki z opłaconych zamówień według okresu, presetu i odbiorcy, z eksportem CSV do księgowości (wdrożone).'],
        ],
        [
            'en' => ['title' => 'Post-purchase tipping', 'desc' => 'Invite a tip on the thank-you page after checkout (shipped).'],
            'pl' => ['title' => 'Napiwek po zakupie', 'desc' => 'Zaproponuj napiwek na stronie podziękowania po zamówieniu (wdrożone).'],
        ],
    ],
];
