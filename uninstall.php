<?php
/**
 * Uninstall cleanup for Tipping.
 *
 * Runs when the plugin is deleted from wp-admin. Removes the options the plugin
 * creates. The `_tipping_amount` order meta is intentionally left in place: it
 * is part of completed orders' financial record and must not be erased.
 *
 * @package Tipping
 */

declare(strict_types=1);

defined('WP_UNINSTALL_PLUGIN') || exit;

delete_option('tipping_settings');
delete_option('tipping_db_version');

// The PRO banner's dismissal is stored per user, so it belongs to the
// plugin rather than to the site content. User meta is global, not
// per-site, which is why this uses delete_metadata's \$delete_all rather
// than a loop over the users of one blog.
delete_metadata('user', 0, 'tipping_pro_banner_dismissed', '', true);
