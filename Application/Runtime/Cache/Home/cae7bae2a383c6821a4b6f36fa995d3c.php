<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/html">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
<div style="height: 400px;width:400px">
    <canvas id="pie"></canvas>
</div>
<div style="height: 400px;width:400px">
    <canvas id="radar"></canvas>
</div>
<div >
    <?php echo ($info); ?>
</div>

<script type="text/javascript" src="/NursingHome/Public/js/lib/Chart.js"></script>
<script type="text/javascript" src="/NursingHome/Public/js/lib/Chart.bundle.js"></script>
<script src="/NursingHome/Public/js/lib/jquery-3.2.1.js"></script>
<script>
        var ctx = $("#pie").get(0).getContext("2d");
        var pie = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Attack", "Defense", "Magic", "Difficulty"],
                datasets: [
                    {
                        label: 'Annie',
                        data: [2, 3, 10, 4],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    },
                ]
            },
            options: {}
        });
        var ctx = $("#radar").get(0).getContext("2d");
        var radar = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: ["Attack", "Defense", "Magic", "Difficulty"],
                datasets: [
                    {
                        label: '# of Votes',
                        data: [4, 3, 10, 4],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    },
                ]
            },
            options: {}
        });

</script>
</body>
</html>