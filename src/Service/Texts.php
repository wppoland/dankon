<?php

declare(strict_types=1);

namespace Tipping\Service;

defined('ABSPATH') || exit;

/**
 * The customer-facing strings a merchant may override, in the language of the
 * site.
 *
 * They used to be English sentences in config/defaults.php. A string in a config
 * array is never wrapped in a gettext call, so it never reaches the .pot and no
 * translator can touch it; the defaults+stored merge then handed that English
 * straight to the checkout, whatever language pack was installed. The `__()`
 * fallback that sat next to the label made it look handled, but it could never
 * fire, because the key was always present and always non-empty.
 *
 * The packaged default is now an empty string, meaning "use the string below".
 * A merchant who types their own still wins, and what they typed is stored as
 * typed.
 */
final class Texts
{
    /**
     * Setting key => the translated default.
     *
     * @return array<string, string>
     */
    public static function defaults(): array
    {
        return [
            'label'       => __('Add a tip', 'plogins-tipping'),
            'description' => __('Support our team, every tip is appreciated. Choose an amount or skip.', 'plogins-tipping'),
        ];
    }

    /**
     * Fill every empty text key with its translated default.
     *
     * Applied on the way OUT, where the string is about to be shown, and never
     * on the way in: writing the resolved text back to the option would freeze
     * one language into the database, which is the bug this class exists to fix.
     *
     * @param array<string, mixed> $settings
     * @return array<string, mixed>
     */
    public static function apply(array $settings): array
    {
        foreach (self::defaults() as $key => $text) {
            if (trim((string) ($settings[$key] ?? '')) === '') {
                $settings[$key] = $text;
            }
        }

        return $settings;
    }
}
