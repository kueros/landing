var $piechart14 = $('#piechart')
var piechart1 = new Chart($piechart1, {
	type: 'pie',

	labels: [
		'Red',
		'Blue',
		'Yellow'
	],
	datasets: [{
		label: 'My First Dataset',
		data: [300, 50, 100],
		backgroundColor: [
			'rgb(255, 99, 132)',
			'rgb(54, 162, 235)',
			'rgb(255, 205, 86)'
		],
		hoverOffset: 4
	}]
})



var $piechart24 = $('#piechart')
var piechart2 = new Chart($piechart2, {
	type: 'pie',
	labels: [
		'Shopify',
		'TiendaNube',
		'WooCommerce'
	],
	datasets: [{
		label: 'My First Dataset',
		data: [300, 50, 100],
		backgroundColor: [
			'rgb(255, 99, 132)',
			'rgb(54, 162, 235)',
			'rgb(255, 205, 86)'
		],
		hoverOffset: 4
	}]
})









// Do not show lines for all datasets by default
Chart.defaults.datasets.line.showLine = false;

// This chart would show a line only for the third dataset
const chart = new Chart(ctx, {
	type: 'line',
	data: {
		datasets: [{
			data: [0, 0],
		}, {
			data: [0, 1]
		}, {
			data: [1, 0],
			showLine: true // overrides the `line` dataset default
		}, {
			type: 'scatter', // 'line' dataset default does not affect this dataset since it's a 'scatter'
			data: [1, 1]
		}]
	}
});





const config = {
	type: 'pie',
	data: data,
};




const data = {
	labels: [
		'Red',
		'Blue',
		'Yellow'
	],
	datasets: [{
		label: 'My First Dataset',
		data: [300, 50, 100],
		backgroundColor: [
			'rgb(255, 99, 132)',
			'rgb(54, 162, 235)',
			'rgb(255, 205, 86)'
		],
		hoverOffset: 4
	}]
};