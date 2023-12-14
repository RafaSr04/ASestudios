$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        dots: false,
        items: 1,
        dotsEach: false,
        autoplay: true,
        rewind: true
    });
    grafica_estatus();
});//ready
function grafica_estatus() {
    peticion("home", "grafica_estatus","").done(function (result) {
        if ("OK" == result.code) {          
            
            var datos = result.data;
            
            
            var source = {
                datatype: "array",
                datafields: [
                    { name: 'descripcion', type: 'string' },
                    { name: 'repeticiones', type: 'string' }
                ],
                localdata: datos
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            var settings = {
                title: "Citas",
                description: "",
                renderEngine: 'HTML5',
                enableAnimations: true,
                showLegend: true,
                showBorderLine: false,
                legendLayout: {
                    left: 325, top: 50, width: 300, height: 200, flow: 'vertical'
                },
                padding: {
                    left: -100,
                    top: 5,
                    right: 5,
                    bottom: 5
                },
                titlePadding: {
                    left: 0,
                    top: 0,
                    right: 0,
                    bottom: 10
                },
                source: dataAdapter,
                seriesGroups: [{
                    type: 'pie',
                    showLabels: true,
                    series: [{
                        dataField: 'repeticiones',
                        displayText: 'descripcion',
                        labelRadius: 170,
                        initialAngle: 15,
                        radius: 145,
                        centerOffset: 0,
                        //formatSettings: { sufix: '%', decimalPlaces: 2 },
                        formatFunction: function (value) {
                            if (isNaN(value))
                                return value;
                            return parseFloat(value);
                        },
                    }]
                }]
            };
            $("#jqxChart_estatus").jqxChart(settings)
        }
    })
}