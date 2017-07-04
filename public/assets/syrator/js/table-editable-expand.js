var TableEditableExpand = function () {
    return {
        //main function to initiate the module
        init: function (elemId, columnCount, callbackSave, callbackDelete) {
        	
            var nEditing = null;
            var oTable = $('#'+elemId).dataTable({
            	"bScrollCollapse": true,
            	"bAutoWidth": false,
            	"aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "全部"]
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                	"sUrl": "/assets/js/Chinese.json"
                },
                "aoColumnDefs": [{
                    'bSortable': false,
                    'aTargets': [0]
                }],
                "fnInitComplete": function() {
                	this.fnAdjustColumnSizing(true);
                },
            });
            
            jQuery('#'+elemId+'_wrapper .dataTables_filter input').addClass("m-wrap medium");
            jQuery('#'+elemId+'_wrapper .dataTables_length select').addClass("m-wrap small");
            jQuery('#'+elemId+'_wrapper .dataTables_length select').select2({
                showSearchInput : false
            });
            
            $('#'+elemId+'_new').click(function (e) {
                e.preventDefault();
                
                var columns = new Array();
                for (var i = 0; i < columnCount; i++) {
                	columns[i] = '';
                }
                columns[columnCount] = '<a class="edit" href="">编辑</a>';
                columns[columnCount+1] = '<a class="cancel" data-mode="new" href="">取消</a>';
                var aiNew = oTable.fnAddData(columns);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#'+elemId+' a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("您确定要删除这一行吗?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);
                if (callbackDelete) {
                	callbackDelete(oTable, nRow, aData);
    			} else {
    			    oTable.fnDeleteRow(nRow);
    			}
            });

            $('#'+elemId+' a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#'+elemId+' a.edit').live('click', function (e) {            	
                e.preventDefault();
                var nRow = $(this).parents('tr')[0];
                var aData = oTable.fnGetData(nRow);
                if (nEditing !== null && nEditing != nRow) {
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "保存") {
                    if (callbackSave) {
                    	var jqInputs = $('input', nRow);
                    	for (var i = 0, iLen = jqInputs.length; i < iLen; i++) {
                    		aData[i+1] = jqInputs[i].value;
                        }
                    	callbackSave(oTable, nRow, aData);
        			} else {
                        saveRow(oTable, nEditing);
        			}
                    nEditing = null;
                } else {
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
            
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }
                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                for (var i = 1, iLen = jqTds.length; i < iLen-2; i++) {
                    jqTds[i].innerHTML = '<input type="text" class="m-wrap" style="width:90%;" value="' + aData[i] + '">';
                }                
                jqTds[iLen-2].innerHTML = '<a class="edit" href="">保存</a>';
                jqTds[iLen-1].innerHTML = '<a class="cancel" href="">取消</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                for (var i = 0, iLen = jqInputs.length; i < iLen; i++) {
                    oTable.fnUpdate(jqInputs[i].value, nRow, i+1, false);
                }
                oTable.fnUpdate('<a class="edit" href="">编辑</a>', nRow, jqInputs.length+1, false);
                oTable.fnUpdate('<a class="delete" href="">删除</a>', nRow, jqInputs.length+2, false);
                oTable.fnDraw();
            }
        }
    };
}();