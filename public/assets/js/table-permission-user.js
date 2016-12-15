var TableMember = function () {
    return {
        init: function (columnFilterSetting) {
            if (!jQuery().dataTable) {
                return;
            }

            var oTable = $('#syrator_table_permission_user').dataTable({
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

            jQuery('#syrator_table_permission_user .group-checkable').change(function () {
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

            jQuery('#syrator_table_permission_user_wrapper .dataTables_filter input').addClass("m-wrap small");
            jQuery('#syrator_table_permission_user_wrapper .dataTables_length select').addClass("m-wrap small");
            jQuery('#syrator_table_permission_user_wrapper .dataTables_length select').select2();
            
            $('#syrator_table_permission_user_column_toggler input[type="checkbox"]').change(function(){
                /* Get the DataTables object again - this is not a recreation, just a get of the object */
                var iCol = parseInt($(this).attr("data-column"));
                var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                oTable.fnSetColumnVis(iCol, (bVis ? false : true));
            });
            
            $('#syrator_table_permission_user_select_role').change(function(){
                alert(this.options[this.options.selectedIndex].value + this.options[this.options.selectedIndex].text);
                oTable.columnFilter({
           			aoColumns: [ { type: "select", values: [ 'Gecko', 'Trident', 'KHTML', 'Misc', 'Presto', 'Webkit', 'Tasman']  },
               				     { type: "text" },
               				     null,
               				     { type: "number" },
               				     { type: "select", values: [ 'A', 'C', 'U', 'X']  }
               				]

               		});
            });
        }
    };
}();