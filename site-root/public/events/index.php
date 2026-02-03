<?php
declare(strict_types=1);

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require_once(__DIR__ . '/../../../vendor/autoload.php');

require_once('../head.php');
?>
    <article id="main-content">
        <h1>4th Earth: Events</h1>
        <h2 id="fourth-earth">Fourth Earth</h2>
        <p>From roughly <button class="popover" popovertarget="fourth-earth-time">year 5,300 to present</button> (5,350).</p>

        <h2 id="third-earth">Third Earth</h2>
        <p>From roughly <button class="popover" popovertarget="third-earth-time">year 4,500 to 5,300</button>.</p>        
        <h3 id="the-battle-over-third-earth">The Battle over Third Earth</h3>
        <p>The Battle over Third Earth began with the appearance of Maul, culminating in a destructive battle at <a href="/places/#the-cradle">The Cradle</a>. The number of citizens in The Cradle increased in the years preceding the battle through immigration and incentives to increase through childbirth. Almost half the citizens of The Cradle were lost in the battle.</p>

        <h2 id="second-earth">Second Earth</h2>
        <p>From roughly <button class="popover" popovertarget="second-earth-time">year 4,300 to 4,500</button>.</p>

        <h2 id="first-earth">First Earth</h2>
        <p>From roughly <button class="popover" popovertarget="first-earth-time">year zero to 4,300</button>.</p>

    </article>
    <!-- Defintions -->
    <div popover id="first-earth-time">
        <p>Roughly 2,100 <abbr title="Before Common Era">BCE</abbr> to 2,200 <abbr title="Common Era">CE</abbr> in the Gegorian Calendar.</p>
        <button popovertargetaction="hide" popovertarget="first-earth-time">close</button>
    </div>
    <div popover id="second-earth-time">
        <p>Roughly 2,200 <abbr title="Common Era">CE</abbr> to 2,400 <abbr title="Common Era">CE</abbr> in the Gegorian Calendar.</p>
        <button popovertargetaction="hide" popovertarget="second-earth-time">close</button>
    </div>
    <div popover id="third-earth-time">
        <p>Roughly 2,400 <abbr title="Common Era">CE</abbr> to 3,200 <abbr title="Common Era">CE</abbr> in the Gegorian Calendar.</p>
        <button popovertargetaction="hide" popovertarget="third-earth-time">close</button>
    </div>    
    <div popover id="fourth-earth-time">
        <p>Roughly 3,200 <abbr title="Common Era">CE</abbr> in the Gegorian Calendar.</p>
        <button popovertargetaction="hide" popovertarget="fourth-earth-time">close</button>
    </div>    
    <p id="top" aria-label="back to top"><a href="#skip-nav">back to top</a></p>
<?php require_once('../footer.php'); ?>