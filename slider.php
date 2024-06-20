<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Slow Continuous Horizontal Auto Slideshow</title>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .slider-container {
        width: 100%;
        margin: auto;
        overflow: hidden;
        position: relative;
    }

    .slider {
        display: flex;
        animation: slide 20s linear infinite;
    }

    .cardo {
        flex: 0 0 100%;
        max-width: 300px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-right: 20px;
    }

    .cardo img {
        width: 100%;
        height: 170px;
        margin-bottom: 10px;
    }

    @keyframes slide {
        0% {
            transform: translateX(0%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
</style>
</head>
<body>

<div class="slider-container">
    <h2 style="font-weight:bold;">Web Development</h2>
    <div class="slider">
        <div class="cardo">
            <img src="./image/courseimg/reactjs.jpg" alt="Slide 1">
            <h3>React Js</h3>
            
        </div>
        <div class="cardo">
            <img src="./image/courseimg/angularjs.jpg" alt="Slide 2">
            <h3>Angular Js</h3>
          
        </div>
        <div class="cardo">
            <img src="./image/courseimg/asp.jpeg" alt="Slide 3">
            <h3>Asp.Net</h3>
       
        </div>
        <div class="cardo">
            <img src="./image/courseimg/vuejs.jpeg" alt="Slide 4">
            <h3>Vue Js</h3>
           
        </div>
        <div class="cardo">
            <img src="./image/courseimg/nodejs.jpeg" alt="Slide 5">
            <h3>Node Js</h3>
        </div>
        <div class="cardo">
            <img src="./image/courseimg/nextjs.jpeg" alt="Slide 6">
            <h3>Next Js</h3>
        </div>
        <div class="cardo">
            <img src="./image/courseimg/python.jpg" alt="Slide 7">
            <h3>Python</h3>
        </div>
        <div class="cardo">
            <img src="./image/courseimg/html.jpeg" alt="Slide 8">
            <h3>Html</h3>
        </div>
    </div>
</div>

</body>
</html>
