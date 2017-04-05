var TableMaterial = function () {
    return {
        init: function (columnFilterSetting, elemId) {
            if (!jQuery().dataTable) {
                return;
            }

            var oTable = $('#'+elemId).dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "全部"]
                ],
                "iDisplayLength": 5,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ 每页",
                    "oPaginate": {
                        "sPrevious": "上一页",
                        "sNext": "下一页",
                        "sFirst": "首页",
        				"sLast": "尾页",
                    },
                    "sSearch": "查找：",
        			"sInfo": "显示第 _START_ 到 _END_ 条记录，共  _TOTAL_ 条记录",
        			"sInfoEmpty": "显示第0到0条记录，共0条记录",
        			"sInfoFiltered": "(由_MAX_项记录过滤)",
                    "sZeroRecords": "没有符合条件的记录"
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            }).columnFilter(columnFilterSetting);

            jQuery('#'+elemId + ' .group-checkable').change(function () {
                var set = jQuery(this).attr("data-set");
                var checked = jQuery(this).is(":checked");
                jQuery(set).each(function () {
                    if (checked) {
                        $(this).attr("checked", true);
                    } else {
                        $(this).attr("checked", false);
                    }
                });
                jQuery.uniform.update(set);
            });

            jQuery('#'+elemId + '_wrapper .dataTables_filter input').addClass("m-wrap small");
            jQuery('#'+elemId + '_wrapper .dataTables_length select').addClass("m-wrap small");
            jQuery('#'+elemId + '_wrapper .dataTables_length select').select2();
            
            $('#'+elemId + '_column_toggler input[type="checkbox"]').change(function(){
                var iCol = parseInt($(this).attr("data-column"));
                var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                oTable.fnSetColumnVis(iCol, (bVis ? false : true));
            });
        }
    };
}();