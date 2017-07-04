var TableExpand = function () {
    return {
        init: function (columnFilterSetting, elemId) {
            if (!jQuery().dataTable) {
                return;
            }
            
            var oTable = $('#'+elemId).dataTable({
                "language": {
                   url: '{{ _asset("assets/syrator/js/Chinese.json") }}"'
                },

                buttons: [
                    { extend: 'print', className: 'btn dark btn-outline' },
                    { extend: 'pdf', className: 'btn green btn-outline' },
                    { extend: 'csv', className: 'btn purple btn-outline ' }
                ],

                responsive: {
                    details: {
                       
                    }
                },

                "order": [
                    [0, 'asc']
                ],
                
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "全部"]
                ],
                "pageLength": 10,

                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            });
        }
    };
}();