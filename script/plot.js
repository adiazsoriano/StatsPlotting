// main js script file


function drawGraph() {

    var trace = {
        x: x,
        type: 'histogram',
        histnorm: 'probability',
    };
    var data = [trace];
    Plotly.newPlot('graph',data);
}

function notifyUser() {
    alert("Generating Graph . . .");
}