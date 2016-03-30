<?php
/**
*
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'CLI_CONFIG_CANNOT_CACHED'			=> 'Nastavte tuto možnost, pokud se konfigurace mění příliš často na to, aby se vyplatilo ji cachovat.',
	'CLI_CONFIG_CURRENT'				=> 'Aktuální hodnota konfigurace, použijte jednu ze dvou možností (0 nebo 1)',
	'CLI_CONFIG_DELETE_SUCCESS'			=> 'Konfigurace %s úspěšně smazána.',
	'CLI_CONFIG_NEW'					=> 'Nová hodnota konfigurace, použijte 0 a 1 pro určení booleovských hodnot',
	'CLI_CONFIG_NOT_EXISTS'				=> 'Konfigurace %s neexistuje',
	'CLI_CONFIG_OPTION_NAME'			=> 'Název konfigurační možnosti',
	'CLI_CONFIG_PRINT_WITHOUT_NEWLINE'	=> 'Nastavte tuto možnost, pokud má být hodnota vytisknuta bez nového řádku na konci.',
	'CLI_CONFIG_INCREMENT_BY'			=> 'Zvýšit hodnotu o',
	'CLI_CONFIG_INCREMENT_SUCCESS'		=> 'Konfigurace %s úspěšně zvýšena',
	'CLI_CONFIG_SET_FAILURE'			=> 'Nelze nastavit konfiguraci %s',
	'CLI_CONFIG_SET_SUCCESS'			=> 'Úspěšně nastavená konfigurace %s',

	'CLI_DESCRIPTION_CRON_LIST'					=> 'Vytiskne seznam připravených a nepřipravených úkolů pro cron.',
	'CLI_DESCRIPTION_CRON_RUN'					=> 'Spustí všechny připravené úkoly pro cron.',
	'CLI_DESCRIPTION_CRON_RUN_ARGUMENT_1'		=> 'Název úkolu, který má být spuštěn',
	'CLI_DESCRIPTION_DB_MIGRATE'				=> 'Aktualizuje databázi aplikováním migrací.',
	'CLI_DESCRIPTION_DELETE_CONFIG'				=> 'Smaže konfigurační možnost',
	'CLI_DESCRIPTION_DISABLE_EXTENSION'			=> 'Zakáže určené rozšíření.',
	'CLI_DESCRIPTION_ENABLE_EXTENSION'			=> 'Povolí určené rozšíření.',
	'CLI_DESCRIPTION_FIND_MIGRATIONS'			=> 'Najde migrace, na kterých nic nezávisí.',
	'CLI_DESCRIPTION_GET_CONFIG'				=> 'Získá hodnotu konfigurační možnosti',
	'CLI_DESCRIPTION_INCREMENT_CONFIG'			=> 'Zvýší číselnou hodnotu konfigurační možnosti',
	'CLI_DESCRIPTION_LIST_EXTENSIONS'			=> 'Vypíše všechna rozšíření v databázi a v souborech.',
	'CLI_DESCRIPTION_OPTION_SAFE_MODE'			=> 'Spustit v bezpečném režimu (bez rozšíření).',
	'CLI_DESCRIPTION_OPTION_SHELL'				=> 'Spustí shell.',
	'CLI_DESCRIPTION_PURGE_EXTENSION'			=> 'Pročistí (smaže data) určené rozšíření.',
	'CLI_DESCRIPTION_RECALCULATE_EMAIL_HASH'	=> 'Přepočítá sloupeček user_email_hash v tabulce users.',
	'CLI_DESCRIPTION_SET_ATOMIC_CONFIG'			=> 'Nastaví hodnotu konfigurační možnosti jen v případě, že stará hodnota odpovídá aktuální hodnotě',
	'CLI_DESCRIPTION_SET_CONFIG'				=> 'Nastaví hodnotu konfigurační možnosti',

	'CLI_EXTENSION_DISABLE_FAILURE'		=> 'Nelze zakázat rozšíření %s',
	'CLI_EXTENSION_DISABLE_SUCCESS'		=> 'Rozšíření %s úspěšně zakázáno',
	'CLI_EXTENSION_ENABLE_FAILURE'		=> 'Nelze povolit rozšíření %s',
	'CLI_EXTENSION_ENABLE_SUCCESS'		=> 'Rozšíření %s úspěšně povoleno',
	'CLI_EXTENSION_NAME'				=> 'Jméno rozšíření',
	'CLI_EXTENSION_PURGE_FAILURE'		=> 'Nelze pročistit rozšíření %s',
	'CLI_EXTENSION_PURGE_SUCCESS'		=> 'Rozšíření %s úspěšně pročištěno',
	'CLI_EXTENSION_NOT_FOUND'			=> 'Nebylo nalezeno žádné rozšíření.',
	'CLI_EXTENSIONS_AVAILABLE'			=> 'Dostupné',
	'CLI_EXTENSIONS_DISABLED'			=> 'Zakázané',
	'CLI_EXTENSIONS_ENABLED'			=> 'Povolené',

	'CLI_FIXUP_RECALCULATE_EMAIL_HASH_SUCCESS'	=> 'Všechny haše emailů úspěšně přepočítány.',
));

// Additional help for commands.
$lang = array_merge($lang, array(
	'CLI_HELP_CRON_RUN'			=> $lang['CLI_DESCRIPTION_CRON_RUN'] . ' Optionally you can specify a cron task name to run only the specified cron task.',
));
