<?php
/** 
*
* help_faq [Čeština]
*
* @package language
* @version $Id: help_faq.php 492 2009-09-14 13:28:16Z ameeck $
* @copyright (c)  2007 phpBB.cz
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
* Original copyright: (c) 2005 phpBB Group
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
   exit;
}


// DEVELOPERS PLEASE NOTE 
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$help = array(
	array(
		0 => '--',
		1 => 'Registrace a přihlášení'
	),
	array(
		0 => 'Proč se nemohu přihlásit?',
		1 => 'Už jste se zaregistrovali? Před přihlášením je nutné se nejdříve registrovat. Byla vám na fóru zakázána činnost (v takovém případě se tato skutečnost zobrazí)? Pokud ano, kontaktujte administrátora a ptejte se na důvody. Pokud jste se registrovali, nebyli jste z fóra vyloučeni a stále se nemůžete přihlásit, znovu zkontrolujte přihlašovací jméno a heslo. Obvykle toto bývá problém a pokud není, kontaktujte administrátora, možná má chybné nastavení fóra.'
	),
	array(
		0 => 'Je vůbec potřeba se registrovat?',
		1 => 'Nemusíte. Je na administrátorovi fóra, jestli je potřeba se registrovat ke vkládání příspěvků. Samozřejmě, že registrace vám dá přístup k&nbsp;ostatním službám nedostupným anonymním uživatelům, jako např. postavičky, soukromé zprávy, posílání e-mailů uživatelům, přihlášení do skupin, atd. Vřele vám tedy registraci doporučujeme. Zabere to jen pár chvil.'
	),
	array(
		0 => 'Proč jsem automaticky odhlášen?',
		1 => 'Pokud nezaškrtnete tlačítko <i>Přihlásit automaticky při příští návštěvě</i>, budete přihlášeni jen po dobu práce na fóru. Toto má zabránit zneužití vašeho účtu někým jiným. Abyste zůstali přihlášeni, zaškrtněte toto políčko, když se přihlašujete. Toto ovšem nedoporučujeme, když se přihlašujete z veřejného počítače, např. v&nbsp;knihovně, internetové kavárně, univerzitě atd.'
	),
	array(
		0 => 'Jak zabráním, aby se moje uživatelské jméno objevilo v&nbsp;seznamu právě přihlášených?',
		1 => 'V Uživatelském panelu najdete pod položkou „Nastavení“ volbu <em>Skrýt moji přítomnost na fóru</em>. Volbou možnosti <samp>Ano</samp> aktivujete tuto funkci. Online vás uvidí pouze administrátoři, moderátoři a vy sami. Budete započítáváni mezi skryté uživatele.'
	),
	array(
		0 => 'Zapomněl jsem heslo!',
		1 => 'Nic se neděje, vaše heslo můžeme kdykoliv obnovit. V tomto případě zmáčkněte na přihlašovací stránce tlačítko <i>Zapomněl jsem svoje heslo</i>, pokračujte dle instrukcí a téměř ihned budete přihlášeni.'
	),
	array(
		0 => 'Zaregistroval jsem se, ale nemohu se přihlásit!',
		1 => 'Nejprve zkontrolujte, že zadáváte správné uživatelské jméno a heslo. Pokud jsou v&nbsp;pořádku, pak se mohla odehrát jedna z následujících dvou věcí. Pokud je umožněna podpora COPPA a klikli jste při registraci na odkaz <i>…a je mi méně než 13 let</i>, budete muset následovat zaslané instrukce. Pokud toto není ten případ, pak váš účet musí být aktivován. Některé boardy vyžadují aktivaci všech nových registrací, buď Vámi, nebo administrátorem před tím, než se budete moci přihlásit. Když jste se registrovali, byli byste k&nbsp;tomuto vyzváni. Pokud vám byl zaslán e-mail, následujte instrukce v&nbsp;něm obsažené, pokud jste tento e-mail neobdrželi, ujistěte se, že vámi zadaná e-mailová adresa je platná. Jedním důvodem, proč se aktivace používá, je zmenšit možnost výskytu <i>nežádoucích</i> uživatelů, kteří se snaží pouze obtěžovat. Pokud si jste jisti, že e-mailová adresa, kterou jste použili je platná, kontaktujte administrátora boardu.'
	),
	array(
		0 => 'V minulosti jsem se zaregistroval, ovšem nyní se nemohu přihlásit?!',
		1 => 'Nejspíše administrátor z nějakého důvodu smazal váš účet. To mohlo být z důvodu, že jste možná nevložili žádný příspěvek. Je to obvyklé, že se pravidelně odstraňují uživatelé, kteří ničím nepřispěli, aby se zmenšila velikost databáze. Zkuste se zaregistrovat znovu a zapojte se do diskuzí.'
	),
	array(
		0 => 'Co znamená COPPA?',
		1 => 'COPPA, neboli Child Online Privacy and Protection Act of 1998 je zákon ve Spojených Státech, který má za úkol chránit mládež na internetu. Stránky, kde je potencionální možnost ukládání osobních dat o&nbsp;uživateli, kterému je méně než 13 let, musí mít souhlas rodičů nebo zákonných zástupců, aby tyto data uložil. Tento zákon však platí pouze v&nbsp;jurisdikci Spojených Států. Pokud si nejste jisti, jestli toto platí i na vašem fóru, doporučujeme kontaktovat vaše právního poradce, phpBB Teams nemůže a nebude poskytovat právni podporu v&nbsp;jakémkoliv kontextu.',
	),
	array(
		0 => 'Proč se nemohu registrovat?',
		1 => 'Je možné, že vlastník fóra zabanoval vaši IP adresu nebo zakázal použití uživatelského jména, které jste si zvolili. Administrátor také mohl vypnout registrace, aby zabranil přístupu nových návštěvníků na fórum. Pro další informace kontaktuje administrátora fóra.',
	),
	array(
		0 => 'Co dělá odkaz „Smazat všechny cookies z fóra“?',
		1 => '„Smazat všechny cookies z fóra“ odstraní cookies, které jsou vytvořené phpBB a které vás udržují přihlášené, dále se také starají o&nbsp;funkce sledování nových příspěvků na fórech a v&nbsp;tématech, pokud to administrátor umožňuje. Smažte cookies fóra pokud máte potíže s&nbsp;přihlašováním.',
	),
	array(
		0 => '--',
		1 => 'Uživatelská nastavení'
	),
	array(
		0 => 'Jak změním svoje nastavení?',
		1 => 'Všechna vaše nastavení (pokud jste registrováni) jsou uložena v&nbsp;databázi. Ke změně stačí kliknout na odkaz <i>Uživatelský panel</i> (obvykle se nachází v&nbsp;horní části stránky). V následném rozhraní je možné si změnit veškerá svá nastavení.'
	),
	array(
		0 => 'Jak můžu zabránit tomu, aby bylo moje uživatelské jméno zobrazeno na seznamu uživatelů nacházejících se na fóru?',
		1 => 'V “Uživatelském panelu” na záložce “Nastavení fóra” -> “Obecné nastavení fóra” najdete možnost <em>Skrýt můj online stav</em>. Pokud u této možnosti nastavíte “Ano”, budete na seznamu viditelní jen pro administrátory, moderátory a sama sebe. Budete počítán jako skrytý uživatel.'
	),
	array(
		0 => 'Časy jsou špatně!',
		1 => 'Časy jsou téměř vždy v&nbsp;pořádku, ovšem to, co vidíte jsou časy zobrazené v&nbsp;jiném časovém pásmu než v&nbsp;tom, ve kterém se nacházíte. Pokud je to tak, změňte si časové pásmo v&nbsp;profilu. Berte na vědomí, časové pásma a další nastavení si mohou měnit jen registrovaní uživatelé. Anonymním uživatelům bude vždy zobrazen výchozí čas fóra.'
	),
	array(
		0 => 'Změnil jsem časové pásmo, ale je to stále špatně!',
		1 => 'Jste si jisti, že jste zadali časové pásmo správně, a přesto se čas liší od toho správného, pak jste pravděpodobně špatně nastavili letní nebo zimní čas, v&nbsp;uživatelském panelu máte ruční možnost přepnout mezi těmito dvěma časy. Pokud po správném nastavení čas pořád neodpovídá tomu současnému, je čas špatně nastaven přímo na serveru a musí být administrátorem opraven.'
	),
	array(
		0 => 'Můj jazyk není na seznamu!',
		1 => 'Administrátor nenainstaloval vaši lokalizaci nebo nikdo nepřeložil fórum do vašeho jazyka. Zkuste administrátora požádat o&nbsp;instalaci vašeho jazyka. Pokud lokalizace ve vašem jazyce neexistuje, můžete vytvořit nový překlad. Více informací je k&nbsp;nalezení na webových stránkách phpBB (viz odkaz na stránkách fóra dole).'
	),
	array(
		0 => 'Jak zobrazím obrázek pod uživatelským jménem?',
		1 => 'Tento obrázek se nazývá avatar. Lze změnit v&nbsp;Uživatelském panelu pod záložkou Profil. Způsoby jakými si můžete upravit avatar závisí na administrátorovi a nastavených oprávněních. Avatar si mohou nastavit pouze registrovaní uživatelé.'
	),
	array(
		0 => 'Jak změním svoje zařazení?',
		1 => 'Obecně vzato, svoje zařazení přímo změnit nemůžete (úrovně se objevují pod vaším uživatelským jménem v&nbsp;tématech a na vašem profilu, což záleží na použitém vzhledu). Většina boardů používají hodnocení úrovní k&nbsp;rozlišení počtu vámi přidaných příspěvků a k&nbsp;identifikaci určitých uživatelů, např. označení moderátorů a administrátorů může mít zvláštní vzhled. Prosím, nezatěžujte board zbytečným přispíváním jen, abyste dosáhli vyšší úrovně. Moderátor nebo administrátor pak může počet vašich příspěvků snížit.'
	),
	array(
		0 => 'Když kliknu na e-mailový odkaz uživatele, jsem vyzván k&nbsp;přihlášení!',
		1 => 'Pouze registrovaní uživatelé mohou posílat e-mail lidem přes nastavený e-mailový formulář (pokud administrátor tuto možnost povolil). Toto opatření umožňuje zbavit se otravných anonymních vzkazů a robotů, které sbírají e-mailové adresy.'
	),
	array(
		0 => '--',
		1 => 'Vkládání příspěvků'
	),
	array(
		0 => 'Jak vložím téma do fóra?',
		1 => 'Jednoduše. Klikněte na příslušné tlačítko na obrazovce fóra nebo tématu. Možná bude nutné se registrovat, než budete moci přispět do diskuze. To, co vám je povoleno můžete vidět na spodní části fóra nebo tématu (Např. <i>Můžete přidat nová téma do tohoto fóra, Můžete hlasovat v&nbsp;tomto fóru, atd.</i>).'
	),
	array(
		0 => 'Jak změním nebo smažu příspěvek?',
		1 => 'V případě, že nejste moderátor nebo administrátor, tak můžete upravovat nebo mazat jen svoje příspěvky. Můžete upravit zprávu (někdy jen do omezeného času po přispění) kliknutím na tlačítko <i>upravit</i>. Pokud již někdo odpověděl na váš příspěvek a vy ho upravíte, objeví se vám malinký dodatek u&nbsp;příspěvku, který ukazuje, kolikrát jste tento příspěvek upravovali. Tento dodatek se neobjeví, pokud zatím nikdo neodpověděl nebo pokud moderátor či administrátor změnili příspěvek (ti by měli sami zanechat vzkaz proč jej změnili). Normální uživatelé nemohou příspěvek smazat, pokud na něj již někdo odpověděl.'
	),
	array(
		0 => 'Jak přidám podpis k&nbsp;mému příspěvku?',
		1 => 'Přidat podpis znamená, že si musíte nejdřív nějaký vytvořit. To uděláte přes stránku <i>Profil</i>. Podpis můžete přidat k&nbsp;právě psanému příspěvku zatržením položky <i>Připojit podpis</i>. Můžete rovněž přidat stejný podpis pro všechny vaše příspěvky zaškrtnutím příslušného políčka v&nbsp;nastavení profilu (je možné nepřidávat podpis k&nbsp;vybraným příspěvkům odstraněním tohoto zaškrtnutí).'
	),
	array(
		0 => 'Jak vytvořím hlasování?',
		1 => 'Vytvoření hlasování je jednoduché. Když přidáte nový příspěvek (nebo upravujete první příspěvek, pokud můžete) měli byste vidět tlačítko <i>Přidat hlasování</i> pod hlavním oknem na přidávání příspěvků (pokud to nevidíte, zřejmě nemáte oprávnění vytvářet ankety). Měli byste zadat název ankety a pak alespoň dvě možnosti (nastavte napsáním název otázky a klikněte na <i>Přidat odpověď</i>. Můžete také přidat časový limit pro anketu, kde 0 znamená neomezenou volbu. Počet odpovědí, které můžete zadat, určuje administrátor boardu.'
	),
	array(
		0 => 'Proč nemohu přidat více možností pro hlasování?',
		1 => 'Maximální počet možností stanovuje administrátor. Pokud si myslíte, že opravdu nezbytně potřebujete více možností, kontaktujte administrátora fóra pro další informace.'
	),
	array(
		0 => 'Jak změním nebo smažu hlasování?',
		1 => 'Je to stejné jako s&nbsp;příspěvky, hlasování mohou být upravována původním autorem, moderátorem nebo administrátorem. Úpravu zahájíte kliknutím na první příspěvek v&nbsp;tématu (toto je vždy s&nbsp;hlasováním spojeno). Pokud nikdo zatím nehlasoval, pak uživatelé mohou vymazat nebo změnit položku v&nbsp;hlasování, v&nbsp;případě již uskutečněné volby to tak může učinit jen moderátor nebo administrátor. Tímto opatřením se snažíme zabránit manipulaci s&nbsp;výsledky hlasování.'
	),
	array(
		0 => 'Proč se nemohu dostat k&nbsp;fóru?',
		1 => 'Některá fóra mohou být znepřístupněna určitým lidem či skupinám. Ke čtení, prohlížení, přispívání atd. potřebujete zvláštní autorizaci, kterou může poskytnout jen moderátor a administrátor, takže je kontaktujte.'
	),
	array(
		0 => 'Proč nemohu přidávat přílohy?',
		1 => 'Administrátor může povolovat přidávání příloh pro jednotlivá fóra, uživatele, nebo skupiny. Pokud nemáte dostatečná oprávnění z jedné z těchto možností, nebo některé z nich úplně zabraňují přidávat přílohy, nezobrazí se vám tato možnost při odesílání příspěvků.'
	),
	array(
		0 => 'Proč jsem obdržel varování?',
		1 => 'Každý administrátor si může stanovit vlastní pravidla na svém fóru, pokud je porušíte, může vám být uděleno varování. Prosíme berte na vědomí, že toto je plně v&nbsp;kompetenci administrátorů fóra a phpBB Group nemá s&nbsp;vydáváním varování nic společného.'
	),
	array(
		0 => 'Jak mohu nahlásit příspěvek moderátorům?',
		1 => 'Administrátor může na fóru povolit nahlašování vadných příspěvků uživateli. Pokud je tato možnost povolena, u&nbsp;každého příspěvku uvidíte ikonu, která vás přivede na formulář, kde vyplníte všechny nezbytné informace pro nahlášení příspěvku.'
	),
	array(
		0 => 'K čemu slouží tlačítko „Uložit“ při psaní příspěvků?',
		1 => 'Tato možnost vám umožňuje uložit si rozepsané zprávy pro pozdější odeslání. Pro jejich opětovné načtení navštivte uživatelský panel, odkud jsou dostupné odpovídající nástroje.'
	),
	array(
		0 => 'Proč musí být můj příspěvek schválen?',
		1 => 'Administrátor fóra může nastavit, že příspěvky od uživatelů nebo skupin musí být před zobrazením schváleny moderátory. Buďto je tedy na fóru nastaveno schvalování, nebo jste byli umístěny do skupiny, u&nbsp;které je schvalování vyžadováno. Kontaktujte administrátora fóra pro více informací.'
	),
	array(
		0 => 'Jak mohu oživit svoje téma?',
		1 => 'Kliknutím na odkaz „Oživit téma“, pokud ho vidíte, můžete „oživit“ téma, čímž ho posunete na první místo v&nbsp;přehledu témat. Pokud tento odkaz nevidíte, administrátor tuto možnost pravděpodobně vypnul. Téma můžete „oživit“ také přidáním nového příspěvku, ale dbejte na to, abyste neporušili pravidla fóra.'
	),
  array(
		0 => '--',
		1 => 'Formátování a typy příspěvků'
	),
	array(
		0 => 'Co je BBCode?',
		1 => 'BBCode je zvláštní implementace HTML. O jeho použití rozhoduje administrátor (můžete toto nepovolit pro jednotlivé příspěvky). BBCode sám o&nbsp;sobě je podobný stylu HTML, tagy jsou uzavřeny v&nbsp;hranatých závorkách [ a ] a nabízí větší kontrolu nad tím, co a jak se zobrazí. Pro více informací o&nbsp;BBCode si prohlédněte stránku, která je dostupná přes stránku přispívání.'
	),
	array(
		0 => 'Můžu používat HTML?',
		1 => 'Bohužel nelze používat jakékoliv HTML formátování na tomto fóru a ani nelze tuto možnost zapnout, administrátor však může definovat vlastní BBCode značky, které mohou HTML nahradit.'
	),
	array(
		0 => 'Co to jsou smajlíci (emotikony)?',
		1 => 'Smajlíci, neboli emotikony jsou malé grafické obrázky, které se používají k&nbsp;vyjádření výrazu emocí za použití malého kódu, např. :) znamená šťastný, :( znamená smutný. Kompletní seznam smajlíků si můžete prohlédnout přes příspěvkový formulář. Prosím, snažte se tyto smajlíky nezneužívat, aby se příspěvek nestal nečitelným. Moderátor může také případně váš příspěvek v&nbsp;tomto směru změnit.'
	),
	array(
		0 => 'Mohu přidávat obrázky?',
		1 => 'Obrázky se mohou zobrazovat ve vašich příspěvcích, ačkoliv v&nbsp;současné době neexistuje žádná funkce k&nbsp;nahrání obrázků přímo na board. Z tohoto důvodu musíte uvést na takový obrázek odkaz, např. http://www.priklad.cz/muj-obrazek.png. Nemůžete vytvářet odkazy na obrázky umístěné na vlastním PC (pokud to není veřejně přístupná stanice) nebo obrázky za prověřujícími mechanismy, např. schránky hotmail nebo yahoo, zaheslované odkazy, atd. K zobrazení obrázku použijte buď BBCode [img] tag nebo příslušné HTML (je-li povoleno).'
	),
	array(
		0 => 'Co to jsou Globální oznámení?',
		1 => 'Globální oznámení obsahují důležité informace, které byste si měli přečíst co nejdříve. Globální oznámení se zobrazují nad každým fórem a také ve vašem uživatelském panelu. To, jestli můžete odesílat globální oznámení, záleží na nastavených oprávněních, které nastavují administrátoři.'
	),
	array(
		0 => 'Co to jsou oznámení?',
		1 => 'Oznámení často přinášejí důležité informace a měli byste je číst co nejdříve. Oznámení se objevují na horní části každé stránky fóra, kde jsou uvedeny. Zda můžete či nemůžete přidávat oznámení do fóra, záleží na tom, zdali vám to administrátor umožnil.'
	),
	array(
		0 => 'Co to jsou důležitá témata?',
		1 => 'Důležitá témata se objevují na fóru hned pod oznámeními, ale pouze na první stránce. Jsou často velmi důležitá, takže si je přečtěte tam, kde jsou. Stejně jako u&nbsp;oznámení rozhoduje administrátor, kteří uživatelé mají právo přidávat důležitá témata.'
	),
	array(
		0 => 'Co to jsou uzamčená témata?',
		1 => 'Témata mohou být uzamčena moderátorem nebo administrátorem. Nemůžete odpovídat na zamčená témata ani upravovat své příspěvky. Každé hlasování je automaticky ukončeno. Témata mohou být uzamčena z mnoha různých důvodů.'
	),
	array(
		0 => 'Co jsou ikony témat?',
		1 => 'Ikony témat jsou obrázky, které mohou být spojeny s&nbsp;příspěvkem pro vyjádření jeho obsahu. Ikony můžete používat pouze pokud k&nbsp;tomu nastavil administrátor příslušná oprávnění.'
	),
	// This block will switch the FAQ-Questions to the second template column
	array(
		0 => '--',
		1 => '--'
	),
	array(
		0 => '--',
		1 => 'Uživatelské úrovně a skupiny'
	),
	array(
		0 => 'Kdo jsou administrátoři?',
		1 => 'Administrátoři jsou lidé pověření nejvyšší kontrolou nad celým fórem. Tito lidé mohou kontrolovat veškerý chod boardu včetně povolování, zakazování uživatelů, vytváření uživatelských skupin nebo moderátorů, atd. Mají také všechny pravomoci moderátorů na celém boardu.'
	),
	array(
		0 => 'Kdo jsou moderátoři?',
		1 => 'Moderátoři jsou jednotlivci (nebo skupiny jednotlivců), jejichž práce je starat se o&nbsp;chod fóra každý den. Mají právo upravovat nebo mazat příspěvky, zamykat/odemykat, přesouvat, mazat a rozdělovat témata, která spravují. Obecně řečeno, moderátoři jsou od toho, aby lidé nepřispívali <i>mimo téma</i> nebo nepřidávali otravný materiál.'
	),
	array(
		0 => 'Co jsou uživatelské skupiny?',
		1 => 'Uživatelské skupiny jsou cestou, kterou administrátoři mohou seskupovat uživatele. Každý uživatel může patřit do několika skupin a každé skupině může být definován individuální přístup. To umožňuje administrátorům snáze nastavit několik uživatelů jako moderátory fóra nebo jim dát přístup na soukromé fórum, atd.'
	),
	array(
		0 => 'Kde jsou uživatelské skupiny a jak se mohu do některé zařadit?',
		1 => 'Všechny uživatelské skupiny najdete v&nbsp;Uživatelském panelu pod položkou Skupiny. Chcete-li se k&nbsp;některé připojit, pokračujte kliknutím na příslušné tlačítko. Nicméně ne všechny skupiny mají otevřený přístup. Některé mohou vyžadovat schválení k&nbsp;přístupu, některé mohou být uzavřené a některé mohou mít dokonce skryté členství. Je-li skupina otevřená, můžete se připojit kliknutím na příslušné tlačítko. Vyžaduje-li skupina schválení, můžete o&nbsp;něj zažádat kliknutím na příslušné tlačítko. Moderátor skupiny musí vaši žádost schválit a může se vás zeptat na důvod žádosti. Prosím, nedotírejte na moderátora skupiny, pokud vaši žádost zamítne; bude mít své důvody.'
	),
	array(
		0 => 'Jak se stanu moderátorem uživatelské skupiny?',
		1 => 'Uživatelské skupiny jsou původně vytvořeny administrátorem a mohou také ustanovit moderátora. Máte-li zájem vytvořit uživatelskou skupinu, pak jako prvního kontaktujte administrátora soukromou zprávou.'
	),
	array(
		0 => 'Proč mají některé skupiny jinou barvu?',
		1 => 'Je možné, aby administrátor fóra přidělil členům určité skupiny barvu, pro usnadnění jejich odlišení od ostatních členů.'
	),
	array(
		0 => 'Co je „Výchozí uživatelská skupina“?',
		1 => 'Pokud jste členem více skupiny, vaše výchozí skupina určuje, jakou barvu bude mít vaše uživatelské jméno. Administrátor fóra vám může udělit oprávnění menit si svou výchozí skupinu přes uživatelský panel.'
	),
	array(
		0 => 'Co znamená odkaz „Tým“?',
		1 => 'Tato stránka vám poskytuje přehled členů týmu fóra, včetně administrátorů a moderátorů včetně dalších informací, jako např. která fóra moderují.'
	),
	array(
		0 => '--',
		1 => 'Soukromé zprávy'
	),
	array(
		0 => 'Nemůžu posílat soukromé zprávy!',
		1 => 'Pro toto existují tři hlavní důvody. Nejste registrovaní nebo nejste přihlášení, administrátor zakázal posílání soukromých zpráv pro celý board nebo to administrátor zakázal přímo vám. Pokud je toto ten důvod, zeptejte se administrátora, proč to tomu tak je.'
	),
	array(
		0 => 'Dostávám nechtěné soukromé zprávy!',
		1 => 'Plánujeme přidání seznamu ignorovaných uživatelů v&nbsp;systému zasílání soukromých zpráv. Nyní, pokud dostáváte takové zprávy, kontaktujte svého administrátora, který má tu moc takovému uživateli zasílání zpráv zakázat.'
	),
	array(
		0 => 'Dostal jsem spamový a obtížný e-mail od někoho z fóra!',
		1 => 'To je nám líto. Příspěvkové formuláře obsahují obranné mechanismy, kterými se snažíme vystopovat takového uživatele. Měli byste napsat administrátorovi a zaslat kopii e-mailu, který jste obdrželi, což je velmi důležité (kvůli hlavičce, která potřebné informace obsahuje). Oni pak mohou konat.'
	),
	array(
		0 => '--',
		1 => 'Přátelé a nepřátelé'
	),
	array(
		0 => 'Co je můj seznam přátel a nepřátel?',
		1 => 'Tyto seznamy můžete využít k&nbsp;utřídění ostatních uživatelů na fóru. Například uživatelé ve vašem seznamu přátel budou zobrazeni ve vašem uživatelském panelu se svým stavem a budete z nich moci rychle vybírat např. při psaní soukromých zpráv. Pokud to umožňuje vzhled fóra, příspěvky od těchto uživatelů budou zvýrazněny. Pokud přidáte uživatele do seznamu nepřátel, jeho příspěvky vám ve výchozím stavu nebudou zobrazovány.'
	),
	array(
		0 => 'Jak mohu přidávat uživatele do seznamů nebo je z nich odebírat?',
		1 => 'Můžete přidávat uživatele dvěma způsoby. V profilu každého uživatele je odkaz pro jeho přidání do jednoho z obou seznamů. Dále můžete použít svůj uživatelský panel, kde můžete přímo zadat uživatelská jména do odpovídajícího pole. Zde také odebíráte členy z vašich seznamů.'
	),
	array(
		0 => '--',
		1 => 'Hledání na fóru'
	),
	array(
		0 => 'Jak mohu hledat v&nbsp;jednom nebo více fórech?',
		1 => 'Vloženém hledaného výrazu do vyhledávacího pole umístěného na titulní stránce, na fórech nebo v&nbsp;tématech. Pro Pokročilé vyhledávání klikněte na odkaz „Hledat“, který je dostupný ze všech stránek fóra. Způsob, jakým se přistupuje k&nbsp;vyhledávání se může lišit podle použitého vzhledu.'
	),
	array(
		0 => 'Proč můj dotaz vrací nulový počet výsledků?',
		1 => 'Vámi hledaný výraz byl pravděpodobně příliš obecný a obsahoval příliš mnoho častých slov, které nejsou indexovány. Upřesněte váš požadavek a využijte možností pokročilého vyhledávání.'
	),
	array(
		0 => 'Proč mi vyhledávání vrací prázdnou bílou stránku!?',
		1 => 'Váš dotaz vrátil příliš mnoho výsledků, které server nebyl schopen zpracovat. Upřesněte váš požadavek a využijte možností pokročilého vyhledávání.'
	),
	array(
		0 => 'Jak mohu vyhledávat členy fóra?',
		1 => 'Přejděte na stránku „Členové“ a klikněte na odkaz „Vyhledat uživatele“, kde můžete pomocí různých parametrů uživatele vyhledat.'
	),
	array(
		0 => 'Jak mohu najít své vlastní příspěvky a témata?',
		1 => 'K vašim příspěvkům se můžete dostat kliknutím na odkaz „Hledat uživatelovy příspěvky“ v&nbsp;Uživatelském panelu, nebo přes váš profil. Pro vyhledání témat, které jste odeslali, využijte stránku pokročilého vyhledávání, kde zadáte odpovídající kritéria.'
	),
	array(
		0 => '--',
		1 => 'Sledování témat a záložky'
	),
	array(
		0 => 'Jaký je rozdíl mezi sledováním a záložkami?',
		1 => 'Záložkování v&nbsp;phpBB3 je velmi podobné záložkám, které znáte z vašeho prohlížeče. Nejste upozorněni, když přijde nový příspěvek, ale můžete se kdykoliv do tématu jednoduše vrátit. Sledování vám ale naopak usnadní procházení tím, že vás kontaktuje vámi vybraným způsobem při novém dění v&nbsp;tématu nebo fóru.'
	),
	array(
		0 => 'Jak mohu sledovat zvolená témata nebo fóra?',
		1 => 'Pro sledování jednotlivého fóra, klikněte po vstupu na něj na odkaz „Sledovat toto fórum“. Pro sledování tématu klikněte na odpovídající odkaz v&nbsp;něm nebo při odesílání příspěvku zvolte možnost sledovat toto téma.'
	),
	array(
		0 => 'Jak mohu zrušit sledování témat?',
		1 => 'Pro zrušení sledování témat, přejděte na Uživatelský panel a následujte odkazy do sekce Sledování.'
	),
	array(
		0 => '--',
		1 => 'Přílohy'
	),
	array(
		0 => 'Jaké přílohy jsou povolené na tomto fóru?',
		1 => 'Každý administrátor fóra může povolit nebo zakázat jednotlivé druhy příloh. Pokud si nejste jisti, které soubory mohou být nahrávány, kontaktuje administrátora fóra.'
	),
	array(
		0 => 'Jak si mohu zobrazit všechny své přílohy?',
		1 => 'Pro zobrazení kompletního seznamu vámi nahraných příloh, přejděte na Uživatelský panel a následujte odkazy do části s&nbsp;přílohami.'
	),
	array(
		0 => '--',
		1 => 'Záležitosti okolo phpBB 3'
	),
	array(
		0 => 'Kdo napsal tento program?',
		1 => 'Tento software (v její nemodifikované formě) je vytvořen, zveřejněn a chráněn autorskými právy <a href="http://www.phpbb.com/" rel="external">phpBB Group</a>. Je dostupný pod the GNU General Public Licence a může být volně distribuován. Pro více informací klikněte <a href="http://www.phpbb.com/" rel="external">zde</a>.'
	),
	array(
		0 => 'Proč není k&nbsp;dispozici funkce X?',
		1 => 'Tento software byl napsán a licencován přes phpBB Group. Máte-li dojem, že je potřeba přidat nějakou funkci, nebo chcete nahlásit chybu, navštivte, prosím, stránku phpBB <a href="http://area51.phpbb.com/">Area51</a>, na které k tomu najdete prostředky.'
	),
	array(
		0 => 'Koho mám kontaktovat ohledně obtěžujících e-mailů nebo právních záležitostí fóra?',
		1 => 'Měli byste kontaktovat administrátora tohoto fóra. Jestliže ho nemůžete najít, zkuste nejprve kontaktovat moderátora fóra a přeptejte se na kontakt. Pokud se nic neděje, kontaktujte majitele domény (zkuste vyhledat na „whois“) nebo, pokud tato služba běží na freeserveru (např. yahoo, IC, webzdarma, atd.), management nebo oddělení stížností tohoto provozovatele. Berte na vědomí, že phpBB Group nemá vůbec žádnou moc a nemůže nijak ovlivnit to jak, kdo a kde spravuje board. Je tedy absolutně bezpředmětné kontaktovat phpBB Group v&nbsp;jakékoliv právní záležitosti (nactiutrhání, pomluvy, atd.) nepřímo spojený s&nbsp;phpbb.com nebo se samotným software phpBB. Pokud zašlete e-mail phpBB Group o&nbsp;použití softwaru třetí stranou, neočekávejte žádnou odpověď.'
	),
	array(
		0 => 'Jak můžu kontaktovat administrátora fóra?',
		1 => 'Všichni uživatelé fóra můžou použít formulář “Kontaktujte nás”, který se nachází naspodu všech stránek, pokud je tato možnost povolena administrátorem fóra.<br />Přihlášení uživatelé můžou také použít odkaz “Tým”, který se také nachází naspodu všech stránek.',
	)
);

?>