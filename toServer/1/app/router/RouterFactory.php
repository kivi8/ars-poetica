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
	public static function createRouter()
	{
            $pageTranslator = [
                'domovska-stranka' => 'Homepage',
                'prihlasit' => 'Log',               
                'registrovat' => 'Register',
                'clanek' => 'Article',
                'poslat-clanek' => 'SendArticle',
                'nastaveni' => 'Setting',
                'zpravy' => 'Message',
                'umelecky-tym' => 'ArtTeam',
                'archiv-medii' => 'MediaArchive',
                'administrace' => 'Admin',
                'hledat' => 'Search',
                ];
            
		$router = new RouteList();
                
                $router[] = new Route('hledat[/<search>]', [
                    'presenter' => [
                        Route::VALUE => 'Search',
                        Route::FILTER_TABLE => ['hledat' => 'Search']
                    ],
                    'action' => 'default',
                ]);
                
		$router[] = new Route('<presenter>/<action>[/<id>]', [
                    'presenter' => [
                        Route::VALUE => 'Homepage',
                        Route::FILTER_TABLE => $pageTranslator
                    ],
                    'action' => 'default',
                    'id' => NULL,
                ]);
               
		return $router;
	}

}
