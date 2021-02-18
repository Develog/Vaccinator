function createPieFrance(idPie, data)
{
    dataArray = data;
    var ctx = document.getElementById(idPie).getContext('2d');

    data = {
        datasets: [{
            data: [
                data[0],
                0,
                100 - data[0]
            ],
            backgroundColor: [
                'rgb(0, 200, 0)',
                '#01570f',
                '#b3b3b3',
            ]
        }, {
            data: [
                0,
                data[1],
                100 - data[1]
            ],
            backgroundColor: [
                'rgb(0, 200, 0)',
                '#01570f',
                '#b3b3b3',
            ]
        }],
        labels: [
            '1ère dose - ' + data[0] + ' %',
            '2nde dose - ' + data[1] + ' %',
            'Restant'
        ]
    };

    var position;
    if(isMobileDevice()) {
        position = 'bottom';
    } else {
        position = 'right';
    }

    
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            legend: {
                position: position,
                display: false
            }
        }
    });
}


function isMobileDevice(){
    return ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
}