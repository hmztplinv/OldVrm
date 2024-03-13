var personelURL = window.location.origin+"/verim/personel";
var ctx =document.getElementById("departmanChart");

$(document).ready(function(){
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                $.post(personelURL, {
                    department: 1,
                    positionAP: "A",
                    departmentS: 1
                }, function (result) {
                    alert(result);
                })
            ],
            datasets: [{
                label: 'Departman',
                data: [
                    $.post(personelURL, {
                        department_count: 1,
                        positionAP: "A",
                        departmanS: 1
                    }, function (result) {
                        print(result);
                    })
                ],
                backgroundColor: [
                    'rgba(107, 21, 182, 0.8)',
                    'rgba(255, 185, 35, 0.8)',
                    'rgba(255, 87, 86, 0.8)',
                    'rgba(114, 211, 220, 0.8)',
                    'rgba(123, 192, 67, 0.8)',
                    'rgba(77, 100, 141, 0.8)',
                    'rgba(170, 170, 170, 0.8)',
                    'rgba(223, 162, 144, 0.8)',
                    'rgba(255, 238, 173, 0.8)',
                    'rgba(133, 68, 66, 0.8)',
                    'rgba(249, 180, 45, 0.8)',
                    'rgba(253, 244, 152, 0.8)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        },
        options: {
            plugins: {
                legend: {
                    display: false
                },
            },
        }
    });
});
