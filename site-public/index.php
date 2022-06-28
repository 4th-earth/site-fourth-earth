<?php
$rawDomain = "http://raw.earth.fourth:8889";
$loreDomain = "http://lore.earth.fourth:8889";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>4th Earth</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A tabletop role playing game for the ages.">
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="<?php print($rawDomain); ?>"><abbr title="Rules as Written">RAW</a></li>
                <li><a href="<?php print($loreDomain); ?>">Lore</a></li>
            </ul>
        </nav>
    </body>
</html>
