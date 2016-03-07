<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/News/default.latte

class Templatef1e562f05b8588472d4f21b2a6c00376 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('944ebce089', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb4d1a464d57_title')) { function _lb4d1a464d57_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>Rychlé zprávy - novinky<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb0d6677209b_content')) { function _lb0d6677209b_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('pubNews') ?>"><?php call_user_func(reset($_b->blocks['_pubNews']), $_b, $template->getParameters()) ?>
</div>
<?php if ($newsDel) { ?>
<div id="<?php echo $_control->getSnippetId('delNews') ?>"><?php call_user_func(reset($_b->blocks['_delNews']), $_b, $template->getParameters()) ?>
</div><?php } ?>

<h2>Přidat novinku</h2>

<?php $_l->tmp = $_control->getComponent("addNewsForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>


<?php
}}

//
// block _pubNews
//
if (!function_exists($_b->blocks['_pubNews'][] = '_lbefab55ca24__pubNews')) { function _lbefab55ca24__pubNews($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('pubNews', FALSE)
;Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'news', array('news'=>$news, 'paginator'=>$paginator, 'for' => 'pub') + $template->getParameters()) ;
}}

//
// block _delNews
//
if (!function_exists($_b->blocks['_delNews'][] = '_lb8237bbfde2__delNews')) { function _lb8237bbfde2__delNews($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('delNews', FALSE)
?>        <h2>Smazané zprávy</h2>

<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'news', array('news'=>$newsDel, 'paginator'=>$paginatorDel, 'for' => 'del') + $template->getParameters()) ;
}}

//
// block news
//
if (!function_exists($_b->blocks['news'][] = '_lb60f1edb5b7_news')) { function _lb60f1edb5b7_news($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;$iterations = 0; foreach ($news as $new) { ?>
    <div class="news">
        <span><?php echo Latte\Runtime\Filters::escapeHtml($new->title, ENT_NOQUOTES) ?>: </span>
        <?php echo Latte\Runtime\Filters::escapeHtml($new->text, ENT_NOQUOTES) ?>

        <div>
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":User:detail", array($new->byUser)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml(\App\Helper\Helper::combineUserName($new->ref('user')), ENT_NOQUOTES) ?></a>                      
            <?php echo Latte\Runtime\Filters::escapeHtml($new->keyWords, ENT_NOQUOTES) ?>

            <?php echo Latte\Runtime\Filters::escapeHtml($template->date($new->date, '%d.%m.%Y'), ENT_NOQUOTES) ?>

            Permalink: <?php echo Latte\Runtime\Filters::escapeHtml($new->url, ENT_NOQUOTES) ?>


            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("News:moderate", array($new->id)), ENT_COMPAT) ?>
">Upravit</a>
        </div>
    </div>
<?php $iterations++; } ?>

<?php if ($paginator->getLastPage() != 1) { ?>
<ul class="pagination">    
<?php for ($page = 1; $page <= $paginator->getLastPage(); $page++) { if ($page == $paginator->page) { ?>
        <li class="active">
            <span><?php echo Latte\Runtime\Filters::escapeHtml($page, ENT_NOQUOTES) ?></span>
        </li>    
<?php } else { ?>
        <li>
            <a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("page!", array($page, $for)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($page, ENT_NOQUOTES) ?> </a>
        </li>    
<?php } } ?>
</ul>
<?php } 
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