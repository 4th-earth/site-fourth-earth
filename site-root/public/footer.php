<?php
$path = $_SERVER['REQUEST_URI'];

$menuItems = [
    '/' => 'home',
    '/events/'    => 'events',
    '/places/'    => 'places',
    '/species/'   => 'species',
    '/inventory/' => 'inventory'
];

$links = [];
foreach ($menuItems as $href => $title) {
    if ($path === '/' and $href === '/') {
        $links[] = '<li><a class="current" href="' . $href . '">' . $title . '</a></li>';

    } elseif (
        ($path !== '/' and $href !== '/') and
        str_starts_with($path, $href)
    ) {
        $links[] = '<li><a class="current" href="' . $href . '">' . $title . '</a></li>';

    } else {
        $links[] = '<li><a href="' . $href . '">' . $title . '</a></li>';

    }
}

$links = implode('', $links);
?>
    <nav id="primary-nav" aria-label="site navigation">
        <ul><?php echo $links; ?></ul>
    </nav>
    <footer>
        <p>4th Earth Lore is <br>Copyright ©️ 2022–<?php echo date('Y'); ?> Alexander Midknight</p>
        <p xmlns:cc="http://creativecommons.org/ns#" xmlns:dct="http://purl.org/dc/terms/"><span property="dct:title">4th Earth RAW, 4th Earth RAW: Vanilla, and 4th Earth RAW: Sprinkles</span><br> by <span property="cc:attributionName">Alexander Midknight</span> is <br> licensed under <a rel="license noopener noreferrer" href="http://creativecommons.org/licenses/by-sa/4.0/?ref=chooser-v1" target="_blank">Attribution-ShareAlike 4.0 International</a>.<br><img style="height:22px!important;width:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt="creative-commons icon, two Cs encircled"><img style="height:22px!important;width:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt="creative-commons attribution icon, a silhouette of a person encircled"><img style="height:22px!important;width:22px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt="creative-commons share-alike icon, a arrow representing a loop encircled"></p>        
    </footer>
</body>
</head>