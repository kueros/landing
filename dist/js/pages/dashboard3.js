$(function () {
	'use strict'
	fetch('data.json')
		.then(response => response.json())
		.then(data => {
			// Procesar el JSON
			for (const key in data.data) {
				if (data.data.hasOwnProperty(key)) {
					const tipoOrden = data.data[key].tipo_orden;
					const datos = data.data[key].datos;
					//console.log(`Tipo de Orden: ${tipoOrden}, Datos: ${datos}`);
				}
			}
		})
		.catch(error => console.error('Error al cargar el JSON:', error));
	var ticksStyle = { fontColor: '#495057', fontStyle: 'bold' }
	var mode = 'index'
	var intersect = true
	// Grafico  de barras.
	var $salesChart = $('#sales-chart')
	var salesChart = new Chart($salesChart, {
		type: 'bar',
		data: {
			labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC', 'ENE'],
			datasets: [{
				backgroundColor: '#78B258', borderColor: '#78B258',
				data: [100, 200, 300, 250, 270, 250, 300, 340]
			}, // sh
			{
				backgroundColor: '#0050C3', borderColor: '#0050C3',
				data: [700, 170, 270, 200, 180, 150, 200, 275]
			}, // tn
			{
				backgroundColor: '#9A5C8E', borderColor: '#9A5C8E',
				data: [700, 170, 270, 200, 180, 150, 200, 380]
			}  // wc
			]
		},
		options: {
			maintainAspectRatio: false,
			tooltips: { mode: mode, intersect: intersect },
			hover: { mode: mode, intersect: intersect },
			legend: { display: false },
			scales: {
				yAxes: [{
					gridLines: {
						display: true,
						lineWidth: '4px',
						color: 'rgba(0, 0, 0, .2)',
						zeroLineColor: 'transparent'
					},
					ticks: $.extend({
						beginAtZero: true,
						callback: function (value) {
							if (value >= 1000) {
								value /= 1000
								value += 'k'
							}
							return '$' + value
						}
					},
						ticksStyle)
				}],
				xAxes: [{
					display: true,
					gridLines: { display: false },
					ticks: ticksStyle
				}]
			}
		}
	})
	// Fin grafico de barras.
	var $visitorsChart = $('#visitors-chart')
	var visitorsChart = new Chart($visitorsChart, {
		data: {
			labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
			datasets: [
				{
					type: 'line', data: [100, 120, 170, 167, 180, 177, 160],
					backgroundColor: 'transparent', borderColor: '#78B258', pointBorderColor: '#78B258', pointBackgroundColor: '#78B258', fill: false
				},
				{
					type: 'line', data: [40, 150, 140, 175, 225, 210, 195],
					backgroundColor: 'transparent', borderColor: '#0050C3', pointBorderColor: '#0050C3', pointBackgroundColor: '#0050C3', fill: false
				},
				{
					type: 'line', data: [60, 80, 70, 67, 80, 77, 100],
					backgroundColor: 'tansparent', borderColor: '#9A5C8E', pointBorderColor: '#9A5C8E', pointBackgroundColor: '#9A5C8E', fill: false
				}]
		},
		options: { maintainAspectRatio: false, tooltips: { mode: mode, intersect: intersect }, hover: { mode: mode, intersect: intersect }, legend: { display: false }, scales: { yAxes: [{ gridLines: { display: true, lineWidth: '4px', color: 'rgba(0, 0, 0, .2)', zeroLineColor: 'transparent' }, ticks: $.extend({ beginAtZero: true, suggestedMax: 200 }, ticksStyle) }], xAxes: [{ display: true, gridLines: { display: false }, ticks: ticksStyle }] } }
	})

	

	var $piechart1 = $('#piechart1')
	var piechart1 = new Chart($piechart1, {
		type: 'pie',
		data: {
			labels: [
				'Shopify',
				'TiendaNube',
				'WooCommerce'
			],

			datasets: [{
				backgroundColor: ['#78B258', '#0050C3', '#9A5C8E'],
				borderColor: ['#78B258', '#0050C3', '#9A5C8E'],
				data: [150, 120, 170],
			}  // wc
			]
		},
		options: {
			maintainAspectRatio: false,
			tooltips: { mode: mode, intersect: intersect },
			hover: { mode: mode, intersect: intersect },
			legend: { display: true },
		}
	})


	var $piechart2 = $('#piechart2')
	var piechart2 = new Chart($piechart2, {
		type: 'pie',
		data: {
			labels: [
				'Shopify',
				'TiendaNube',
				'WooCommerce'
			],

			datasets: [{
				backgroundColor: ['#78B258', '#0050C3', '#9A5C8E'],
				borderColor: ['#78B258', '#0050C3', '#9A5C8E'],
				data: [120, 200, 150],
			}  // wc
			]
		},
		options: {
			maintainAspectRatio: false,
			tooltips: { mode: mode, intersect: intersect },
			hover: { mode: mode, intersect: intersect },
			legend: { display: true },
		}
	})



	var $piechart3 = $('#piechart3')
	var piechart3 = new Chart($piechart3, {
		type: 'pie',
		data: {
			labels: [
				'Shopify',
				'TiendaNube',
				'WooCommerce'
			],

			datasets: [{
				backgroundColor: ['#78B258', '#0050C3', '#9A5C8E'], 
				borderColor: ['#78B258', '#0050C3', '#9A5C8E'],
				data: [75,220,50],
			}  // wc
			]
		},
		options: {
			maintainAspectRatio: false,
			tooltips: { mode: mode, intersect: intersect },
			hover: { mode: mode, intersect: intersect },
			legend: { display: true },
		}
	})
})
