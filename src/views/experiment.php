<!DOCTYPE html>
<!--
Copyright (c) 2020 Alexander Romberg, Dario Romandini
-->

<head>
    <title>AtomAni</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/experiment.css">

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/src/res/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/src/res/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/src/res/favicon/favicon-16x16.png">
    <link rel="manifest" href="/src/res/favicon/site.webmanifest">
    <link rel="mask-icon" href="/src/res/favicon/safari-pinned-tab.svg" color="#0002ff">
    <link rel="shortcut icon" href="/src/res/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="AtomAni">
    <meta name="application-name" content="AtomAni">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-config" content="/src/res/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <!-- scripts -->
    <script src="../res/lib/jquery.min.js"></script>
    <script src="../res/lib/Chart.bundle.min.js"></script>
</head>

<body>
    <header>
        <a href="../../index.php"><img src="../res/logo.svg" alt="AtomAni-Logo"></a>
    </header>
    <main>
        <h1>Simulation</h1>
        <div class="simulationWindow">
            <div class="simulation">
                <!-- Simulation -->
                <canvas id="sim"></canvas>
            </div>
            <div class="controlPane">
                <!-- Controls -->
                <div>
                    <h3>Diagramme</h3>
                    <div class="diagramms">
                    </div>
                </div>
                <div>
                    <h3>Steuerung</h3>
                    <div class="controlls">
                        <div class="controll">
                            <h4>Temperatur</h4>
                            <input type="range" class="slider" id="temp" min="0.997" max="1.003" value="1" step="0.001">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        ©Alexander, Dario
    </footer>
    <script type="module">
        import * as Experiment from '../js/experiment.js';
        let simulationScript = {
            charts: [{
                    id: 'fps',
                    title: 'FPS',
                    fillColor: 'rgba(170,0,0,0.4)',
                    lineColor: 'rgba(200,0,0,1)'
                },
                {
                    id: 'avgVel',
                    title: 'Geschwindigkeit',
                    fillColor: 'rgba(0,0,170,0.4)',
                    lineColor: 'rgba(0,0,200,1)'
                }
            ],
            atoms: [{
                    type: 'grid',
                    x: -60,
                    y: -60,
                    z: -60,
                    width: 5,
                    height: 5,
                    depth: 5,
                    atomType: "ne"
                },
                {
                    type: 'single',
                    x: 200,
                    y: 200,
                    z: 200,
                    atomType: "ar"
                }
            ],
            walls: [{
                x: -300,
                y: -300,
                z: -300,
                width: 600,
                height: 600,
                depth: 600
            }]
        };
        Experiment.initSimulation(simulationScript);
    </script>
</body>