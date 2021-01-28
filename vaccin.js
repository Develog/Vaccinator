function createChart(regionId, data, date)
{
    data = JSON.parse(data);
    date = JSON.parse(date.replaceAll("'", '"'));
    
    var ctx = document.getElementById('chart_' + regionId).getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: regionId,
                backgroundColor: 'rgba(150, 150, 90,1)',
                borderColor: 'rgba(50, 200, 80,1)',
                fill: false,
                data: data
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                        }
                }]
            }
        }
    });	
}

function createChartFrance(data, date) 
{
	data = JSON.parse(data.replaceAll("'", '"'));
	date = JSON.parse(date.replaceAll("'", '"'));
    
    var ctx = document.getElementById('chart_fr').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: date,
            datasets: [{
                label: "France",
                borderColor: '#054688',
                fill: false,
                data: data
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                        }
                }]
            }
        }
    });	
}