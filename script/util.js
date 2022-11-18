function showFiles(divID, dbinfo) {
    var div = document.getElementById(divID);

    div.innerHTML += "<table id='filetable'></table>";
    var filediv = document.getElementById("filetable");

    if(dbinfo.length > 0) {
        filediv.innerHTML += "<tr>" +
                "<th>File</th>" +
                "<th>Download</th>" +
                "<th>Graph</th>" +
                "</tr>";
    } else {
        filediv.innerHTML += "<p>There are no files in the system, please upload something!</p>";
    }

    for(let i = 0; i < dbinfo.length; i++) {
        filediv.innerHTML += "<tr>" +
                    "<td>" + dbinfo[i].Filename +"</td>" +
                    "<td><button type='submit' name='download' value='" + dbinfo[i].Filename +"'>Download File</button></td>" +
                    "<td><button type='submit' name='graph' value='" + dbinfo[i].Filename +"'>Graph File</button></td>" +
                    "</tr>"; 
    }
}