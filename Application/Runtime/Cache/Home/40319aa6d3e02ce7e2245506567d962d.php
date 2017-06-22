<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
   <!-- <div class="editable" id="richedit" contenteditable></div>-->
    <div>
        <canvas id="drawing" width=" 200" height="200">A drawing of something.</canvas>
    </div>


   <script>
       var drawing = document.getElementById("drawing");
       /*//确定浏览器支持<canvas>元素
       if (drawing.getContext){
           var context = drawing.getContext("2d");
           /!*
            * 根据 Mozilla 的文档
            * http://developer.mozilla.org/en/docs/Canvas_tutorial:Basic_usage
            *!/
//绘制红色矩形
           context.fillStyle = "#ff0000";
           context.fillRect(10, 10, 50, 50);
//绘制半透明的蓝色矩形
           context.fillStyle = "rgba(0,0,255,0.5)";
           context.fillRect(30, 30, 50, 50);
           context.clearRect(40, 40, 10, 10);

       }
       //确定浏览器支持<canvas>元素
       if (drawing.getContext){
           var context = drawing.getContext("2d");
/!*!//开始路径
           context.beginPath();
//绘制外圆
           context.arc(100, 100, 99, 0, 2 * Math.PI, false);
//绘制内圆
           context.moveTo(194, 100);
           context.arc(100, 100, 94, 0, 2 * Math.PI, false);
//绘制分针
           context.moveTo(100, 100);
           context.lineTo(100, 15);
//绘制时针
           context.moveTo(100, 100);
           context.lineTo(35, 100);
//描边路径
           context.stroke();*!/

           /!*!//绘制红色描边矩形
           context.strokeStyle = "#ff0000";
           context.strokeRect(10, 10, 50, 50);
           //context.lineWidth = "300px";
//绘制半透明的蓝色描边矩形
           context.strokeStyle = "rgba(0,0,255,0.5)";
           context.strokeRect(30, 30, 50, 50);
           //在两个矩形重叠的地方清除一个小矩形*!/
       }
*/
      /* //正常
       context.font = "bold 14px Arial";
       context.textAlign = "center";
       context.textBaseline = "middle";
       context.fillText("12", 100, 20);
       //起点对齐
       context.textAlign = "start";
       context.fi llText("12", 100, 40);
       //终点对齐
       context.textAlign = "end";
       context.fi llText("12", 100, 60);*/

       /*if (drawing.getContext) {
           var context = drawing.getContext("2d");
           var fontSize = 100;
           context.font = fontSize + "px Arial";
           while (context.measureText("Hello world!").width > 140) {
               fontSize--;
               context.font = fontSize + "px Arial";
           }
           context.fillText("Hello world!", 10, 10);
           context.fillText("Font size is " + fontSize + "px", 10, 50);
       }*/
      /* var context = drawing.getContext("2d");
       //设置阴影
       context.shadowOffsetX = 5;
       context.shadowOffsetY = 5;
       context.shadowBlur = 4;
       context.shadowColor = "rgba(0, 0, 0, 0.5)";
       //绘制红色矩形
       context.fillStyle = "#ff0000";
       context.fillRect(10, 10, 50, 50);
       //绘制蓝色矩形
       context.fillStyle = "rgba(0,0,255,1)";*/

       var context = drawing.getContext("2d");
      /* var gradient = context.createLinearGradient(30, 30, 70, 70);
       gradient.addColorStop(0, "white");
       gradient.addColorStop(1, "blue");
       //绘制红色矩形
       context.fillStyle = "#ff0000";
       context.fillRect(10, 10, 50, 50);
       //绘制渐变矩形
       context.fillStyle = gradient;
       context.fillRect(30, 30, 50, 50);*/

       var gradient = context.createRadialGradient(55, 55, 50, 55, 55, 100);

       gradient.addColorStop(0, "white");
       gradient.addColorStop(1, "black");
       //修改全局透明度
       context.globalAlpha = 0.5;
       //绘制红色矩形
       context.fillStyle = "#ff0000";
       context.fillRect(10, 10, 500, 500);
       //设置合成操作
       //context.globalCompositeOperation = "destination-over";
       context.globalCompositeOperation = "source-in";
       //绘制渐变矩形
       context.fillStyle = gradient;
       context.fillRect(30, 30, 500, 500);
   </script>
</body>
</html>