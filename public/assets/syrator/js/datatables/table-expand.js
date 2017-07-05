var TableExpand = function () {
    return {
        init: function (columnFilterSetting, elemId) {            
            var table = $('#'+elemId);
            var oTable = table.dataTable({
                buttons: [
  					{ extend: 'print', className: 'btn default'},
  					{ extend: 'copy', className: 'btn default'},
  					{ extend: 'pdf', className: 'btn default'},
  					{ extend: 'excel', className: 'btn default'},
  					{ extend: 'csv', className: 'btn default'},
  	                { extend: 'colvis', className: 'btn default'}
  				],
                "language": {
                   url: '/assets/syrator/js/datatables/Chinese.json'
                },
                "bStateSave": false,
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
	                }
                ],
                "order": [
                    [1, 'asc']
                ],
            }).columnFilter(columnFilterSetting);
            
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
            
            $('#'+elemId + '_column_toggler input[type="checkbox"]').change(function(){
                var iCol = parseInt($(this).attr("data-column"));
                var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                oTable.fnSetColumnVis(iCol, (bVis ? false : true));
            });            
            $('#'+elemId + '_column_toggler label').click(function(e) {
                e.stopPropagation();
            });
            
            $('#'+elemId + '_tools > li > a.tool-action').on('click', function() {
                var action = $(this).attr('data-action');
                oTable.DataTable().button(action).trigger();
            });
        }
    };
}();