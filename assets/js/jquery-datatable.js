$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    $('.js-scroll').DataTable({
            "scrollY": "225px",
            "scrollCollapse": true,
            "paging": false
    });
});