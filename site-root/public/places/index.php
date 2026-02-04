<?php
declare(strict_types=1);

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require_once(__DIR__ . '/../../../vendor/autoload.php');

$title = 'Places | 4th Earth';

require_once('../head.php');
?>
    <article id="main-content">
        <h1>4th Earth: Places</h1>
        <h2 id="the-cradle">The Cradle</h2>
        <p>The Cradle is both a citizen designation and a physical location. Any person wearing <a href="/inventory/#citizen-goggles">Citizen Goggles</a> is considered a citizen of The Cradle, even if they are not a resident of it. Any person physically located within its walls is considered a resident.</p>
        <p>The Cradle consists of the <a href="/places/#central-habitat">Central Habitat</a> and eight habitats in the <a href="/places/#outer-rim">Outer Rim</a>. Each Outer Rim habitat is placed in the cardinal and ordinal directions of the compass. At the center of each habitat is forested area for growing the primary foodstuffs of the citizens.</p>

        <h3 id="central-habitat">Central Habitat</h3>
        <p>The Central Habitat is 2 kilometers in diameter and appears to a be a single dome from the outside. Internally there is a central Hub Dome, 1 kilometer in diameter. The Hub Dome is surrounded by 8 domes less 0.5 kilometers in diameter; commonly referred to as the Rim Domes. Each Rim Dome is placed in the cardinal and ordinal directions of the compass.</p>
        
        <h3 id="outer-rim">Outer Rim</h3>
        <p>The Outer Rim consists of 8 habitats, 1 kilometer in diameter. Each habitat is connected by a passageway, creating a tall perimeter wall.</p>
    </article>
    <p id="top" aria-label="back to top"><a href="#skip-nav">back to top</a></p>
<?php require_once('../footer.php'); ?>