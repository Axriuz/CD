var docuManager = {
    search: function (query) {
        var $list = $("div.list-group");
        if (query === "All") {
            $list.children().show();
        } else {
            $list.children().hide();
            $list.find("a[data-plugin='" + query + "']").show();
        }
    }
};

$(document).ready(function () {
    $("a[role='menuitem']").on("click", function (e) {
        var $item = $(this),
            value = $item.text(),
            $dropdown = $item.closest("div.dropdown"),
            $label = $dropdown.find("button span[role='label']");
        $label.text(value);
        docuManager.search(value);
    });
});