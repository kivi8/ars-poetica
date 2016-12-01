<?php

namespace App\Helper;

use Nette;

class Helper extends \Nette\Object{
    
    /**
     * Combine name from mail or nick
     * @param array $data
     * @param bool $mail
     * @return string
     */
    public static function combineUserName($data, $mail = true){
        
        $raw = [];
        
        if(!$data){
            return 'Uživatel'; 
        }
        
        foreach($data as $key => $value){
            $raw[$key] = $value;
        }
        
        //$title = isset($raw['title'])?$raw['title'].' ':'';
                
        if(!empty($raw['name'])){
            return $raw['name'];
        }
        
        if(!empty($raw['nickName'])){
            return $raw['nickName'];
        }
        
        if(!empty($raw['mail']) && $mail){           
            return $raw['mail'];
        }     
        
        return 'Uživatel';        
    }
    
    /**
     * Returns current time for database
     * @return string
     */
    public static function datTime(){
        
        return date('Y-m-d H:i:s');
    }
    
    public static function timeInterval($date){
        
        return (new TimeInterval())->timeInterval($date);       
    }
    
    /**
     * Translate gender from database
     * @param string $gender
     * @return string
     */
    public static function translateGender($gender){
        
        $genders = ['fe'=>'Žena','ma'=>'Muž','no'=>'Neuvedeno'];
        return $genders[$gender];        
    }
    
    public static function isIndexBot(){
        
        return (new CrawlerDetect())->isCrawler();
    }
}

class TimeInterval
{

   public function timeInterval($datum)
   {
       if( empty($datum) ) {
           return "Nebyl předán datum.";
       }
 
       $perioda       = array("sekundy", "minuty", "hodiny", "dny", "týdny", "měsíce", "roky");
       $delka         = array("60","60","24","7","4.35","12");
 
       $nyni          = time();
       $unixovy_datum = strtotime($datum);
 
       if( empty($unixovy_datum) ) {
           return "Chybný formát datumu.";
       }
 
       // minulý čas nebo budoucí čas?
       //
       if( $nyni > $unixovy_datum ) {
           $rozdil      = $nyni - $unixovy_datum;
           $slovesnyCas = "před";
 
       } else {
           $rozdil      = $unixovy_datum - $nyni;
           $slovesnyCas = "za";
       }
 
       for($j = 0; $rozdil >= $delka[$j] && $j < count($delka)-1; $j++) {
           $rozdil /= $delka[$j];
       }
 
       $rozdil = round($rozdil);
 
       if( $slovesnyCas == "před" ) {
         switch ($perioda[$j]) {
          case "sekundy":
            if( $rozdil == 1 ) {
                $perioda[$j] = "sekundou";
                $rozdil = "jednou";
            }else{
                $perioda[$j] = "sekundami";
            }
            break;
 
          case "minuty":
            if( $rozdil == 1 ) {
                $perioda[$j] = "minutou";
                $rozdil = "";
            }else{
                $perioda[$j] = "minutami";
            }
            break;  
 
          case "hodiny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "hodinou";
                $rozdil = "";
            }else{
                $perioda[$j] = "hodinami";
            }
            break;  
 
          case "dny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "včera";
                $rozdil = "";
                $slovesnyCas = "";
            }else{
                $perioda[$j] = "dny";
            }
            break;  
 
          case "týdny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "týdnem";
                $rozdil = "";
            }else{
                $perioda[$j] = "týdny";
            }
            break; 
 
          case "měsíce":
            if( $rozdil == 1 ) {
                $perioda[$j] = "měsícem";
                $rozdil = "";
            }elseif( $rozdil == 12 ){
                $perioda[$j] = "rokem";
                $rozdil = "";
            }else{
               $perioda[$j] = "měsíci";
            }
            break; 
 
          case "roky":
            if( $rozdil == 1 ) {
                $perioda[$j] = "rokem";
                $rozdil = "";
            }else{
                $perioda[$j] = "roky";
            }
            break;
          default:
            break;
          }
       }else{    // "za ..."
         switch ($perioda[$j]) {
         case "sekundy":
            if( $rozdil == 1 ) {
                $perioda[$j] = "sekundu";
                $rozdil = "jednu";
            }else{
                $perioda[$j] = "sekund";
            }
            break;
 
          case "minuty":
            if( $rozdil == 1 ) {
                $perioda[$j] = "minutu";
                $rozdil = "";
            }else{
                $perioda[$j] = "minut";
            }
            break;   
 
          case "hodiny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "hodinu";
                $rozdil = "";
            }elseif( $rozdil >= 2 && $rozdil < 5){
               $perioda[$j] = "hodiny";
            }elseif( $rozdil >= 5 ){
               $perioda[$j] = "hodin";
            }
            break;   
 
          case "dny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "zítra";
                $rozdil = "";
                $slovesnyCas = "";
            }else{
               if( $rozdil > 1 && $rozdil < 5 ) {
                $perioda[$j] = "dny";
               }else{
                  $perioda[$j] = "dní";
               }
            }
            break;   
 
          case "týdny":
            if( $rozdil == 1 ) {
                $perioda[$j] = "týden";
                $rozdil = "";
            }elseif( $rozdil == 2 ){
               $perioda[$j] = "týden";
                $rozdil = "příští";
            }elseif( $rozdil > 2 && $rozdil < 5 ){
               $perioda[$j] = "týdny";
            }elseif( $rozdil >= 5 ){
               $perioda[$j] = "týdnů";
            }
            break;   
 
          case "měsíce":
            if( $rozdil == 1 ) {
                $perioda[$j] = "měsíc";
                $rozdil = "";
            }elseif( $rozdil >= 2 && $rozdil < 5 ){
               $perioda[$j] = "měsíce";
            }elseif( $rozdil == 12 ){
                $perioda[$j] = "rok";
                $rozdil = "";
            }elseif( $rozdil >= 5 ){
               $perioda[$j] = "měsíců";
            }
            break;  
 
          case "roky":
            if( $rozdil == 1 ) {
                $perioda[$j] = "rok";
                $rozdil = "";
            }elseif( $rozdil == 2 ){
               $perioda[$j] = "roky";
            }
            break;  
 
          default:
 
            break;
          }
       }
       
       if($rozdil == 0 && $perioda[$j] == 'sekund'){
           return 'Teď';
       }
       
       return "{$slovesnyCas} $rozdil $perioda[$j]";
   }
 
   public function pocetDni($datum = "")
   {
      $sekund = $this->datum_na_timestamp($datum);
 
      $rozdil = time() - $sekund;
      $dni = floor($rozdil / (60 * 60 * 24));
 
    return $dni;
   }
 

   private function datum_na_timestamp($datetime = "")
   {
      // použitelné pouze pro 10 nebo 19 znakové vyjádření ( 0000-00-00  nebo 0000-00-00 00:00:00 )
      $delka = strlen($datetime);
 
      if(!($delka == 10 || $delka == 19)) {
         return false;
      }
 
      $datum = $datetime;
      $hours = 0;
      $minutes = 0;
      $seconds = 0;
 
      // DATETIME
      if($delka == 19)
      {
         list($datum, $time) = explode(" ", $datetime);
         list($hodin, $minut, $sekund) = explode(":", $time);
      }
 
      list($rok, $mesic, $den) = explode("-", $datum);
 
      return mktime($hodin, $minut, $sekund, $mesic, $den, $rok);
   }
 
}

class CrawlerDetect
{
    /**
     * The user agent.
     *
     * @var null
     */
    protected $userAgent = null;
    /**
     * Headers that contain a user agent.
     *
     * @var array
     */
    protected $httpHeaders = array();
    /**
     * Store regex matches.
     *
     * @var array
     */
    protected $matches = array();
    /**
     * List of strings to remove from the user agent before running the crawler regex
     * Over a large list of user agents, this gives us about a 55% speed increase!
     *
     * @var array
     */
    protected static $ignore = array(
        'Safari.[\d\.]*',
        'Firefox.[\d\.]*',
        'Chrome.[\d\.]*',
        'Chromium.[\d\.]*',
        'MSIE.[\d\.]',
        'Opera\/[\d\.]*',
        'Mozilla.[\d\.]*',
        'AppleWebKit.[\d\.]*',
        'Trident.[\d\.]*',
        'Windows NT.[\d\.]*',
        'Android.[\d\.]*',
        'Macintosh.',
        'Ubuntu',
        'Linux',
        '[ ]Intel',
        'Mac OS X',
        'Gecko.[\d\.]*',
        'KHTML',
        'CriOS.[\d\.]*',
        'CPU iPhone OS ([0-9_])* like Mac OS X',
        'CPU OS ([0-9_])* like Mac OS X',
        'iPod',
        'like Gecko',
        'compatible',
        'x86_..',
        'i686',
        'x64',
        'X11',
        'rv:[\d\.]*',
        'Version.[\d\.]*',
        'WOW64',
        'Win64',
        'Dalvik.[\d\.]*',
        '\.NET CLR [\d\.]*',
        'Presto.[\d\.]*',
        'Media Center PC',
    );
    /**
     * Array of regular expressions to match against the user agent.
     *
     * @var array
     */
    protected static $crawlers = array(
        '008\\/',
        'A6-Indexer',
        'Aboundex',
        'Accoona-AI-Agent',
        'acoon',
        'AddThis',
        'ADmantX',
        'AHC',
        'Airmail',
        'Anemone',
        'Arachmo',
        'archive-com',
        'B-l-i-t-z-B-O-T',
        'bibnum\.bnf',
        'biglotron',
        'binlar',
        'BingPreview',
        'boitho\.com-dc',
        'BUbiNG',
        'Butterfly\\/',
        'BuzzSumo',
        'CapsuleChecker',
        'CC Metadata Scaper',
        'Cerberian Drtrs',
        'changedetection',
        'Charlotte',
        'clips\.ua\.ac\.be',
        'CloudFlare-AlwaysOnline',
        'coccoc',
        'Commons-HttpClient',
        'convera',
        'cosmos',
        'Covario-IDS',
        'curl',
        'CyberPatrol',
        'Dragonfly File Reader',
        'DataparkSearch',
        'dataprovider',
        'Digg',
        'DomainAppender',
        'drupact',
        'EARTHCOM',
        'ECCP',
        'ec2linkfinder',
        'ElectricMonk',
        'Embedly',
        'europarchive\.org',
        'EventMachine HttpClient',
        'ExactSearch',
        'ezooms',
        'eZ Publish Link Validator',
        'facebookexternalhit',
        'FeedBurner',
        'Feedfetcher-Google',
        'FeedValidator',
        'FindLinks',
        'findlink',
        'findthatfile',
        'Flamingo_SearchEngine',
        'fluffy',
        'getprismatic\.com',
        'g00g1e\.net',
        'GigablastOpenSource',
        'grub-client',
        'Genieo',
        'Go-http-client',
        'Google-HTTP-Java-Client',
        'Google favicon',
        'Google Keyword Suggestion',
        'GoogleProducer',
        'heritrix',
        'Holmes',
        'htdig',
        'httpunit',
        'httrack',
        'HubSpot Marketing Grader',
        'ichiro',
        'infegy',
        'igdeSpyder',
        'InAGist',
        'InfoWizards Reciprocal Link System PRO',
        'integromedb',
        'IODC',
        'IOI',
        'ips-agent',
        'iZSearch',
        'L\.webis',
        'Larbin',
        'libwww',
        'Link Valet',
        'linkdex',
        'LinkExaminer',
        'LinkWalker',
        'Lipperhey Link Explorer',
        'Lipperhey SEO Service',
        'LongURL API',
        'ltx71',
        'lwp-trivial',
        'MegaIndex\.ru',
        'mabontland',
        'MagpieRSS',
        'Mediapartners-Google',
        'MetaURI',
        'Mnogosearch',
        'mogimogi',
        'Morning Paper',
        'Mrcgiguy',
        'MVAClient',
        'Netcraft Web Server Survey',
        'netresearchserver',
        'Netvibes',
        'NewsGator',
        'newsme',
        'NG-Search',
        '^NING\\/',
        'Notifixious',
        'nutch',
        'NutchCVS',
        'Nymesis',
        'oegp',
        'Omea Reader',
        'online link validator',
        'Online Website Link Checker',
        'Orbiter',
        'ow\.ly',
        'Ploetz \+ Zeller',
        'page2rss',
        'panscient',
        'Peew',
        'phpcrawl',
        'Pinterest',
        'Pizilla',
        'Plukkie',
        'Pompos',
        'postano',
        'PostPost',
        'postrank',
        'proximic',
        'Pulsepoint XT3 web scraper',
        'PycURL',
        'Python-httplib2',
        'python-requests',
        'Python-urllib',
        'Qseero',
        'Qwantify',
        'Radian6',
        'RebelMouse',
        'REL Link Checker',
        'RetrevoPageAnalyzer',
        'Riddler',
        'Robosourcer',
        'Ruby',
        'SBIder',
        'ScoutJet',
        'ScoutURLMonitor',
        'Scrapy',
        'Scrubby',
        'SearchSight',
        'semanticdiscovery',
        'SEOstats',
        'Seznam screenshot-generator',
        'SeznamBot',
        'ShopWiki',
        'SimplePie',
        'SiteBar',
        'siteexplorer\.info',
        'slider\.com',
        'slurp',
        'Snappy',
        'sogou',
        'speedy',
        'Springshare Link Checker',
        'Sqworm',
        'StackRambler',
        'Stratagems Kumo',
        'summify',
        'teoma',
        'theoldreader\.com',
        'TinEye',
        'Traackr.com',
        'truwoGPS',
        'Typhoeus',
        'tweetedtimes\.com',
        'Twikle',
        'UdmSearch',
        'UnwindFetchor',
        'updated',
        'urlresolver',
        'Validator\.nu\\/LV',
        'Vagabondo',
        'Vivante Link Checker',
        'Vortex',
        'voyager\\/',
        'VYU2',
        'W3C-checklink',
        'W3C_CSS_Validator_JFouffa',
        'W3C_I18n-Checker',
        'W3C-mobileOK',
        'W3C_Unicorn',
        'W3C_Validator',
        'WebIndex',
        'Websquash\.com',
        'webcollage',
        'webmon ',
        'WeSEE:Search',
        'wf84',
        'wget',
        'WomlpeFactory',
        'wotbox',
        'Xenu Link Sleuth',
        'XML Sitemaps Generator',
        'Y!J-ASR',
        'yacy',
        'Yahoo Ad monitoring',
        'Yahoo Link Preview',
        'Yahoo! Slurp China',
        'Yahoo! Slurp',
        'YahooSeeker',
        'YahooSeeker-Testing',
        'YandexImages',
        'YandexMetrika',
        'YandexDirectDyn',
        'yandex',
        'yanga',
        'yeti',
        'yoogliFetchAgent',
        'Zao',
        'ZyBorg',
        '[a-z0-9\\-_]*((?<!cu)bot|crawler|archiver|transcoder|spider)',
    );
    /**
     * All possible HTTP headers that represent the
     * User-Agent string.
     *
     * @var array
     */
    protected static $uaHttpHeaders = array(
        // The default User-Agent string.
        'HTTP_USER_AGENT',
        // Header can occur on devices using Opera Mini.
        'HTTP_X_OPERAMINI_PHONE_UA',
        // Vodafone specific header: http://www.seoprinciple.com/mobile-web-community-still-angry-at-vodafone/24/
        'HTTP_X_DEVICE_USER_AGENT',
        'HTTP_X_ORIGINAL_USER_AGENT',
        'HTTP_X_SKYFIRE_PHONE',
        'HTTP_X_BOLT_PHONE_UA',
        'HTTP_DEVICE_STOCK_UA',
        'HTTP_X_UCBROWSER_DEVICE_UA',
    );
    /**
     * Class constructor.
     */
    public function __construct(array $headers = null, $userAgent = null)
    {
        $this->setHttpHeaders($headers);
        $this->setUserAgent($userAgent);
    }
    /**
     * Set HTTP headers.
     *
     * @param array $httpHeaders
     */
    public function setHttpHeaders($httpHeaders = null)
    {
        // use global _SERVER if $httpHeaders aren't defined
        if (!is_array($httpHeaders) || !count($httpHeaders)) {
            $httpHeaders = $_SERVER;
        }
        // clear existing headers
        $this->httpHeaders = array();
        // Only save HTTP headers. In PHP land, that means only _SERVER vars that
        // start with HTTP_.
        foreach ($httpHeaders as $key => $value) {
            if (substr($key, 0, 5) === 'HTTP_') {
                $this->httpHeaders[$key] = $value;
            }
        }
    }
    /**
     * Return user agent headers.
     *
     * @return array
     */
    public function getUaHttpHeaders()
    {
        return self::$uaHttpHeaders;
    }
    /**
     * Set the user agent.
     *
     * @param string $userAgent
     */
    public function setUserAgent($userAgent = null)
    {
        if (false === empty($userAgent)) {
            return $this->userAgent = $userAgent;
        } else {
            $this->userAgent = null;
            foreach ($this->getUaHttpHeaders() as $altHeader) {
                if (false === empty($this->httpHeaders[$altHeader])) { // @todo: should use getHttpHeader(), but it would be slow.
                    $this->userAgent .= $this->httpHeaders[$altHeader].' ';
                }
            }
            return $this->userAgent = (!empty($this->userAgent) ? trim($this->userAgent) : null);
        }
    }
    /**
     * Build the user agent regex.
     *
     * @return string
     */
    public function getRegex()
    {
        return '('.implode('|', self::$crawlers).')';
    }
    /**
     * Build the replacement regex.
     *
     * @return string
     */
    public function getIgnored()
    {
        return '('.implode('|', self::$ignore).')';
    }
    /**
     * Check user agent string against the regex.
     *
     * @param string $userAgent
     *
     * @return bool
     */
    public function isCrawler($userAgent = null)
    {
        $agent = is_null($userAgent) ? $this->userAgent : $userAgent;
        $agent = preg_replace('/'.$this->getIgnored().'/i', '', $agent);
        $result = preg_match('/'.$this->getRegex().'/i', $agent, $matches);
        if ($matches) {
            $this->matches = $matches;
        }
        return (bool) $result;
    }
    /**
     * Return the matches.
     *
     * @return string
     */
    public function getMatches()
    {
        return $this->matches[0];
    }
}