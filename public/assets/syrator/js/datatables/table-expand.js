var TableExpand = function () {
    return {
        init: function (columnFilterSetting, elemId) {            
            var table = $('#'+elemId);
            var oTable = table.dataTable({
                "language": {
                   url: '/assets/syrator/js/datatables/Chinese.json'
                },
                "bStateSave": true,                
                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "全部"]
                ],
                "pageLength": 10,
                "pagingType": "bootstrap_full_number",
                "columnDefs": [
                {
            	   'orderable': false,
            	   'targets': [0]
                }, 
                {
            	   "searchable": false,
            	   "targets": [0]
                }, 
                {
            	   "className": "dt-right",
                }],
                "order": [
                    [1, 'asc']
                ],

                buttons: [
                    { extend: 'print', className: 'btn dark btn-outline' },
                    { extend: 'pdf', className: 'btn dark btn-outline' },
                    { extend: 'csv', className: 'btn purple btn-outline ' }
                ],

                responsive: {
                    details: {
                       
                    }
                },
            });
            
            var tableWrapper = jQuery('#' + elemId + '_wrapper');
            table.find('.group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).prop("checked", true);
                        $(this).parents('tr').addClass("active");
                    } else {
                        $(this).prop("checked", false);
                        $(this).parents('tr').removeClass("active");
                    }
                });
            });

            table.on('change', 'tbody tr .checkboxes', function () {
                $(this).parents('tr').toggleClass("active");
            });
        }
    };
}();