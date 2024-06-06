$(function(){'use strict'


	fetch('data.json')
		.then(response => response.json())
		.then(data => {
			// Procesar el JSON
			for (const key in data.data) {
				if (data.data.hasOwnProperty(key)) {
					const tipoOrden = data.data[key].tipo_orden;
					const datos = data.data[key].datos;
					console.log(`Tipo de Orden: ${tipoOrden}, Datos: ${datos}`);
				}
			}
		})
		.catch(error => console.error('Error al cargar el JSON:', error));


var ticksStyle={fontColor:'#495057',fontStyle:'bold'}

var mode='index'

var intersect=true

// Grafico  de barras.

var $salesChart=$('#sales-chart')

var salesChart = new Chart($salesChart,{type:'bar',
	data: {
		labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'ENE'],

                                        datasets:[{backgroundColor:'#007bff',borderColor:'#007bff',
													data: [100, 200, 300, 250, 270, 250, 300, 340]
                                                   }, // sh

                                                  {backgroundColor:'#ced4da', borderColor:'#ced4da',
                                                    data:[700,170,270,200,180,150,200,275]}, // woo

                                                    {backgroundColor:'#ced4df', borderColor:'#ced4df',
                                                    data:[700,170,270,200,180,150,200,380]},  // TN

                                                  {backgroundColor:'#007bff',borderColor:'#007bff',
                                                   data:[100,200,300,250,270,250,300,550] } // ID
                                        
                                                ]
                                        },
                            options:{maintainAspectRatio:false,
                                    tooltips:{mode:mode,intersect:intersect},
                                    hover:{mode:mode,intersect:intersect},
                                    legend:{display:false},
                                    scales:{yAxes:[{gridLines:{display:true,
                                                    lineWidth:'4px',
                                                    color:'rgba(0, 0, 0, .2)',
                                                    zeroLineColor:'transparent'},
                                                    ticks:$.extend({beginAtZero:true,
                                                        callback:function(value){if(value>=1000){value/=1000 
                                                        value+='k'}

                            return '$'+value}},
                            ticksStyle)}],
                            xAxes:[{display:true,
                                    gridLines:{display:false},
                                    ticks:ticksStyle}]}}})

// Fin grafico de barras.

var $visitorsChart=$('#visitors-chart')

var visitorsChart=new Chart($visitorsChart,{data:{labels:['18th','20th','22nd','24th','26th','28th','30th'],
                            
                            datasets:[{type:'line',data:[100,120,170,167,180,177,160],
                            
                            backgroundColor:'transparent',borderColor:'#007bff',pointBorderColor:'#007bff',pointBackgroundColor:'#007bff',fill:false},


                            
                            {type:'line',data:[60,80,70,67,80,77,100],
                            backgroundColor:'tansparent',borderColor:'#ced4da',pointBorderColor:'#ced4da',pointBackgroundColor:'#ced4da',fill:false}]},
                            options:{maintainAspectRatio:false,tooltips:{mode:mode,intersect:intersect},hover:{mode:mode,intersect:intersect},legend:{display:false},scales:{yAxes:[{gridLines:{display:true,lineWidth:'4px',color:'rgba(0, 0, 0, .2)',zeroLineColor:'transparent'},ticks:$.extend({beginAtZero:true,suggestedMax:200},ticksStyle)}],xAxes:[{display:true,gridLines:{display:false},ticks:ticksStyle}]}}})})



