<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Homepage/creativeCommons.latte

class Template30eede43b50c1618589350ccdccab57b extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('d9dd4f8032', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbeaea30526d_title')) { function _lbeaea30526d_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Licence obsahu webu<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb18a9615e10_content')) { function _lb18a9615e10_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>Můžete naše dílo</h2>
<ul>
<li>
<strong>Sdílet</strong> — rozmnožovat a distribuovat materiál prostřednictvím jakéhokoli média v jakémkoli formátu
</li>
<li>
<strong>Upravit</strong> — změnit a vyjít z původního díla
</li>
</ul>
<ul>
<li class="license">Poskytovatel licence nemůže odvolat tato oprávnění do té doby, dokud dodržujete licenční podmínky.</li>
</ul>

<h2>Za těchto podmínek</h2>

<ul>
    <li>
        <strong>Uveďte původ</strong> — Je Vaší povinností uvést autorství, poskytnout s dílem odkaz na licenci a vyznačit Vámi provedené změny. Toho můžete docílit jakýmkoli rozumným způsobem, nicméně nikdy ne způsobem naznačujícím, že by poskytovatel licence schvaloval nebo podporoval Vás nebo Váš způsob užití díla. 
    </li>
    <li>
        <strong>Neužívejte dílo komerčně</strong> — Je zakázáno užívat dílo pro komerční účely. 
    </li>
    <li>
        <strong>Zachovejte licenci</strong> — Pokud budete toto dílo upravovat, pozměňovat nebo na něj navazovat, musíte svoje odvozená díla vystavovat pod stejnou licencí jako původní dílo. 
    </li>    
</ul>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); } ?>

<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}