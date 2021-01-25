import { Vector } from '../res/lib/vector.js';

const MaxDistance = 100000000000;
const CONST_k = 1.380658e-23;

let atomMass = 336000;
let epsilon = 0.005;
let sigma = 31;
let sigma2 = Math.pow(sigma, 2);

export function updatePositions(atomList, timeStep) {
    let forces = getForce(atomList);
    setNewPositions(atomList, forces, timeStep);
}

function getForce(atomList) {
    let forces = new Array(atomList.length);
    forces.fill(new Vector(0, 0, 0));

    for (let atom = 0; atom < atomList.length; atom++) {
        for (let target = atom + 1; target < atomList.length; target++) {
            let atomPos = new Vector(dropIsVector(atomList[atom].object.position));
            let targetPos = new Vector(dropIsVector(atomList[target].object.position));

            let distanceV = Vector.sub(targetPos, atomPos);
            let length2 = distanceV.x * distanceV.x + distanceV.y * distanceV.y + distanceV.z * distanceV.z;

            if (length2 < MaxDistance) {
                let forcePotential = (sigma2 / length2) * (sigma2 / length2) * (sigma2 / length2);
                let force = 24 * epsilon * (forcePotential - 2 * forcePotential * forcePotential);
                distanceV = Vector.mul(distanceV, force)

                forces[atom] = Vector.add(forces[atom], distanceV);
                forces[target] = Vector.sub(forces[target], distanceV);
            }
        }
    }
    return forces;
}

function setNewPositions(atomList, forces, timeStep) {
    let invAtomMass = 1 / atomMass;

    let oldPos = new Vector(dropIsVector(atomList[0].object.position));
    for (let atom = 0; atom < atomList.length; atom++) {
        // acceleration
        let acceleration = Vector.mul(forces[atom], invAtomMass);
        // velocity
        atomList[atom].velocity = Vector.add(atomList[atom].velocity, Vector.mul(acceleration, timeStep));

        // positions
        let pos = Vector.mul(atomList[atom].velocity, timeStep);
        atomList[atom].object.position.x += pos.x;
        atomList[atom].object.position.y += pos.y;
        atomList[atom].object.position.z += pos.z;
        // console.log("Neue Position", atom, ": ", pos);
    }
}

export function moveRandom(atomList) {
    atomList.forEach(atom => {
        atom.object.position.x += (Math.random() * 2) - 1;
        atom.object.position.y += (Math.random() * 2) - 1;
        atom.object.position.z += (Math.random() * 2) - 1;
    });
}

function dropIsVector(obj) {
    return {
        x: obj.x,
        y: obj.y,
        z: obj.z
    };
}

function updateParams() {
    atomMass = $('#massInput').val();
    sigma = $('#sigmaInput').val();
    sigma2 = sigma * sigma;
    epsilon = $('#epsilonInput').val();
}

$('#btnSave').click(updateParams);