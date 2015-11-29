<?php

namespace App;

use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route,
	Nette\Application\Routers\SimpleRouter;


/**
 * Router factory.
 */
class RouterFactory
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public static function createRouter(){
	
            $presenterTranslator = [
                'domovska-stranka' => 'Homepage',
                'uzivatel' => 'Log',
                'clanek' => 'Article',
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
                ];
                
                $adminActionTranslator = [
                    'upravit'=>'Moderate',
                    'sekce'=>'section',
                    'upravit-clanek'=>'updateArticle',
                    'pridat-clanek'=>'addArticle',
                    'upravit-sekci' => 'updateSection'
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
                                                                                                                                         
		$router[] = new Route('<presenter>/<action>[/<id>]', [
                    'presenter' => [
                        Route::VALUE => 'Homepage',
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
