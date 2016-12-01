<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter,
        App\Model\ArticleManager;


/**
 * Router factory.
 */
class RouterFactory
{      
    private static $articleManager;
    
	/**
	 * @return \Nette\Application\IRouter
	 */
	public static function createRouter(ArticleManager $articleManager){

	    if(\Tracy\Debugger::$productionMode){
		Route::$defaultFlags = Route::SECURED;
	    }
	    
            self::$articleManager = $articleManager;
            
            $presenterTranslator = [
                'domovska-stranka' => 'Homepage',
                'uzivatel' => 'Log',
                'clanky' => 'Article',
                'poslat-clanek' => 'SendArticle',
                'nastaveni' => 'Setting',
                'zpravy' => 'Message',
                'umelecky-tym' => 'ArtTeam',
                'archiv-medii' => 'MediaArchive',
                'administrace' => 'Admin',
                'hledat' => 'Search',
                'captcha' => 'Captcha',
                'registrovany' => 'User'
                ];
            
            $actionTranslator = [
                'prihlasit' => 'in',
                'odhlasit' => 'out',
                'registrovat' => 'register',
                'ztracene-heslo' => 'lostPass',
                'overit' => 'confimNewUser',
                'nove-heslo' => 'newPass',
                'novy-mail'=>'changeMail',
                'detail' => 'detail'
            ];
            
		$router = new RouteList();
			               
                $pageRouter = new PageRoute('<url>', array(
                    'presenter' => 'Article',
                    'action' => 'article'
                ));  
                
                $pageRouter->setArticleManager(self::$articleManager);        
                        
                $router[] = $pageRouter;        
                
                $router[] = new Route('hledat[/<search>]', [
                    'presenter' => 'Search',
                    'action' => 'default',
                ]);
                
                $router[] = $adminRouter = new RouteList('Admin');
                
                $adminPresenterTranstalor = [
                    'uzivatele'=>'User',
                    'rychle-zpravy'=>'News',
                    'komentare'=>'Comments',
                    'clanky'=>'Article',
		    'texty'=>'Text'
                ];
                
                $adminActionTranslator = [
                    'upravit'=>'Moderate',
                    'sekce'=>'section',
                    'upravit-clanek'=>'updateArticle',
                    'pridat-clanek'=>'addArticle',
                    'upravit-sekci' => 'updateSection',
                    'seznam-clanku' => 'articleList'		    
                ];
                
                $adminRouter[] = new Route('administrace/<presenter>/<action>[/id]', [
                    'presenter' => [
                        Route::VALUE => 'Homepage',
                        Route::FILTER_STRICT => true,
                        Route::FILTER_TABLE => $adminPresenterTranstalor
                    ],
                    'action' => [
                        Route::VALUE => 'default',
                        Route::FILTER_TABLE => $adminActionTranslator
                    ],
                    
                ]);  
                
                $router[] = new Route('clanky/<section>/<subsection>',[
                    'presenter' => 'Article',
                    'action' => 'default',
                ]);
                
                $router[] = new Route('clanky/<section>',[
                    'presenter' => 'Article',
                    'action' => 'default',
                ]);
                
		$router[] = new Route('<presenter>/<action>[/<id>]', [
                    'presenter' => [
                        Route::VALUE => 'Article',
                        Route::FILTER_STRICT => true,
                        Route::FILTER_TABLE => $presenterTranslator
                    ],
                    'action' => [
                        Route::VALUE => 'default',
                        Route::FILTER_TABLE => $actionTranslator
                    ],
                    'id' => NULL,
                ]);
                                                               
		return $router;
	}

}

class PageRoute extends Route{
    
    /** @var ArticleManager*/
    private $articleManager;
        
    public function setArticleManager(ArticleManager $articleManager){

        $this->articleManager = $articleManager;
    }
    
    public function match(Nette\Http\IRequest $httpRequest) {
        $appRequest = parent::match($httpRequest);
        
        if(empty($appRequest->parameters)){
            return null;
        }
        
        if(!$this->articleManager->getArticleUrl($appRequest->parameters['url'])){
            return null;
        }
        
        return $appRequest;
    }
    
}
