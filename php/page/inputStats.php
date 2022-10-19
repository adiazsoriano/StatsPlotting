<?php 
require_once "../util/calculations.php";


?>

<html>
    <head>
        <title>Inputting Stats</title>
        <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
        <script> var x = <?php ?>;</script>
        <script src="../../script/plot.js"></script>
    </head>
    <body>
        <div id="inputPlot">

        </div>
        <div class="input">
            <form method="POST">
                <fieldset>
                    <legend>Enter your numbers.</legend>
                </fieldset>
            </form>
        </div>
    </body>

</html>