<?php
// source: /var/www/clients/client12/web1/web/app/presenters/templates/Article/section.latte

class Templatec043b8cab8a2325f04bee77eb78e241c extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2a0e20c197', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb548928dacf_title')) { function _lb548928dacf_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;echo Latte\Runtime\Filters::escapeHtml($section->name, ENT_NOQUOTES) ;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb48c7ca1507_content')) { function _lb48c7ca1507_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><ol class="breadcrumb">
  <li>
      <a href="Homepage:">Domů</a>
  </li>
<?php if (empty($subSections)) { ?>  <li>
      <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:default", array($section->ref('underSection')->url)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($section->ref('underSection')->name, ENT_NOQUOTES) ?></a>     
  </li>
<?php } ?>
  <li class="active">
      <?php echo Latte\Runtime\Filters::escapeHtml($section->name, ENT_NOQUOTES) ?>

  </li>
</ol>

<?php if ($user->isAllowed('Article', 'publish')) { ?>
    <p><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:Article:addArticle"), ENT_COMPAT) ?>
">Nový článek</a></p>
<?php } ?>
      
<div class="section-description">
    <?php echo Latte\Runtime\Filters::escapeHtml($section->description, ENT_NOQUOTES) ?>

</div>    

<?php $iterations = 0; foreach ($articles as $article) { ?><div class="article-main col-md-6">
        
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

<?php $iterations = 0; foreach ($subSections as $subSection) { ?>
    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Article:default", array($section->url ,$subSection->url)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($subSection->name, ENT_NOQUOTES) ?></a>
    
    
<?php $iterations++; } 
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>



<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}