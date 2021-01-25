import * as Atoms from './atoms.js';
import * as Simulation from './simulation.js';

// ----------------------------------------------------------------------------
// simulationWindow resizing
// ----------------------------------------------------------------------------
window.addEventListener("resize", handleResize);
handleResize();

function handleResize() {
    let windowWidth = $(".simulationWindow").width();
    if (windowWidth > 850) {
        windowWidth = windowWidth / 3 * 2
        $("#sim").css("height", "500px");
    } else {
        $("#sim").css("height", "400px");
    }
    $("#sim").css("width", windowWidth + "px");
}

// ----------------------------------------------------------------------------
// simulation
// ----------------------------------------------------------------------------
function loadSimulation() {
    let renderInfo = Simulation.init();
    let AtomList = Atoms.generateGrid(4, 4, 4);
    //     [
    //     Atoms.create("ar", 25, 0, 0),
    //     Atoms.create("ne", -25, 0, 0)
    // ]
    Simulation.addAtoms(AtomList, renderInfo.scene);
    Simulation.startRendering(renderInfo);
}

loadSimulation();

$('#btnReset').click(() => {
    Simulation.stop();
    $('#btnPlay').text("Start");
    Simulation.clearAtoms();
    loadSimulation();
});

$('#btnPlay').click(() => {
    if (Simulation.AnimationRunning) {
        Simulation.stop();
        $('#btnPlay').text("Start");
    } else {
        Simulation.start();
        $('#btnPlay').text("Pause");
    }
});