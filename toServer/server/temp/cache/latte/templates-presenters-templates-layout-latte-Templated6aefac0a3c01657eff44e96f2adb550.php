<?php
// source: /var/www/clients/client12/web1/web/app/AdminModule/templates/../../presenters/templates/@layout.latte

class Templated6aefac0a3c01657eff44e96f2adb550 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('07ecc14746', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbf18c6dbe98_scripts')) { function _lbf18c6dbe98_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/modernizr.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/jquery.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/netteForms.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/nette.ajax.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/vendor/magnific.min.js"></script>

<?php if (\Tracy\Debugger::$productionMode) { ?>
        <script>      
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-70901554-1', 'auto');
            ga('send', 'pageview');
        </script>
        
        <script>
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//piwik.arspoetica.net/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<?php } ?>
<noscript><p><img src="//piwik.arspoetica.net/piwik.php?idsite=1" style="border:0;" alt=""></p></noscript>
        
<?php
}}

//
// block _menu
//
if (!function_exists($_b->blocks['_menu'][] = '_lbf762a9399b__menu')) { function _lbf762a9399b__menu($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('menu', FALSE)
?>                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            
<?php $iterations = 0; foreach ($menu as $menuItem) { $current = $presenter->isLinkCurrent(':Article:', array('section' => $menuItem->url)) ?>

                            <li class="<?php if ($current) { ?>active <?php } ?> nav-main">
                                <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(':Article:'.$menuItem->url), ENT_COMPAT) ?>
">
                                    <?php echo Latte\Runtime\Filters::escapeHtml($menuItem->name, ENT_NOQUOTES) ?>

<?php if ($current) { ?>                                    <span class="sr-only">(current)</span>
<?php } ?>
                                </a>
                            </li>
<?php $iterations++; } ?>
                        </ul>      
                                    
                        <ul class="nav navbar-nav navbar-right">
                                                                                  
<?php if ($user->isLoggedIn()) { ?>
                                
<?php if ($user->isAllowed('Admin', 'can')) { ?>                                <li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent(':Admin:Homepage:default')?'active' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>
                                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Admin:Homepage:default"), ENT_COMPAT) ?>
">Administrace</a>
<?php if ($presenter->isLinkCurrent(':Admin:Homepage:default')) { ?>                                    <span class="sr-only">(current)</span>
<?php } ?>
                                </li>                                                              
<?php } ?>
                                         
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo Latte\Runtime\Filters::escapeHtml(App\Helper\Helper::combineUserName($user->getIdentity()->data), ENT_NOQUOTES) ?> <span class="caret"></span></a>
                                                             
                                    <ul class="dropdown-menu">
                                        <li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent(':Setting:')?'active' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>
                                            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Setting:"), ENT_COMPAT) ?>
">Osobní nastavení</a>
<?php if ($presenter->isLinkCurrent(':Setting:')) { ?>                                            <span class="sr-only">(current)</span>
<?php } ?>
                                        </li>    
                                
                                        <li>
                                            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Log:out"), ENT_COMPAT) ?>
">Odhlásit <i class="fa fa-sign-out"></i></a>
                                        </li> 
                                    </ul>   
                                    
                                    </li>
<?php } else { ?>
                                <li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent(':Log:in')?'active' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>
                                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Log:in"), ENT_COMPAT) ?>
">Přihlásit <i class="fa fa-sign-in"></i></a>
<?php if ($presenter->isLinkCurrent(':Log:in')) { ?>                                    <span class="sr-only">(current)</span>
<?php } ?>
                                </li>
                                
                                <li<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent(':Log:register')?'active' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>
                                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Log:register"), ENT_COMPAT) ?>
">Registrovat</a>
<?php if ($presenter->isLinkCurrent(':Log:register')) { ?>                                    <span class="sr-only">(current)</span>
<?php } ?>
                                <li>  
<?php } ?>
                            
                            
                        </ul>             
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
<?php
}}

//
// block _flashMessage
//
if (!function_exists($_b->blocks['_flashMessage'][] = '_lb7d55974f2c__flashMessage')) { function _lb7d55974f2c__flashMessage($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('flashMessage', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>                <div<?php if ($_l->tmp = array_filter(array('alert', 'alert-'.$flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
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
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>Ars poetica</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="apple-touch-icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/icon/apple-icon-180x180.png.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/icon/favicon-16x16.png">
                
        <link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/magnific-popup.css.css">
        
        <link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/styles.css">
        
<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->           
    
        <div class="container">
            
            <header class="col-md-12 logo-main"> 
                                
                <a href="/">
                    <div class="logo-text"></div>
                </a>
                      
                <ul class="navbar-secondary">
                    <li class="searchForm">
                        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["searchForm"], array()) ?>

                            <?php echo $_form["find"]->getControl() ?>

                            <?php echo $_form["search"]->getControl() ?>

                        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

                        
                    </li>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Homepage:kontakt"), ENT_COMPAT) ?>
">
                            <div<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Homepage:kontakt')?'active-top-menu' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>Kontakt <i class="fa fa-book fa-lg"></i></div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Homepage:o-nas"), ENT_COMPAT) ?>
">
                            <div<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Homepage:o-nas')?'active-top-menu' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>O nás <i class="fa fa-info fa-lg"></i></div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Homepage:diskuze"), ENT_COMPAT) ?>
">
                           <div<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Homepage:diskuze')?'active-top-menu' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>Diskuze <i class="fa fa-comments-o fa-lg"></i></div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Homepage:redakce"), ENT_COMPAT) ?>
">
                            <div<?php if ($_l->tmp = array_filter(array($presenter->isLinkCurrent('Homepage:redakce')?'active-top-menu' : NULL))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>>Redakce <i class="fa fa-users fa-lg"></i></div>
                        </a>
                    </li>
                </ul>
                
            </header>
                
            <div class="clearfix"></div>
            
            <noscript>
                Pro plnou funkčnost těchto stránek je nutné povolit JavaScript.
                Zde jsou <a href="http://www.enable-javascript.com/cz/" target="_blank">
                instrukce jak povolit JavaScript ve Vašem webovém prohlížeči</a>.
            </noscript>
            
            <nav class="navbar navbar-default navbar-static-top"<?php echo ' id="' . $_control->getSnippetId('menu') . '"' ?>>
<?php call_user_func(reset($_b->blocks['_menu']), $_b, $template->getParameters()) ?>
            </nav>              
                
            <div class="col-md-9">
                
<div id="<?php echo $_control->getSnippetId('flashMessage') ?>"><?php call_user_func(reset($_b->blocks['_flashMessage']), $_b, $template->getParameters()) ?>
</div>            
<?php if (isset($_b->blocks["title"])) { ?>            <div div class="page-header"><h1><?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()) ?></h1></div>
<?php } ?>
                        
            
                <article>   
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
                </article>
            </div>    
                             
            <aside class="col-md-3">                               
                
<?php if (isset($_b->blocks["right-column"])) { Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'right-column', $template->getParameters()) ?>
                    <hr>
<?php } ?>
                 
                <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":SendArticle:"), ENT_COMPAT) ?>
">Poslat do redakce</a>
                    <hr>
                   
<?php $_l->tmp = $_control->getComponent("news"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
                               
            </aside>
                           
            
            <footer class="col-md-12">
                <hr>
                <p>&copy; <?php echo Latte\Runtime\Filters::escapeHtml(date("Y"), ENT_NOQUOTES) ?>
 arspoetica.net | Všechny materiály pod licencí <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:creativeCommons"), ENT_COMPAT) ?>
">CC BY-NC-SA 3.0</a> | Kryštof Trkovský - webadmin - developer</p>
            </footer> 
        </div>
        
         
           
<?php if (isset($_b->blocks["hide"])) { ?>
            <script>
                $('.hide-box').css('display','none');
    
                $('.arrowText').on('click',function (){
                    var txt = $(this).next('.hide-box'); 
                    if(txt.css('display') === 'none'){
                        txt.show(200);
                        $(this).children('.arrow').css('transform', 'rotate(-180deg)');
                    }
                    else{
                        txt.hide(100);
                        $(this).children('.arrow').css('transform', 'rotate(0deg)');
                    }
                }); 
            </script>
<?php } ?>
                
<?php if (isset($_b->blocks["script"])) { Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'script', $template->getParameters()) ;} ?>
        
        
    
    </body>
</html>
<?php
}}