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
        <h1>4th Earth: Inventory</h1>
        <h2 id="citizen-equipment">Citizen Equipment</h2>
        <p>Citizen equipment is issued to each citizen of <a href="/places/#the-cradle">The Cradle</a> at various ages.</p>

        <h3 id="citizen-goggles">Citizen Goggles</h3>
        <p><b>Issued at</b> 3 years of age; updated at 18 years of age.</p>
        <p>Citizen Goggles are <abbr title="Augmented Reality">AR</abbr>/<abbr title="Virtual Reality">VR</abbr> eyewear that allow citizens to interact with each other and The Cradle. While there are multiple design options, they are limited. At minimum, they consist of:</p>
        <ul>
            <li>Two vertical lights on either side of the lenses.</li>
            <li>One projection speaker running the width of the Goggles.</li>
            <li>Two bone conduction speakers.</li>
            <li>An array of cameras in verious points; only the forward- and rear-facing cameras can be used by the user.</li>
        </ul>
    </article>
    <p id="top" aria-label="back to top"><a href="#skip-nav">back to top</a></p>
<?php require_once('../footer.php'); ?>