
function logout() {

    $.ajax({
        url: 'logout.php',
        success:function(data) {
        window.location.href = 'panel.php';
    }
    })

}


function exportsql(table) {

    $.ajax({
        url: 'exportsql.php?table='+table,
        success: function(data) {

            if(data != "-1") {
                saveToDisk(data,table+'.sql');
            }

        }
    })

}


function saveToDisk(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        save.download = fileName || 'unknown';

        try {
            var evt = new MouseEvent('click', {
                'view': window,
                'bubbles': true,
                'cancelable': false
            });
            save.dispatchEvent(evt);

            (window.URL || window.webkitURL).revokeObjectURL(save.href);

        } catch(ex) {
            window.open(fileURL, fileName);
        }
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}


function truncate(table) {

    if(confirm('TRUNCATE TABLE '+table+"??")) {

        $.ajax({
            url: 'truncate.php?table='+table,
            success:function(data) {
            window.location.href = "panel.php";
        }
    })
}

}


function changeDatabase() {
    var d = document.getElementById("dbselect");
    $.ajax({
        url: 'changedb.php?database='+d.value,
        success:function(data) {
            window.location.href = "panel.php";
        }
    })
}

function importsqlpage() {
    window.location.href = "data/index.php";
}

function showtablecontent(table) {
    window.location.href = "tablecontent.php?table="+table;
}

function goback() {
    window.location.href = "panel.php";
}


function tableshow() {

    table.style.display = "table";

}

function importsql(file) {

    $.ajax({

        url: 'importsql.php?file='+file,
        success:function(data) {
        window.location.href = 'panel.php';
    }

})

}