var BitGlobal = {
    PositionFooter: function () {
        var footer = $("footer");
        if (footer.length > 0) {
            if ((footer.position().top + footer.height() + 40) < $(window).height()) {
                footer.css("position", "absolute");
            }
            else {
                footer.css("position", "relative");
            }
        }
    },

    UpdateBalanceBRL: function () {
        $.post("/wallet/conventional/getbalance", function (data) {
            $(".BalanceBRL").text(data);
        });
    },

    UpdateBalanceBTC: function () {
        $.post("/wallet/digital/getbalance", { currencyCode: "BTC" }, function (data) {
            $(".BalanceBTC").text(data);
        });
    },

    UpdateBalanceLTC: function () {
        $.post("/wallet/digital/getbalance", { currencyCode: "LTC" }, function (data) {
            $(".BalanceLTC").text(data);
        });
    },

    ChangeSelectedDigitalCurrency: function (currencyCode) {
        window.location = window.location.pathname + "?SDCC=" + currencyCode;
        return false;
    }
};

$(document).ready(function () {
    BitGlobal.PositionFooter();
    $(window).resize(function () { $("footer").css("position", "relative"); BitGlobal.PositionFooter(); });
});
