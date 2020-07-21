"use strict";

$("#table-1,#table-2").dataTable({
    "columnDefs": [
        { "sortable": false, "targets": [2, 3] }
    ]
});