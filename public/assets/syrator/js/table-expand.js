var TableExpand = function () {
    return {
        init: function (columnFilterSetting, elemId) {
            if (!jQuery().dataTable) {
                return;
            }

            var oTable = $('#'+elemId).dataTable({
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "全部"]
                ],
            });
        }
    };
}();