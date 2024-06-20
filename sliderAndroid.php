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
    <h2 style="font-weight:bold;">Mobile Development</h2>
    <div class="slider">
        <div class="cardo">
            <img src="./image/courseimg/reactnative.jpeg" alt="Slide 1">
            <h3>React Native</h3>
            
        </div>
        <div class="cardo">
            <img src="./image/courseimg/kotlin.jpeg" alt="Slide 2">
            <h3>Kotlin</h3>
          
        </div>
        <div class="cardo">
            <img src="./image/courseimg/flutter.png" alt="Slide 3">
            <h3>Flutter</h3>
       
        </div>
        <div class="cardo">
            <img src="./image/courseimg/java.jpg" alt="Slide 4">
            <h3>Java</h3>
           
        </div>
        <div class="cardo">
            <img src="./image/courseimg/swiftui.png" alt="Slide 5">
            <h3>Swift UI</h3>
        </div>
        <div class="cardo">
            <img src="./image/courseimg/ionic.png" alt="Slide 6">
            <h3>Ionic</h3>
        </div>
        <div class="cardo">
            <img src="./image/courseimg/reactnative.jpeg" alt="Slide 7">
            <h3>React Native</h3>
        </div>
        <div class="cardo">
            <img src="./image/courseimg/swiftui.png" alt="Slide 7">
            <h3>Swift UI</h3>
        </div>
    </div>
</div>

</body>
</html>
