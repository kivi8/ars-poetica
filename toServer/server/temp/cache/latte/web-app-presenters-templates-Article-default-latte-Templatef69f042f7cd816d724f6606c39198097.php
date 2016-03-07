<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Article/default.latte

class Templatef69f042f7cd816d724f6606c39198097 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('efd8db6ded', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbae03ea0838_content')) { function _lbae03ea0838_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;if (isset($customFlashMessage)) { ?>
    <div class="flash"><?php echo Latte\Runtime\Filters::escapeHtml($customFlashMessage, ENT_NOQUOTES) ?></div>
<?php } ?>

<?php if ($articles) { ?>
    
    
    
<?php $iterations = 0; foreach ($articles as $article) { ?>    <div class="article-main col-md-6">
        
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:article", array($article->url)), ENT_COMPAT) ?>
"><img src="/media/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($article->id), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($article->photo), ENT_COMPAT) ?>" alt="Obrázek k článku"></a>
        
        <div class="article-info"><a class="name" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:detail", array($article->byUser)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml(\App\Helper\Helper::combineUserName($article->ref('byUser'), false), ENT_NOQUOTES) ?>
</a> <?php echo Latte\Runtime\Filters::escapeHtml($template->date($article->date, '%d.%m.%Y'), ENT_NOQUOTES) ?>
 <?php if ($article->underSection) { echo Latte\Runtime\Filters::escapeHtml($article->ref('underSection')->name, ENT_NOQUOTES) ;} if ($article->underSubSection) { ?>
\<?php echo Latte\Runtime\Filters::escapeHtml($article->ref('underSubSection')->name, ENT_NOQUOTES) ;} ?></div>
        
        <div class="article-title"><?php echo Latte\Runtime\Filters::escapeHtml($article->title, ENT_NOQUOTES) ?></div>
        <div class="article-desc"><?php echo Latte\Runtime\Filters::escapeHtml($article->description, ENT_NOQUOTES) ?></div>
        <a class="article-read" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:article", array($article->url)), ENT_COMPAT) ?>
">Číst celý článek</a>
    </div>    
<?php $iterations++; } ?>
    
    
    
    
    
<?php } else { ?>
    <span class="warning">Žádné články</span>
<?php } ?>







<?php
}}

//
// block right-column
//
if (!function_exists($_b->blocks['right-column'][] = '_lb10bf19697f_right_column')) { function _lb10bf19697f_right_column($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h2>EDITORIAL</h2>

<h4>Vítejte na stránkách Ars Poetica!</h4>

<img class="center-block" alt="Jindřich Čech" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/jindra-editorial.jpg">

<p>V době, kdy píšu tento nový editoriál, uběhlo od založení našeho projektu a časopisu Ars poetica již čtvrt roku. V průběhu té doby jsem já a ostatní redaktoři, korektoři a všichni ti, kdo pracují na Ars poetice, zjistili, že ne vždy je všechno tak lehké, jak se může zdát. 
I přesto nás tento projekt stále motivuje a baví. Jsme proto připraveni se zlepšovat a lépe plnit náš hlavní cíl, tedy být otevření a dávat možnost sdílet svoje myšlenky všem, kteří přinesou zajímavé nápady a chtějí se o ně podělit.
V dalších měsících bychom také chtěli začít pořádat akce jako jsou koncerty nebo výstavy, při kterých budou moci představit svou tvorbu i ti, kteří by v časopise nemohli. 
K tomu budeme potřebovat stále více dobrovolníků a lidí, kteří s námi budou celý projekt společně tvořit. Pokud byste se tedy chtěli zapojit nebo máte nápad, který byste rádi zrealizovali, či se chcete pouze zeptat a zjistit víc, napište nám! Budeme rádi za každý podnět!
 
<p>Jindřich Čech – šéfredaktor</p>
</p>

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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}