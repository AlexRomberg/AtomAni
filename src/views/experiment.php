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
    <script type="module" src="../js/experiment.js" defer></script>
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
                <!-- <div>
                    <h3>Diagramme</h3>
                    <div class="diagramms">
                        <div class="diagramm">
                            <h4>FPS</h4>
                            <div class="chart-container" style="position: relative; width:100%; height: 150px;">
                                <canvas id="fpsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div>
                    <h3>Steuerung</h3>
                    <div class="controlls">
                        <!-- <div class="controll">
                            <h4>Temperatur</h4>
                            <input type="range" class="slider" id="temp" min="-3" max="3" value="0" step="1">
                        </div> -->
                        <div class="controll">
                            <h4>Animation</h4>
                            <span class="row rounded">
                                <button id="btnReset">Reset</button>
                                <button id="btnPlay">Start</button>
                            </span>
                        </div>
                        <div class="controll">
                            <h4>Parameter</h4>
                            <span class="collumn">
                                <span class="explained-input">
                                    <label for="epsilonInput">Epsilon</label>
                                    <input class="number-input" id="epsilonInput" name="epsilonInput" type="number" min="0" value="0.005">
                                </span>
                            <span class="explained-input">
                                    <label for="sigmaInput">Sigma</label>
                                    <input class="number-input" id="sigmaInput" name="sigmaInput" type="number" min="0" value="31">
                                </span>
                            <span class="explained-input">
                                    <label for="massInput">Atom Masse</label>
                                    <input class="number-input" id="massInput" name="massInput" type="number" min="0" value="336000">
                                </span>
                            <button id="btnSave" class="rounded">Speichern</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        ©Alexander, Dario
    </footer>
</body>