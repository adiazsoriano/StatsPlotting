<?php 
require_once "../util/calculations.php";
?>

<html>
    <head>
        <script src="https://cdn.plot.ly/plotly-2.14.0.min.js"></script>
        <script>
            var x = <?php echo !empty($_POST["compute"]) ? toJSArr($_POST["numList"]) : "[]";  ?>;

            function validatenum() {
                var input = document.getElementById("input");
                
                if(Number.isFinite(parseFloat(input.value.toString().trim()))) {
                    let numericInput = Number.parseInt(input.value.trim());
                    
                    input.value = "";
                    input.focus();

                    document.getElementById("numList").value += numericInput + " ";
                }
            }
        </script>
        <script src="../../script/plot.js"></script>
    </head>
    <body <?php if(!empty($_POST["compute"])) {echo "onload='return drawGraph()'";}?>>
        <div <?php if(!empty($_POST["compute"])) {echo "class='graphdiv' id='graph'";} ?>></div>
        <div id="inputdiv" class="inputdiv">
            <form method="POST">
                <fieldset>
                    <legend>Enter your numbers.</legend>

                    <div> 
                        <textarea id="numList" name="numList" rows="20" cols="75" readonly></textarea>
                        <br>
                        <label>Enter:</label>
                        <input id="input" type="text" placeholder="Enter numbers here.">
                        <button id="addnum" type="button" onclick="validatenum()">Enter.</button>
                    </div>

                    <br>
                    
                    <button type="submit" name="compute" value="computed">Compute Graph</button>
                </fieldset>
            </form>
        </div>
    </body>

</html>