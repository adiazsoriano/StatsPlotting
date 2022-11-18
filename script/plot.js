// main js script file


function drawGraph() {

    var trace = {
        x: x,
        type: 'histogram',
        histnorm: 'probability',
        name: 'Histogram'
    };


    var trace2 = {
        type: 'violin',
        x: x,
        points: 'none',
        fillcolor: '#787878',
        opacity: 0.3,
        line: {
            color: '#404040'
        },
        meanline: {
            visible: true
          },
        name: "Curve",
        side: 'positive'
    }

    var layout = {
        autosize: false,
        width: 1300,
        height: 500,
        title: 'Normal Distribution',
        xaxis: {
            title: title
        }
    }


    var data = [trace,trace2];
    Plotly.newPlot('graph',data,layout);
}