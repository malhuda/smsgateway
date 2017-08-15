$(function () {
    var chart=new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                events: {
                    load: function(event) {
                        //When is chart ready?                        
                        var jml_kategori=this.series.length;                        
                        for(var i=1;i<jml_kategori;i++){
                            this.series[i].hide();
                        }
                    }
                },    
                type: 'column'
            },
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ]
            },
            yAxis: {
                min: 0,
                max: 216.4,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                series: {
                    events: {
                        legendItemClick: function(event) {                            
                            if (this.visible) {
                                return false;
                            }else{                                
                                var jml_kategori=this.chart.series.length;
                                for(i=0;i<jml_kategori;i++){
                                    if(i!=this.index && this.chart.series[i].visible){
                                       this.chart.series[i].hide("slow",this.chart.series[this.index].show("slow"));                
                                    }
                                }
                                return false;
                            }
                        }
                    }
                },
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
           legend: {
               style:{
                   lineHeight: '10px' 
               },
               width: 450,
               maxHeight: 40,
               itemStyle: {
                   color: '#000000',                   
                   fontSize: '12px'
               },
               navigation: {                    
                    style: {
                        fontSize: '12px'	
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Tokyo',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
            }, {
                name: 'New York',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
            }, {
                name: 'London',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
            }, {
                name: 'Berlin',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
            },{
                name: 'Jakarta',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
            }, {
                name: 'Surabaya',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
            }, {
                name: 'Makasar',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
            }, {
                name: 'Semarang',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
            }, {
                name: 'Solo',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
            }, {
                name: 'Jogjakarta',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
            }]
        });
    });
    
