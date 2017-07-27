//chart call function

function single_line_chart(result){
    result.div.highcharts({
        title: false,
     
        xAxis: {
            categories: result.data.categories
        },
        yAxis: {
            title: false,
            plotLines: [{
                value: 0,
                width: 1,
                color: '#fca31d'
            }]
        },
        legend: false,
        credits: false,
        series: [{
            name: result.data.data_title,
            data: result.data.data,
            color: '#fca31d'
        }]
    });
}

function single_line_chart_utc(result){
	result.div.highcharts({
        chart:{
             height: 150
        },
        title: false,
       
        xAxis: {
                type: 'datetime'
            },
        yAxis: {
            title: false,
            plotLines: [{
                value: 0,
                width: 1,
                color: '#fca31d'
            }]
        },
        legend: false,
        credits: false,
        series: [{
            name: result.title,
            data: result.data,
            color: '#fca31d'
        }]
    });
}

function single_column_chart(result){
    result.div.highcharts({
            chart: {
                type: 'column',
                height: result.height
            },
            title:false,
            xAxis: {
                categories: result.data.categories
            },
             yAxis: {
                min: 0,
                title: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y;
                }
            },
            credits: false,
            legend: false,
            series: [{
                name: result.data.title,
                data: result.data.data,
                color: '#fca31d'
            }]
        });
}