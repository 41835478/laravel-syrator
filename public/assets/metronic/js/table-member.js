var TableMember = function () {
    return {
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            $('#syrator_table_member').dataTable({
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
            });

            jQuery('#syrator_table_member .group-checkable').change(function () {
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

            jQuery('#syrator_table_member_wrapper .dataTables_filter input').addClass("m-wrap small");
            jQuery('#syrator_table_member_wrapper .dataTables_length select').addClass("m-wrap small");
            jQuery('#syrator_table_member_wrapper .dataTables_length select').select2();
        }
    };
}();