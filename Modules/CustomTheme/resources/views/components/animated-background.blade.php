<div
    x-show="show"
    x-data="{ show: false }"
    x-init="setTimeout(() =&gt; show = true, 50)"
    x-transition.opacity.duration.1000ms=""
    class="pointer-events-none absolute top-0 right-0 left-0 z-5"
>
    <div
        id="gradient"
        class="aspect-[9/16] w-full sm:aspect-video"
        data-url="https://www.shadergradient.co/customize?animate=on&amp;axesHelper=on&amp;bgColor1=%2300da00&amp;bgColor2=%23c90000&amp;brightness=0.4&amp;cAzimuthAngle=180&amp;cDistance=2.5&amp;cPolarAngle=115&amp;cameraZoom=1&amp;color1=%23B21E4E&amp;color2=%23015389&amp;color3=%23E0614E&amp;destination=onCanvas&amp;embedMode=off&amp;envPreset=city&amp;format=gif&amp;fov=50&amp;frameRate=10&amp;grain=off&amp;lightType=3d&amp;pixelDensity=1.5&amp;positionX=-1.5&amp;positionY=0.1&amp;positionZ=0&amp;range=disabled&amp;rangeEnd=40&amp;rangeStart=0&amp;reflection=0.2&amp;rotationX=0&amp;rotationY=0&amp;rotationZ=235&amp;shader=defaults&amp;type=waterPlane&amp;uAmplitude=0&amp;uDensity=1.2&amp;uFrequency=5.5&amp;uSpeed=0.05&amp;uStrength=3&amp;uTime=0.2&amp;wireframe=false"
    >
        <div
            style="
                position: relative;
                width: 100%;
                height: 100%;
                overflow: hidden;
            "
        >
            <div style="width: 100%; height: 100%">
                <canvas
                    style="
                        display: block;
                        width: 2560px;
                        height: 1440px;
                        touch-action: none;
                        user-select: none;
                    "
                    data-engine="three.js r150"
                    width="2560"
                    height="1440"
                    data-camera-controls-version="2.9.0"
                ></canvas>
            </div>
        </div>
    </div>
    <div
        class="to-oss-black absolute inset-0 z-10 aspect-video h-full w-full bg-gradient-to-b from-transparent"
    ></div>
</div>
