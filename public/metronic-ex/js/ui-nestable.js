var UINestable = function () {
    return {
        //main function to initiate the module
        init: function () {
            // activate Nestable for list 1
            $('#nestable_list').nestable({
                group: 1
            }).on('change');
        }
    };
}();