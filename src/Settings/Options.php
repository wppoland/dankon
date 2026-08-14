<?php

declare(strict_types=1);

namespace Tipping\Settings;

defined('ABSPATH') || exit;

/**
 * Typed accessor over the single `tipping_settings` option, merged on read over
 * the packaged defaults. Centralises option access and value coercion so the
 * service, frontend and admin layers all see the same shape.
 */
final class Options
{
    public const OPTION = 'tipping_settings';

    /** Allowed preset types. */
    public const TYPES = ['percent', 'fixed'];

    /** @var array<string, mixed>|null */
    private ?array $cache = null;

    /**
     * All settings merged over the packaged defaults.
     *
     * @return array<string, mixed>
     */
    public function all(): array
    {
        if (null !== $this->cache) {
            return $this->cache;
        }

        $stored = get_option(self::OPTION, []);

        if (! is_array($stored)) {
            $stored = [];
        }

        /** @var array<string, mixed> $defaults */
        $defaults = require \TIPPING_DIR . 'config/defaults.php';

        return $this->cache = array_merge($defaults, $stored);
    }

    /**
     * Forget the in-request cache (used after a save in the same request).
     */
    public function flush(): void
    {
        $this->cache = null;
    }

    public function isEnabled(): bool
    {
        return (bool) ($this->all()['enabled'] ?? false);
    }

    public function label(): string
    {
        $label = trim((string) ($this->all()['label'] ?? ''));

        return '' !== $label ? $label : __('Add a tip', 'plogins-tipping');
    }

    public function description(): string
    {
        return (string) ($this->all()['description'] ?? '');
    }

    /**
     * Preset type: 'percent' or 'fixed'.
     */
    public function type(): string
    {
        $type = (string) ($this->all()['type'] ?? 'percent');

        return in_array($type, self::TYPES, true) ? $type : 'percent';
    }

    public function isPercent(): bool
    {
        return 'percent' === $this->type();
    }

    /**
     * Cleaned, positive preset values in display order.
     *
     * @return list<float>
     */
    public function presets(): array
    {
        $raw = $this->all()['presets'] ?? [];

        if (! is_array($raw)) {
            return [];
        }

        $out = [];
        foreach ($raw as $value) {
            $value = (float) $value;
            if ($value > 0) {
                $out[] = $value;
            }
        }

        return array_values($out);
    }

    /**
     * Format a stored preset for display without trailing zeros: 2.5 stays
     * "2.5", 10.00 reads as "10". Shared so the admin field, the admin preview
     * and the storefront pills all show the same number.
     */
    public static function formatNumber(float $value): string
    {
        if (floor($value) === $value) {
            return (string) (int) $value;
        }

        return rtrim(rtrim(number_format($value, 2, '.', ''), '0'), '.');
    }

    /**
     * True when the control has something to render: enabled and with at least
     * one preset.
     */
    public function isUsable(): bool
    {
        return $this->isEnabled() && $this->presets() !== [];
    }
}
