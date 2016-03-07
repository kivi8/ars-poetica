<?php
// source: /var/www/clients/client3/web28/web/app/config/config.neon 
// source: /var/www/clients/client3/web28/web/app/config/config.local.neon 

class Container_8d9294bdc8 extends Nette\DI\Container
{

	protected $meta = array(
		'types' => array(
			'Nette\Object' => array(
				array(
					'application.application',
					'application.linkGenerator',
					'database.default.connection',
					'database.default.structure',
					'database.default.context',
					'http.requestFactory',
					'http.request',
					'http.response',
					'http.context',
					'nette.template',
					'security.user',
					'session.session',
					'app.authorizator',
					'app.authorizatorFactory',
					'28_App_Authorization_ResourceAuthorizator',
					'29_App_Forms_LogFormFactory',
					'33_App_Model_ArticleManager',
					'34_App_Model_CaptchaManager',
					'35_App_Model_NewsManager',
					'36_App_Model_UserManager',
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
					'container',
				),
			),
			'Nette\Application\Application' => array(1 => array('application.application')),
			'Nette\Application\IPresenterFactory' => array(
				1 => array('application.presenterFactory'),
			),
			'Nette\Application\LinkGenerator' => array(1 => array('application.linkGenerator')),
			'Nette\Caching\Storages\IJournal' => array(1 => array('cache.journal')),
			'Nette\Caching\IStorage' => array(1 => array('cache.storage')),
			'Nette\Database\Connection' => array(
				1 => array('database.default.connection'),
			),
			'Nette\Database\IStructure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\Structure' => array(
				1 => array('database.default.structure'),
			),
			'Nette\Database\IConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Conventions\DiscoveredConventions' => array(
				1 => array('database.default.conventions'),
			),
			'Nette\Database\Context' => array(1 => array('database.default.context')),
			'Nette\Http\RequestFactory' => array(1 => array('http.requestFactory')),
			'Nette\Http\IRequest' => array(1 => array('http.request')),
			'Nette\Http\Request' => array(1 => array('http.request')),
			'Nette\Http\IResponse' => array(1 => array('http.response')),
			'Nette\Http\Response' => array(1 => array('http.response')),
			'Nette\Http\Context' => array(1 => array('http.context')),
			'Nette\Bridges\ApplicationLatte\ILatteFactory' => array(1 => array('latte.latteFactory')),
			'Nette\Application\UI\ITemplateFactory' => array(1 => array('latte.templateFactory')),
			'Latte\Object' => array(array('nette.latte')),
			'Latte\Engine' => array(array('nette.latte')),
			'Nette\Templating\Template' => array(array('nette.template')),
			'Nette\Templating\ITemplate' => array(array('nette.template')),
			'Nette\Templating\IFileTemplate' => array(array('nette.template')),
			'Nette\Templating\FileTemplate' => array(array('nette.template')),
			'Nette\Mail\IMailer' => array(1 => array('mail.mailer')),
			'Nette\Application\IRouter' => array(1 => array('routing.router')),
			'Nette\Security\IUserStorage' => array(1 => array('security.userStorage')),
			'Nette\Security\User' => array(1 => array('security.user')),
			'Nette\Http\Session' => array(1 => array('session.session')),
			'Tracy\ILogger' => array(1 => array('tracy.logger')),
			'Tracy\BlueScreen' => array(1 => array('tracy.blueScreen')),
			'Tracy\Bar' => array(1 => array('tracy.bar')),
			'Nette\Security\IAuthorizator' => array(
				array('app.authorizator'),
				array('app.authorizatorFactory'),
			),
			'App\Authorization\AuthorizatorFactory' => array(
				array('app.authorizator'),
				array('app.authorizatorFactory'),
			),
			'App\Model\Manager' => array(
				1 => array(
					'28_App_Authorization_ResourceAuthorizator',
					'33_App_Model_ArticleManager',
					'35_App_Model_NewsManager',
					'36_App_Model_UserManager',
				),
			),
			'App\Authorization\ResourceAuthorizator' => array(
				1 => array(
					'28_App_Authorization_ResourceAuthorizator',
				),
			),
			'App\Forms\LogFormFactory' => array(
				1 => array('29_App_Forms_LogFormFactory'),
			),
			'App\Forms\LostPassForm' => array(1 => array('30_App_Forms_LostPassForm')),
			'App\Forms\NewPassForm' => array(1 => array('31_App_Forms_NewPassForm')),
			'App\Forms\SettingFormFactory' => array(
				1 => array('32_App_Forms_SettingFormFactory'),
			),
			'App\Model\ArticleManager' => array(
				1 => array('33_App_Model_ArticleManager'),
			),
			'App\Model\CaptchaManager' => array(
				1 => array('34_App_Model_CaptchaManager'),
			),
			'App\Model\NewsManager' => array(1 => array('35_App_Model_NewsManager')),
			'Nette\Security\IAuthenticator' => array(1 => array('36_App_Model_UserManager')),
			'App\Model\UserManager' => array(1 => array('36_App_Model_UserManager')),
			'App\Presenters\BasePresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\UI\Presenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\UI\Control' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\UI\PresenterComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\ComponentModel\Container' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\ComponentModel\Component' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\UI\IRenderable' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\ComponentModel\IContainer' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\ComponentModel\IComponent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\UI\ISignalReceiver' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\UI\IStatePersistent' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'ArrayAccess' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'Nette\Application\IPresenter' => array(
				array(
					'application.1',
					'application.2',
					'application.3',
					'application.4',
					'application.5',
					'application.6',
					'application.7',
					'application.8',
					'application.9',
					'application.10',
					'application.11',
					'application.12',
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'App\Presenters\ArticlePresenter' => array(array('application.1')),
			'App\Presenters\LogPresenter' => array(array('application.2')),
			'App\Presenters\ErrorPresenter' => array(array('application.3')),
			'App\Presenters\MessagePresenter' => array(array('application.4')),
			'App\Presenters\ArtTeamPresenter' => array(array('application.5')),
			'App\Presenters\SendArticlePresenter' => array(array('application.6')),
			'App\Presenters\SettingPresenter' => array(array('application.7')),
			'App\Presenters\SearchPresenter' => array(array('application.8')),
			'App\Presenters\MediaArchivePresenter' => array(array('application.9')),
			'App\Presenters\UserPresenter' => array(array('application.10')),
			'App\Presenters\CaptchaPresenter' => array(array('application.11')),
			'App\Presenters\HomepagePresenter' => array(array('application.12')),
			'App\AdminModule\Presenters\BasePresenter' => array(
				array(
					'application.13',
					'application.14',
					'application.15',
					'application.16',
					'application.17',
				),
			),
			'App\AdminModule\Presenters\ArticlePresenter' => array(array('application.13')),
			'App\AdminModule\Presenters\NewsPresenter' => array(array('application.14')),
			'App\AdminModule\Presenters\CommentsPresenter' => array(array('application.15')),
			'App\AdminModule\Presenters\UserPresenter' => array(array('application.16')),
			'App\AdminModule\Presenters\HomepagePresenter' => array(array('application.17')),
			'Nette\DI\Container' => array(1 => array('container')),
		),
		'services' => array(
			'28_App_Authorization_ResourceAuthorizator' => 'App\Authorization\ResourceAuthorizator',
			'29_App_Forms_LogFormFactory' => 'App\Forms\LogFormFactory',
			'30_App_Forms_LostPassForm' => 'App\Forms\LostPassForm',
			'31_App_Forms_NewPassForm' => 'App\Forms\NewPassForm',
			'32_App_Forms_SettingFormFactory' => 'App\Forms\SettingFormFactory',
			'33_App_Model_ArticleManager' => 'App\Model\ArticleManager',
			'34_App_Model_CaptchaManager' => 'App\Model\CaptchaManager',
			'35_App_Model_NewsManager' => 'App\Model\NewsManager',
			'36_App_Model_UserManager' => 'App\Model\UserManager',
			'app.authorizator' => 'App\Authorization\AuthorizatorFactory',
			'app.authorizatorFactory' => 'App\Authorization\AuthorizatorFactory',
			'application.1' => 'App\Presenters\ArticlePresenter',
			'application.10' => 'App\Presenters\UserPresenter',
			'application.11' => 'App\Presenters\CaptchaPresenter',
			'application.12' => 'App\Presenters\HomepagePresenter',
			'application.13' => 'App\AdminModule\Presenters\ArticlePresenter',
			'application.14' => 'App\AdminModule\Presenters\NewsPresenter',
			'application.15' => 'App\AdminModule\Presenters\CommentsPresenter',
			'application.16' => 'App\AdminModule\Presenters\UserPresenter',
			'application.17' => 'App\AdminModule\Presenters\HomepagePresenter',
			'application.2' => 'App\Presenters\LogPresenter',
			'application.3' => 'App\Presenters\ErrorPresenter',
			'application.4' => 'App\Presenters\MessagePresenter',
			'application.5' => 'App\Presenters\ArtTeamPresenter',
			'application.6' => 'App\Presenters\SendArticlePresenter',
			'application.7' => 'App\Presenters\SettingPresenter',
			'application.8' => 'App\Presenters\SearchPresenter',
			'application.9' => 'App\Presenters\MediaArchivePresenter',
			'application.application' => 'Nette\Application\Application',
			'application.linkGenerator' => 'Nette\Application\LinkGenerator',
			'application.presenterFactory' => 'Nette\Application\IPresenterFactory',
			'cache.journal' => 'Nette\Caching\Storages\IJournal',
			'cache.storage' => 'Nette\Caching\IStorage',
			'container' => 'Nette\DI\Container',
			'database.default.connection' => 'Nette\Database\Connection',
			'database.default.context' => 'Nette\Database\Context',
			'database.default.conventions' => 'Nette\Database\Conventions\DiscoveredConventions',
			'database.default.structure' => 'Nette\Database\Structure',
			'http.context' => 'Nette\Http\Context',
			'http.request' => 'Nette\Http\Request',
			'http.requestFactory' => 'Nette\Http\RequestFactory',
			'http.response' => 'Nette\Http\Response',
			'latte.latteFactory' => 'Latte\Engine',
			'latte.templateFactory' => 'Nette\Application\UI\ITemplateFactory',
			'mail.mailer' => 'Nette\Mail\IMailer',
			'nette.latte' => 'Latte\Engine',
			'nette.template' => 'Nette\Templating\FileTemplate',
			'routing.router' => 'Nette\Application\IRouter',
			'security.user' => 'Nette\Security\User',
			'security.userStorage' => 'Nette\Security\IUserStorage',
			'session.session' => 'Nette\Http\Session',
			'tracy.bar' => 'Tracy\Bar',
			'tracy.blueScreen' => 'Tracy\BlueScreen',
			'tracy.logger' => 'Tracy\ILogger',
		),
		'tags' => array(
			'inject' => array(
				'application.1' => TRUE,
				'application.10' => TRUE,
				'application.11' => TRUE,
				'application.12' => TRUE,
				'application.13' => TRUE,
				'application.14' => TRUE,
				'application.15' => TRUE,
				'application.16' => TRUE,
				'application.17' => TRUE,
				'application.2' => TRUE,
				'application.3' => TRUE,
				'application.4' => TRUE,
				'application.5' => TRUE,
				'application.6' => TRUE,
				'application.7' => TRUE,
				'application.8' => TRUE,
				'application.9' => TRUE,
			),
			'nette.presenter' => array(
				'application.1' => 'App\Presenters\ArticlePresenter',
				'application.10' => 'App\Presenters\UserPresenter',
				'application.11' => 'App\Presenters\CaptchaPresenter',
				'application.12' => 'App\Presenters\HomepagePresenter',
				'application.13' => 'App\AdminModule\Presenters\ArticlePresenter',
				'application.14' => 'App\AdminModule\Presenters\NewsPresenter',
				'application.15' => 'App\AdminModule\Presenters\CommentsPresenter',
				'application.16' => 'App\AdminModule\Presenters\UserPresenter',
				'application.17' => 'App\AdminModule\Presenters\HomepagePresenter',
				'application.2' => 'App\Presenters\LogPresenter',
				'application.3' => 'App\Presenters\ErrorPresenter',
				'application.4' => 'App\Presenters\MessagePresenter',
				'application.5' => 'App\Presenters\ArtTeamPresenter',
				'application.6' => 'App\Presenters\SendArticlePresenter',
				'application.7' => 'App\Presenters\SettingPresenter',
				'application.8' => 'App\Presenters\SearchPresenter',
				'application.9' => 'App\Presenters\MediaArchivePresenter',
			),
		),
		'aliases' => array(
			'application' => 'application.application',
			'cacheStorage' => 'cache.storage',
			'database.default' => 'database.default.connection',
			'httpRequest' => 'http.request',
			'httpResponse' => 'http.response',
			'nette.cacheJournal' => 'cache.journal',
			'nette.database.default' => 'database.default',
			'nette.database.default.context' => 'database.default.context',
			'nette.httpContext' => 'http.context',
			'nette.httpRequestFactory' => 'http.requestFactory',
			'nette.latteFactory' => 'latte.latteFactory',
			'nette.mailer' => 'mail.mailer',
			'nette.presenterFactory' => 'application.presenterFactory',
			'nette.templateFactory' => 'latte.templateFactory',
			'nette.userStorage' => 'security.userStorage',
			'router' => 'routing.router',
			'session' => 'session.session',
			'user' => 'security.user',
		),
	);


	public function __construct()
	{
		parent::__construct(array(
			'appDir' => '/var/www/clients/client3/web28/web/app',
			'wwwDir' => '/var/www/clients/client3/web28/web/www',
			'debugMode' => TRUE,
			'productionMode' => FALSE,
			'environment' => 'development',
			'consoleMode' => FALSE,
			'container' => array('class' => NULL, 'parent' => NULL),
			'tempDir' => '/var/www/clients/client3/web28/web/app/../temp',
		));
	}


	/**
	 * @return App\Authorization\ResourceAuthorizator
	 */
	public function createService__28_App_Authorization_ResourceAuthorizator()
	{
		$service = new App\Authorization\ResourceAuthorizator($this->getService('database.default.context'), $this->getService('security.user'));
		return $service;
	}


	/**
	 * @return App\Forms\LogFormFactory
	 */
	public function createService__29_App_Forms_LogFormFactory()
	{
		$service = new App\Forms\LogFormFactory($this->getService('security.user'));
		return $service;
	}


	/**
	 * @return App\Forms\LostPassForm
	 */
	public function createService__30_App_Forms_LostPassForm()
	{
		$service = new App\Forms\LostPassForm($this->getService('36_App_Model_UserManager'));
		return $service;
	}


	/**
	 * @return App\Forms\NewPassForm
	 */
	public function createService__31_App_Forms_NewPassForm()
	{
		$service = new App\Forms\NewPassForm($this->getService('36_App_Model_UserManager'), $this->getService('http.request'));
		return $service;
	}


	/**
	 * @return App\Forms\SettingFormFactory
	 */
	public function createService__32_App_Forms_SettingFormFactory()
	{
		$service = new App\Forms\SettingFormFactory($this->getService('36_App_Model_UserManager'), $this->getService('security.user'));
		return $service;
	}


	/**
	 * @return App\Model\ArticleManager
	 */
	public function createService__33_App_Model_ArticleManager()
	{
		$service = new App\Model\ArticleManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\CaptchaManager
	 */
	public function createService__34_App_Model_CaptchaManager()
	{
		$service = new App\Model\CaptchaManager($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return App\Model\NewsManager
	 */
	public function createService__35_App_Model_NewsManager()
	{
		$service = new App\Model\NewsManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Model\UserManager
	 */
	public function createService__36_App_Model_UserManager()
	{
		$service = new App\Model\UserManager($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Authorization\AuthorizatorFactory
	 */
	public function createServiceApp__authorizator()
	{
		$service = $this->getService('app.authorizatorFactory');
		return $service;
	}


	/**
	 * @return App\Authorization\AuthorizatorFactory
	 */
	public function createServiceApp__authorizatorFactory()
	{
		$service = new App\Authorization\AuthorizatorFactory($this->getService('database.default.context'));
		return $service;
	}


	/**
	 * @return App\Presenters\ArticlePresenter
	 */
	public function createServiceApplication__1()
	{
		$service = new App\Presenters\ArticlePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\UserPresenter
	 */
	public function createServiceApplication__10()
	{
		$service = new App\Presenters\UserPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->userManager = $this->getService('36_App_Model_UserManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\CaptchaPresenter
	 */
	public function createServiceApplication__11()
	{
		$service = new App\Presenters\CaptchaPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->captchaManager = $this->getService('34_App_Model_CaptchaManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__12()
	{
		$service = new App\Presenters\HomepagePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->captchaManager = $this->getService('34_App_Model_CaptchaManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\ArticlePresenter
	 */
	public function createServiceApplication__13()
	{
		$service = new App\AdminModule\Presenters\ArticlePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\NewsPresenter
	 */
	public function createServiceApplication__14()
	{
		$service = new App\AdminModule\Presenters\NewsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\CommentsPresenter
	 */
	public function createServiceApplication__15()
	{
		$service = new App\AdminModule\Presenters\CommentsPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\UserPresenter
	 */
	public function createServiceApplication__16()
	{
		$service = new App\AdminModule\Presenters\UserPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->settingForm = $this->getService('32_App_Forms_SettingFormFactory');
		$service->userManager = $this->getService('36_App_Model_UserManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\AdminModule\Presenters\HomepagePresenter
	 */
	public function createServiceApplication__17()
	{
		$service = new App\AdminModule\Presenters\HomepagePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\LogPresenter
	 */
	public function createServiceApplication__2()
	{
		$service = new App\Presenters\LogPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->newPassForm = $this->getService('31_App_Forms_NewPassForm');
		$service->lostPassForm = $this->getService('30_App_Forms_LostPassForm');
		$service->logFormFactory = $this->getService('29_App_Forms_LogFormFactory');
		$service->captchaManager = $this->getService('34_App_Model_CaptchaManager');
		$service->userManager = $this->getService('36_App_Model_UserManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ErrorPresenter
	 */
	public function createServiceApplication__3()
	{
		$service = new App\Presenters\ErrorPresenter($this->getService('tracy.logger'));
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\MessagePresenter
	 */
	public function createServiceApplication__4()
	{
		$service = new App\Presenters\MessagePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\ArtTeamPresenter
	 */
	public function createServiceApplication__5()
	{
		$service = new App\Presenters\ArtTeamPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\SendArticlePresenter
	 */
	public function createServiceApplication__6()
	{
		$service = new App\Presenters\SendArticlePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->captchaManager = $this->getService('34_App_Model_CaptchaManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\SettingPresenter
	 */
	public function createServiceApplication__7()
	{
		$service = new App\Presenters\SettingPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->userManager = $this->getService('36_App_Model_UserManager');
		$service->settingForm = $this->getService('32_App_Forms_SettingFormFactory');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\SearchPresenter
	 */
	public function createServiceApplication__8()
	{
		$service = new App\Presenters\SearchPresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return App\Presenters\MediaArchivePresenter
	 */
	public function createServiceApplication__9()
	{
		$service = new App\Presenters\MediaArchivePresenter;
		$service->injectPrimary($this, $this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'), $this->getService('session.session'),
			$this->getService('security.user'), $this->getService('latte.templateFactory'));
		$service->resourceAuthorizator = $this->getService('28_App_Authorization_ResourceAuthorizator');
		$service->newsManager = $this->getService('35_App_Model_NewsManager');
		$service->articleManager = $this->getService('33_App_Model_ArticleManager');
		$service->invalidLinkMode = 5;
		return $service;
	}


	/**
	 * @return Nette\Application\Application
	 */
	public function createServiceApplication__application()
	{
		$service = new Nette\Application\Application($this->getService('application.presenterFactory'), $this->getService('routing.router'),
			$this->getService('http.request'), $this->getService('http.response'));
		$service->catchExceptions = FALSE;
		$service->errorPresenter = 'Error';
		Nette\Bridges\ApplicationTracy\RoutingPanel::initializePanel($service);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel($this->getService('routing.router'), $this->getService('http.request'),
			$this->getService('application.presenterFactory')));
		return $service;
	}


	/**
	 * @return Nette\Application\LinkGenerator
	 */
	public function createServiceApplication__linkGenerator()
	{
		$service = new Nette\Application\LinkGenerator($this->getService('routing.router'), $this->getService('http.request')->getUrl(),
			$this->getService('application.presenterFactory'));
		return $service;
	}


	/**
	 * @return Nette\Application\IPresenterFactory
	 */
	public function createServiceApplication__presenterFactory()
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback($this, 5, '/var/www/clients/client3/web28/web/app/../temp/cache/Nette%5CBridges%5CApplicationDI%5CApplicationExtension'));
		$service->setMapping(array(
			'*' => 'App\*Module\Presenters\*Presenter',
		));
		return $service;
	}


	/**
	 * @return Nette\Caching\Storages\IJournal
	 */
	public function createServiceCache__journal()
	{
		$service = new Nette\Caching\Storages\FileJournal('/var/www/clients/client3/web28/web/app/../temp');
		return $service;
	}


	/**
	 * @return Nette\Caching\IStorage
	 */
	public function createServiceCache__storage()
	{
		$service = new Nette\Caching\Storages\FileStorage('/var/www/clients/client3/web28/web/app/../temp/cache', $this->getService('cache.journal'));
		return $service;
	}


	/**
	 * @return Nette\DI\Container
	 */
	public function createServiceContainer()
	{
		return $this;
	}


	/**
	 * @return Nette\Database\Connection
	 */
	public function createServiceDatabase__default__connection()
	{
		$service = new Nette\Database\Connection('mysql:host=127.0.0.1;dbname=c3arspoetica', 'c3krystof', 'heslojevesloK8',
			array('lazy' => TRUE));
		$this->getService('tracy.blueScreen')->addPanel('Nette\Bridges\DatabaseTracy\ConnectionPanel::renderException');
		Nette\Database\Helpers::createDebugPanel($service, TRUE, 'default');
		return $service;
	}


	/**
	 * @return Nette\Database\Context
	 */
	public function createServiceDatabase__default__context()
	{
		$service = new Nette\Database\Context($this->getService('database.default.connection'), $this->getService('database.default.structure'),
			$this->getService('database.default.conventions'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Database\Conventions\DiscoveredConventions
	 */
	public function createServiceDatabase__default__conventions()
	{
		$service = new Nette\Database\Conventions\DiscoveredConventions($this->getService('database.default.structure'));
		return $service;
	}


	/**
	 * @return Nette\Database\Structure
	 */
	public function createServiceDatabase__default__structure()
	{
		$service = new Nette\Database\Structure($this->getService('database.default.connection'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Http\Context
	 */
	public function createServiceHttp__context()
	{
		$service = new Nette\Http\Context($this->getService('http.request'), $this->getService('http.response'));
		return $service;
	}


	/**
	 * @return Nette\Http\Request
	 */
	public function createServiceHttp__request()
	{
		$service = $this->getService('http.requestFactory')->createHttpRequest();
		if (!$service instanceof Nette\Http\Request) {
			throw new Nette\UnexpectedValueException('Unable to create service \'http.request\', value returned by factory is not Nette\Http\Request type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Http\RequestFactory
	 */
	public function createServiceHttp__requestFactory()
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy(array());
		return $service;
	}


	/**
	 * @return Nette\Http\Response
	 */
	public function createServiceHttp__response()
	{
		$service = new Nette\Http\Response;
		return $service;
	}


	/**
	 * @return Nette\Bridges\ApplicationLatte\ILatteFactory
	 */
	public function createServiceLatte__latteFactory()
	{
		return new Container_8d9294bdc8_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory($this);
	}


	/**
	 * @return Nette\Application\UI\ITemplateFactory
	 */
	public function createServiceLatte__templateFactory()
	{
		$service = new Nette\Bridges\ApplicationLatte\TemplateFactory($this->getService('latte.latteFactory'), $this->getService('http.request'),
			$this->getService('http.response'), $this->getService('security.user'), $this->getService('cache.storage'));
		return $service;
	}


	/**
	 * @return Nette\Mail\IMailer
	 */
	public function createServiceMail__mailer()
	{
		$service = new Nette\Mail\SendmailMailer;
		return $service;
	}


	/**
	 * @return Latte\Engine
	 */
	public function createServiceNette__latte()
	{
		$service = new Latte\Engine;
		trigger_error('Service nette.latte is deprecated, implement Nette\Bridges\ApplicationLatte\ILatteFactory.',
			16384);
		$service->setTempDirectory('/var/www/clients/client3/web28/web/app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}


	/**
	 * @return Nette\Templating\FileTemplate
	 */
	public function createServiceNette__template()
	{
		$service = new Nette\Templating\FileTemplate;
		trigger_error('Service nette.template is deprecated.', 16384);
		$service->registerFilter($this->getService('latte.latteFactory')->create());
		$service->registerHelperLoader('Nette\Templating\Helpers::loader');
		return $service;
	}


	/**
	 * @return Nette\Application\IRouter
	 */
	public function createServiceRouting__router()
	{
		$service = App\RouterFactory::createRouter($this->getService('33_App_Model_ArticleManager'));
		if (!$service instanceof Nette\Application\IRouter) {
			throw new Nette\UnexpectedValueException('Unable to create service \'routing.router\', value returned by factory is not Nette\Application\IRouter type.');
		}
		return $service;
	}


	/**
	 * @return Nette\Security\User
	 */
	public function createServiceSecurity__user()
	{
		$service = new Nette\Security\User($this->getService('security.userStorage'), $this->getService('36_App_Model_UserManager'),
			$this->getService('app.authorizatorFactory'));
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		return $service;
	}


	/**
	 * @return Nette\Security\IUserStorage
	 */
	public function createServiceSecurity__userStorage()
	{
		$service = new Nette\Http\UserStorage($this->getService('session.session'));
		return $service;
	}


	/**
	 * @return Nette\Http\Session
	 */
	public function createServiceSession__session()
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('14 days');
		return $service;
	}


	/**
	 * @return Tracy\Bar
	 */
	public function createServiceTracy__bar()
	{
		$service = Tracy\Debugger::getBar();
		if (!$service instanceof Tracy\Bar) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.bar\', value returned by factory is not Tracy\Bar type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\BlueScreen
	 */
	public function createServiceTracy__blueScreen()
	{
		$service = Tracy\Debugger::getBlueScreen();
		if (!$service instanceof Tracy\BlueScreen) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.blueScreen\', value returned by factory is not Tracy\BlueScreen type.');
		}
		return $service;
	}


	/**
	 * @return Tracy\ILogger
	 */
	public function createServiceTracy__logger()
	{
		$service = Tracy\Debugger::getLogger();
		if (!$service instanceof Tracy\ILogger) {
			throw new Nette\UnexpectedValueException('Unable to create service \'tracy.logger\', value returned by factory is not Tracy\ILogger type.');
		}
		return $service;
	}


	public function initialize()
	{
		date_default_timezone_set('Europe/Prague');
		header('X-Frame-Options: SAMEORIGIN');
		header('Content-Type: text/html; charset=utf-8');
		Nette\Reflection\AnnotationsParser::setCacheStorage($this->getByType("Nette\Caching\IStorage"));
		Nette\Reflection\AnnotationsParser::$autoRefresh = TRUE;
		$this->getService('session.session')->exists() && $this->getService('session.session')->start();
	}

}



final class Container_8d9294bdc8_Nette_Bridges_ApplicationLatte_ILatteFactoryImpl_latte_latteFactory implements Nette\Bridges\ApplicationLatte\ILatteFactory
{

	private $container;


	public function __construct(Container_8d9294bdc8 $container)
	{
		$this->container = $container;
	}


	public function create()
	{
		$service = new Latte\Engine;
		$service->setTempDirectory('/var/www/clients/client3/web28/web/app/../temp/cache/latte');
		$service->setAutoRefresh(TRUE);
		$service->setContentType('html');
		Nette\Utils\Html::$xhtml = FALSE;
		return $service;
	}

}
