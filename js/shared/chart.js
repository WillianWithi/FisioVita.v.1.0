var BitChart = {
    CurrencyCode: "BTC",

    Init: function (currencyCode) {
        this.CurrencyCode = currencyCode;

        Highcharts.setOptions({
            lang: {
                months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                shortMonths: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                weekdays: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
                decimalPoint: ",",
                thousandsSep: ".",
                loading: "Carregando..."
            }
        });

        this.DrawDailyChart();
    },

    DrawDailyChart: function () {
        $.getJSON('/marketdata/daily?currencyCode=' + this.CurrencyCode, function (data) {
            // Create the chart
            $('#chartContainer').highcharts('StockChart', {
                rangeSelector: {
                    selected: 1,
                    inputEnabled: false,
                    buttons: [{
                        type: 'month',
                        count: 1,
                        text: '1m'
                    }, {
                        type: 'month',
                        count: 3,
                        text: '3m'
                    }, {
                        type: 'month',
                        count: 6,
                        text: '6m'
                    }, {
                        type: 'month',
                        count: 12,
                        text: '12m'
                    }, {
                        type: 'all',
                        text: 'All'
                    }]
                },
                tooltip: {
                    crosshairs: [true, true]
                },
                credits: {
                    enabled: false
                },
                yAxis: {
                    gridLineColor: "#F0F0F0"
                },
                series: [{
                    name: BitChart.CurrencyCode,
                    data: data,
                    tooltip: {
                        valueDecimals: 2
                    }
                }]
            });
        });
    }
};
