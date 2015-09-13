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
                ];
            
            $actionTranslator = [
                'prihlasit' => 'in',
                'odhlasit' => 'out',
                'registrovat' => 'register',
                'ztracene-heslo' => 'lostPass',
                'overit' => 'confimNewUser',
                'nove-heslo' => 'newPass',
            ];
            
		$router = new RouteList();
                
                $router[] = new Route('hledat[/<search>]', [
                    'presenter' => 'Search',
                    'action' => 'default',
                ]);
                                                                                                                                         
		$router[] = new Route('<presenter>/<action>[/<id>]', [
                    'presenter' => [
                        Route::VALUE => 'Homepage',
                        Route::FILTER_STRICT => true,
                        Route::FILTER_TABLE => $presenterTranslator
                    ],
                    'action' => [
                        Route::VALUE => 'default',
                        Route::FILTER_STRICT => true,
                        Route::FILTER_TABLE => $actionTranslator
                    ],
                    'id' => NULL,
                ]);
                                                               
		return $router;
	}

}
