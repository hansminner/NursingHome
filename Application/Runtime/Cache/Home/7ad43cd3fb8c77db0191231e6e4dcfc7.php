<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebGl</title>
</head>
<body>

<div>
    <canvas id="drawing" width=" 200" height="200">A drawing of something.</canvas>
</div>







<script>

    var drawing = document.getElementById("drawing");
    //确定浏览器支持<canvas>元素
    if (drawing.getContext){
        try {
            gl = drawing.getContext("experimental-webgl");
        } catch (ex) {
//什么也不做
        }
        if (gl){
//使用 WebGL
        } else {
            alert("WebGL context could not be created.");
        }
    }
    var vertexGlsl = document.getElementById("vertexShader").text,
            fragmentGlsl = document.getElementById("fragmentShader").text;

    var vertexShader = gl.createShader(gl.VERTEX_SHADER);
    gl.shaderSource(vertexShader, vertexGlsl);
    gl.compileShader(vertexShader);
    var fragmentShader = gl.createShader(gl.FRAGMENT_SHADER);
    gl.shaderSource(fragmentShader, fragmentGlsl);
    gl.compileShader(fragmentShader);

    var program = gl.createProgram();
    gl.attachShader(program, vertexShader);
    gl.attachShader(program, fragmentShader);
    gl.linkProgram(program);

    var vertices = new Float32Array([ 0, 1, 1, -1, -1, -1 ]),
            buffer = gl.createBuffer(),
            vertexSetSize = 2,
            vertexSetCount = vertices.length/vertexSetSize,
            uColor, aVertexPosition;
    //把数据放到缓冲区
    gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
    gl.bufferData(gl.ARRAY_BUFFER, vertices, gl.STATIC_DRAW);
    //为片段着色器传入颜色值
    uColor = gl.getUniformLocation(program, "uColor");
    gl.uniform4fv(uColor, [ 0, 0, 0, 1 ]);
    //为着色器传入顶点信息
    aVertexPosition = gl.getAttribLocation(program, "aVertexPosition");
    gl.enableVertexAttribArray(aVertexPosition);
    gl.vertexAttribPointer(aVertexPosition, vertexSetSize, gl.FLOAT, false, 0, 0);
    //绘制三角形
    gl.drawArrays(gl.TRIANGLES, 0, vertexSetCount);

</script>
</body>
</html>