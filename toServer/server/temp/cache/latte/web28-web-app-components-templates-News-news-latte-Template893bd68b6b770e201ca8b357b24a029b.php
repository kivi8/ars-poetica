<?php
// source: /var/www/clients/client3/web28/web/app/components/templates/News/news.latte

class Template893bd68b6b770e201ca8b357b24a029b extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2f85856100', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block _news
//
if (!function_exists($_b->blocks['_news'][] = '_lba024c807bc__news')) { function _lba024c807bc__news($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('news', FALSE)
;if (isset($permalink)) { ?><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("allNews!"), ENT_COMPAT) ?>
">Všechny zprávy</a>    
<?php } ?>
    
<?php $iterations = 0; foreach ($news as $new) { ?>
    <div class="news">
        <span><?php echo Latte\Runtime\Filters::escapeHtml($new->title, ENT_NOQUOTES) ?>: </span>
        <?php echo Latte\Runtime\Filters::escapeHtml($new->text, ENT_NOQUOTES) ?>

        <div>
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_presenter->link(":User:detail", array($new->byUser)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml(\App\Helper\Helper::combineUserName($new->ref('user')), ENT_NOQUOTES) ?></a>                      
            <?php echo Latte\Runtime\Filters::escapeHtml($new->keyWords, ENT_NOQUOTES) ?>

            <?php echo Latte\Runtime\Filters::escapeHtml($template->date($new->date, '%d.%m.%Y'), ENT_NOQUOTES) ?>

<?php if (!isset($permalink)) { ?>            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("permalink!", array($new->url)), ENT_COMPAT) ?>
">Link</a> 
<?php } ?>

<?php if ($authorizator->canUse('FastNews', $new->id)) { ?>            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_presenter->link(":Admin:News:moderate", array($new->id)), ENT_COMPAT) ?>">Upravit</a>
<?php } ?>
        </div>
    </div>
<?php $iterations++; } ?>

<?php if ($user->isAllowed('FastNews', 'add') && !isset($addNews)) { ?><a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("addNews!"), ENT_COMPAT) ?>
">Přidat novinku</a>
<?php } ?>

<?php if (isset($addNews)) { ?>
    <a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("noAdd!"), ENT_COMPAT) ?>
">Zavřít</a>
    <h4>Přidání novinky</h4>
    <div class="newsAdd">
<?php $_l->tmp = $_control->getComponent("addForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
    </div>
<?php } ?>

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
<h3>Novinky</h3>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); } ?>
<div id="<?php echo $_control->getSnippetId('news') ?>"><?php call_user_func(reset($_b->blocks['_news']), $_b, $template->getParameters()) ?>
</div><?php
}}