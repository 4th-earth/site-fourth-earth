<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php print pageTitle(); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A tabletop role playing game for the ages.">
        <style type="text/css">
            html {
                scroll-behavior: smooth;
                font-family: monospace;
                font-size: 1.5rem;
            }

            body {
                width: 70ch;
                margin: 4rem auto;
                line-height: 1.5rem;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
            }

            h3 {
                font-style: italic;
            }

            details {
                margin: 2rem 0;
            }

            details:hover {
                cursor: pointer;
            }

            table {
                margin: 2rem auto;
                width: 100%;
                border-collapse: collapse;
            }

            table th {
                padding: 5px 3px;
            }

            table td {
                padding: 7px 5px;
                border: 1px solid black;
            }

            body > ul:first-of-type {
                margin-bottom: 4rem;
            }

            li, dt {
                margin: 0.75rem 0;
            }

            dt {
                margin-bottom: 0;
            }

            div[is="heading-wrapper"] {
                display: grid;
                grid-auto-columns: 44pt auto;
                column-gap: 2ch;
                grid-template-areas:
                    'link text';
                margin-top: 3rem;
            }

            div[is="heading-wrapper"] > h2,
            div[is="heading-wrapper"] > h3,
            div[is="heading-wrapper"] > h4,
            div[is="heading-wrapper"] > h5,
            div[is="heading-wrapper"] > h6 {
                grid-area: text;
            }

            div[is="heading-wrapper"] > a {
                grid-area: link;
                display: inline-block;
                width: 44pt;
                height: 44pt;
                background: red;
            }

            div[is="heading-wrapper"] > a > span {
                position: absolute;
                left: -999px;
            }
        </style>
    </head>
    <body>
        <?php print(content()); ?>
    </body>
</html>
