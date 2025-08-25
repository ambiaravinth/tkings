@extends('layout.main')

@section('title', 'TKINGS-Dashboard')

@section('content')

<body>

    <!-- Header -->
    @include('layout.header')

    <main>
        <div class="infowindow text-center ms-1 me-1 p-3">
            <h1>₹ {{ number_format((float) $total,2,".","") }}</h1>
            <span>Total All Investments</span>
            <div class="row mt-3">
                <div class="col">
                    <h5>₹ {{ number_format((float) $yours,2,".","") }}</h5>
                    <span>Your Contribution</span>
                </div>
                <div class="col">
                    <h5>{{ $rank }}</h5>
                    <span>Your Rank</span>
                </div>
            </div>
        </div>

        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="infowindow p-2">
                    <h6>Top Motivationals Quotes</h6>
                    <div class="carousel slide mb-2" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/2.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/3.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/4.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/5.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/6.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/7.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/8.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <img src="{{ public_url('images/motivations/9.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="infowindow p-2">
                    <h6>Top Motivational Videos</h6>
                    <div class="video-wrapper">
                        <div id="ytplayer"></div>
                        <!-- Controls -->
                        <button class="video-controls prev-btn" onclick="prevVideo()">❮</button>
                        <button class="video-controls next-btn" onclick="nextVideo()">❯</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row ms-1 me-1">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="infowindow ms-1 mt-1 mb-1 p-2">
                    <h6>Your Monthly Investments</h6>
                    <div class="pie-chart" id="chartContainer1" style="width: 99%; height: 400px;"></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="infowindow ms-1 mt-1 mb-1 p-2">
                    <h6>All Investments</h6>
                    <div class="pie-chart" id="chartContainer2" style="width: 99%; height: 400px;"></div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="infowindow ms-1 mt-1 mb-1 p-2">
                    <h6>Statatics</h6>
                    <div class="pie-chart" id="chartContainer3" style="width: 99%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('layout.footer')

    <script>
        // Chart Rendering
        $(document).ready(function() {

            // Chart 1: Monthly
            var monthlydata = <?= $monthlydata ?>;
            var chart1 = new CanvasJS.Chart("chartContainer1", {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 360,
                    yValueFormatString: "₹ 0.00",
                    indexLabel: "{label} {y}",
                    dataPoints: monthlydata
                }]
            });
            chart1.render();

            // Chart 2 User distribution
            const userData1 = <?= $users_amount ?>;

            const commonChartConfig1 = {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "₹ 0.00",
                    indexLabel: "{label} {y}",
                    dataPoints: userData1
                }]
            };


            // Chart 3 User distribution
            const userData2 = <?= $users_parcents ?>;

            const commonChartConfig2 = {
                animationEnabled: true,
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00 \"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: userData2
                }]
            };

            var chart2 = new CanvasJS.Chart("chartContainer2", commonChartConfig1);
            chart2.render();

            var chart3 = new CanvasJS.Chart("chartContainer3", commonChartConfig2);
            chart3.render();
        });




        // =======================
        // YouTube Video Gallery
        // =======================

        const videoIDs = [
            "0-TE7YqAfos",
            "CH6CJiOUOf8",
            "LQK8AJ3sYFM",
            "7YYv30za5dc",
            "PhuMLXO-vV0",
            "IsfiCvNr_Hs",
            "t-89sJ67eQo",
            "jCEd_xPZu0s",
            "rTgbNBNn8t0",
            "5n5s8Ad6MP0",
            "S26AKsF6CBc",
            "oJeYrZKjO6g",
            "9VK1OgR6kJE",
            "v4SXQBpJ5Jg",
            "Sb_1uKcmPic",
            "b9HCTsBOIkk",
            "xtPcdUbIs9M",
            "xsI8qtt80D0",
            "s-Q0gCxh5u4",
            "mapgApTeFJU",
            "_WQrBI1co78",
            "4ZYedrLxgQI",
            "9dTPmZfn_T4",
            "2Z4Dq1_Kpms",
            "ecue04w-mpY",
            "3rxcPF0jNXE",
            "UWBWWKJDYH8",
            "4qTS7fAX9bI",
            "gln81T27lZE",
            "BP24kFikFfg",
            "GtnYgWkZKL0",
            "IPWxPo84-pQ",
            "OH33M3v8qV8",
            "P_htof9fVgI",
            "ShdeIn23N7I",
            "KVy1cyLgpkw",
            "DWNdABiCvdM",
            "plcNWVM88gI",
            "of_-jixY7PQ",
            "XIFxnFAAkmo",
            "okNAfKQB0Rg",
            "FlT34TXX0tc",
            "bDhmK9KRRMg",
            "RNz1wD6S_E0",
            "illVODkhBX8",
            "ZlkFZ57TLcA",
            "WRhlZx-L4fY",
            "RieWv-gXQoc",
            "ShdeIn23N7I",
            "hrjbX_1-tMM",
            "MMBmXztdpc0"
        ];

        // Load the YouTube Iframe API script dynamically
        let player;
        const tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // YouTube API Ready Function (must be global)
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('ytplayer', {
                height: '500',
                width: '100%',
                videoId: videoIDs[Math.floor(Math.random() * videoIDs.length)],
                playerVars: {
                    autoplay: 0,
                    controls: 0,
                    rel: 0,
                    modestbranding: 1, // hide YouTube logo in controls
                    showinfo: 0
                },
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }

        function onPlayerStateChange(event) {
            if (event.data === YT.PlayerState.ENDED) {
                // Load another random video from your list instead of showing suggestions
                const newVideo = videoIDs[Math.floor(Math.random() * videoIDs.length)];
                player.loadVideoById(newVideo);
            }
        }

        // These must be global to be usable in HTML onclick or navigation
        window.changeVideo = function(index) {
            player.loadVideoById(videoIDs[Math.floor(Math.random() * videoIDs.length)]);
        }

        window.nextVideo = function() {
            changeVideo(Math.floor(Math.random() * videoIDs.length));
        }

        window.prevVideo = function() {
            changeVideo(Math.floor(Math.random() * videoIDs.length));
        }

        // Expose API Ready function to global scope
        window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;

    </script>


</body>

@endsection