<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $resource->number }} | Check in | Roomac</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                background-color: #50449C;
                height: 100vh;
            }

            #liveTime {
                position: fixed;
                right: 10px;
                bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div id="liveTime" class="text-3xl text-white"></div>

        <div class="flex h-screen">
            <div class="container m-auto px-4">
                <h1 id="number" class="text-6xl text-white pt-4 pb-4">{{ $resource->number }}</h1>

                <h2 id="username" class="text-4xl text-white pt-4 pb-4"></h2>

                <h2 id="timeString" class="text-4xl text-white pt-4 pb-4">{{ $timeString }}</h2>
    
                <button id="checkinButton" type="button" onclick="onCheckInClick()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-8 py-3 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Check-in
                </button>
            </div>
        </div>

        <div id="model" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
                    Background overlay, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div id="backgroundOverlay" class="opacity-0 fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <!--
                    Modal panel, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div id="modelPanel" class="opacity-0 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-black">
                        <div id="loadingMessage" hidden="">⌛ Loading video...</div>
                        <canvas id="canvas" class="w-full my-auto" height="480" width="640"></canvas>
                    </div>
                    <div class="bg-gray-50 px-4 py-3">
                        <div id="output">
                            Scanning QR code...
                            <div id="outputMessage">No QR code detected.</div>
                            <div hidden=""><b>Data:</b> <span id="outputData">http://en.m.wikipedia.org</span></div>
                        </div>

                        <button type="button" onclick="onCancelClick()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel (<span id="cancelCountDown"></span>)
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="model2" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!--
                    Background overlay, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div id="backgroundOverlay2" class="opacity-0 fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
            
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <!--
                    Modal panel, show/hide based on modal state.
            
                    Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div id="modelPanel2" class="opacity-0 inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-gray-50 px-4 py-3">
                        <div>
                            Invalid Check-in QR code...
                        </div>

                        <button type="button" onclick="hideErrorModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jsqr@1.3.1/dist/jsQR.min.js"></script>
        <script>
            // Resource
            var resource = {!! json_encode($resource, JSON_UNESCAPED_SLASHES) !!}
            var number = document.getElementById("number");
            var username = document.getElementById("username");
            var timeString = document.getElementById("timeString");
            var checkinButton = document.getElementById("checkinButton");

            // UI
            var cancelCount = 20, cancelCountDown = document.getElementById("cancelCountDown");
            var model = document.getElementById("model");
            var backgroundOverlay = document.getElementById("backgroundOverlay");
            var modelPanel = document.getElementById("modelPanel");
            var liveTime = document.getElementById("liveTime");

            var model2 = document.getElementById("model2");
            var backgroundOverlay2 = document.getElementById("backgroundOverlay2");
            var modelPanel2 = document.getElementById("modelPanel2");

            var video = document.createElement("video");
            var canvasElement = document.getElementById("canvas");
            var canvas = canvasElement.getContext("2d");
            var loadingMessage = document.getElementById("loadingMessage");
            var outputContainer = document.getElementById("output");
            var outputMessage = document.getElementById("outputMessage");
            var outputData = document.getElementById("outputData");

            $(model).hide();
            $(model2).hide();

            function showErrorModal() {
                $(model2).show();
                $(backgroundOverlay2).removeClass("opacity-0");
                $(backgroundOverlay2).addClass("ease-out duration-300 opacity-100");
                $(modelPanel2).removeClass("opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95");
                $(modelPanel2).addClass("ease-out duration-300 opacity-100 translate-y-0 sm:scale-100");
            }

            function hideErrorModal() {
                $(backgroundOverlay2).removeClass("opacity-100");
                $(backgroundOverlay2).addClass("ease-in duration-200 opacity-0");
                $(modelPanel2).removeClass("opacity-100 translate-y-0 sm:scale-100");
                $(modelPanel2).addClass("ease-in duration-200 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95");
                setTimeout(() => $(model2).hide(), 200);
            }

            function onCheckInClick() {
                $(model).show();
                $(backgroundOverlay).removeClass("opacity-0");
                $(backgroundOverlay).addClass("ease-out duration-300 opacity-100"); 

                // Use facingMode: environment to attemt to get the front camera on phones
                navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
                    video.srcObject = stream;
                    video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
                    video.play();
                    requestAnimationFrame(tick);

                    cancelCount = 20;
                    reduceCancelCount();

                    $(modelPanel).removeClass("opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95");
                    $(modelPanel).addClass("ease-out duration-300 opacity-100 translate-y-0 sm:scale-100");
                });
            }

            function onCancelClick() {
                $(backgroundOverlay).removeClass("opacity-100");
                $(backgroundOverlay).addClass("ease-in duration-200 opacity-0");
                $(modelPanel).removeClass("opacity-100 translate-y-0 sm:scale-100");
                $(modelPanel).addClass("ease-in duration-200 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95");
                setTimeout(() => $(model).hide(), 200);

                video.srcObject?.getTracks().forEach(function(track) {
                    if (track.readyState == 'live' && track.kind === 'video') {
                        track.stop();
                    }
                });

                video.srcObject = null;
            }

            function reduceCancelCount() {
                if (cancelCount > 0) {
                    $(cancelCountDown).text(--cancelCount);
                    setTimeout(() => reduceCancelCount(), 1000);
                } else {
                    onCancelClick();
                }
            }
        
            function drawLine(begin, end, color) {
                canvas.beginPath();
                canvas.moveTo(begin.x, begin.y);
                canvas.lineTo(end.x, end.y);
                canvas.lineWidth = 4;
                canvas.strokeStyle = color;
                canvas.stroke();
            }
            
            function tick() {
                loadingMessage.innerText = "⌛ Loading video..."
                if (video.readyState === video.HAVE_ENOUGH_DATA) {
                    loadingMessage.hidden = true;
                    canvasElement.hidden = false;
                    outputContainer.hidden = false;
            
                    canvasElement.height = video.videoHeight;
                    canvasElement.width = video.videoWidth;
                    canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
                    var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);

                    var code = jsQR(imageData.data, imageData.width, imageData.height, {
                        inversionAttempts: "dontInvert",
                    });

                    if (code) {
                        drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
                        drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
                        drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
                        drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
                        //outputMessage.hidden = true;
                        //outputData.parentElement.hidden = false;
                        //outputData.innerText = code.data;
                        checkin(code.data);
                        //onCancelClick();

                    } else {
                        //outputMessage.hidden = false;
                        //outputData.parentElement.hidden = true;
                    }
                }

                if (video.srcObject != null) {
                    requestAnimationFrame(tick);
                }
            }

            var updateResource = function() {
                $.ajax({
                    url: "/api/checkin/{{ $resource->id }}/refresh", // {{ route('resources.bookings.index', $resource->id) }}
                    type: 'GET',
                    cache: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log(data)
                        $(number).text(data.resource.number);
                        $(username).text(data.booking?.user?.name ?? '');
                        $(timeString).text(data.timeString);
                        $(checkinButton).text(data.booking?.checkin_time !== null ? 'Checked-in (' + data.booking?.checkin_time + ')' : 'Check-in');
                        $(checkinButton).prop('disabled', data.booking?.checkin_time !== null);

                        resource = data;
                        //console.log(resource);
                        setTimeout(() => updateResource(), 1000);
                    },
                    error: function(data) {
                        console.log(data);
                        setTimeout(() => updateResource(), 1000);
                    }
                });
            }

            updateResource();

            var checkin = function(code) {
                console.log(code)

                $(modelPanel).removeClass("opacity-100 translate-y-0 sm:scale-100");
                $(modelPanel).addClass("ease-in duration-200 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95");

                video.srcObject?.getTracks().forEach(function(track) {
                    if (track.readyState == 'live' && track.kind === 'video') {
                        track.stop();
                    }
                });

                video.srcObject = null;

                $.ajax({
                    url: "/api/resources/{{ $resource->id }}/checkin",
                    type: 'POST',
                    data: {
                        'code': code,
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        console.log('ok');
                        $(backgroundOverlay).removeClass("opacity-100");
                        $(backgroundOverlay).addClass("ease-in duration-200 opacity-0");
                        setTimeout(() => $(model).hide(), 200);
                    },
                    error: function(data) {
                        console.log('error');
                        console.log(data)
                        $(backgroundOverlay).removeClass("opacity-100");
                        $(backgroundOverlay).addClass("ease-in duration-200 opacity-0");
                        setTimeout(() => {
                            $(model).hide()
                            showErrorModal()
                        }, 200);
                    }
                });
            }

            // Update liveTime
            setInterval(() => $(liveTime).text((new Date()).toLocaleTimeString('en-US', { hour12: false })), 500);
            
        </script>
    </body>
</html>