/* script chama grafico*/

$.getScript('assets/js/morris/raphael-min.js',function(){
$.getScript('assets/js/morris/morris.js',function(){
      Morris.Donut({
        element: 'donut-example',
        data: [
         {label: "VM", value: vm},
         {label: "TOT", value: tot},
         {label: "TQT", value: tqt}
        ]
      });
});
});