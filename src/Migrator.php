<?php

declare(strict_types=1);

namespace Tipping;

use Tipping\Settings\Options;

defined('ABSPATH') || exit;

/**
 * Idempotent schema/version migrations, run on every boot. Compares a stored
 * option against VERSION and applies forward steps as needed.
 */
final class Migrator
{
    private const OPTION = 'tipping_db_version';

    /**
     * The exact English sentences that config/defaults.php used to ship, before
     * they moved into the translatable Tipping\Service\Texts.
     *
     * A site that saved its settings while those defaults were in place has the
     * English frozen in `tipping_settings`, where no language pack can reach it.
     * Clearing the key hands the string back to Texts and it becomes translatable
     * again.
     *
     * @var array<string, string>
     */
    private const LEGACY_TEXTS = [
        'label'       => 'Add a tip',
        'description' => 'Support our team, every tip is appreciated. Choose an amount or skip.',
    ];

    public function maybeMigrate(): void
    {
        $current = (string) get_option(self::OPTION, '0');

        if (version_compare($current, VERSION, '>=')) {
            return;
        }

        $this->clearUntranslatableTexts();

        update_option(self::OPTION, VERSION, false);
    }

    /**
     * Reset a stored customer-facing text to empty, but ONLY when it is still
     * byte for byte the old packaged English.
     *
     * The exact match is the whole safety argument. A merchant who typed their
     * own wording, including a hand translation of ours, differs by at least one
     * byte and is left untouched.
     */
    private function clearUntranslatableTexts(): void
    {
        $stored = get_option(Options::OPTION, []);

        if (! is_array($stored)) {
            return;
        }

        $changed = false;

        // A description already stored as empty was a deliberate "hide it": that
        // was the only way to turn it off. Blank now means "use the default", so
        // that choice has to be carried over to the switch or the merchant would
        // find the text back on their checkout and no way to remove it.
        if (! array_key_exists('show_description', $stored)) {
            $hadDescription        = trim((string) ($stored['description'] ?? '')) !== '';
            $wasEverSaved          = array_key_exists('description', $stored);
            $stored['show_description'] = ! $wasEverSaved || $hadDescription;
            $changed               = true;
        }

        foreach (self::LEGACY_TEXTS as $key => $legacy) {
            if (array_key_exists($key, $stored) && is_string($stored[$key]) && $stored[$key] === $legacy) {
                $stored[$key] = '';
                $changed      = true;
            }
        }

        if ($changed) {
            update_option(Options::OPTION, $stored);
        }
    }
}
