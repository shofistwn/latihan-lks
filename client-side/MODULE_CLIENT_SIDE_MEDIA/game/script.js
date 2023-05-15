const virus1 = document.getElementById("virus1");
const virus2 = document.getElementById("virus2");
const virus3 = document.getElementById("virus3");
const virus4 = document.getElementById("virus4");
const virus = [virus1, virus2, virus3, virus4];

const bullet1 = document.getElementById("bullet1");
const bullet2 = document.getElementById("bullet2");
const bullet3 = document.getElementById("bullet3");
const bullet4 = document.getElementById("bullet4");
var posBullet = 897;
var positionBullet1 = posBullet;
var positionBullet2 = posBullet;
var positionBullet3 = posBullet;
var positionBullet4 = posBullet;
var positionBullet = [
  positionBullet1,
  positionBullet2,
  positionBullet3,
  positionBullet4,
];
var intervalBullet1 = null;
var intervalBullet2 = null;
var intervalBullet3 = null;
var intervalBullet4 = null;

const maxHeightVirus = 1024;
const maxHeightBullet = 0;
const delayVirus = 10;
const delayBullet = 1;
var virusPosition = 0;
var intervalVirus = null;
var randomVirus = Math.floor(Math.random() * virus.length);

var score = document.getElementById("score");
var countScore = 0;
var fail = document.getElementById("fail");
var countFail = 0;

function start() {
  intervalVirus = setInterval(() => {
    virusPosition++;
    moveVirus(randomVirus, virusPosition);
  }, delayVirus);
}

function moveVirus(virusId, position) {
  virus[virusId].style.top = `${position}px`;

  document.addEventListener(
    "keydown",
    (event) => {
      const key = event.key;
      if (key === "d") {
        clearInterval(intervalBullet1);
        positionBullet1 = 897;
        bullet1.style.display = "block";
        intervalBullet1 = setInterval(() => {
          positionBullet1--;
          moveBullet1(positionBullet1);
        }, delayBullet);
      }
      if (key === "f") {
        clearInterval(intervalBullet2);
        positionBullet2 = 897;
        bullet2.style.display = "block";
        intervalBullet2 = setInterval(() => {
          positionBullet2--;
          moveBullet2(positionBullet2);
        }, delayBullet);
      }
      if (key === "j") {
        clearInterval(intervalBullet3);
        positionBullet3 = 897;
        bullet3.style.display = "block";
        intervalBullet3 = setInterval(() => {
          positionBullet3--;
          moveBullet3(positionBullet3);
        }, delayBullet);
      }
      if (key === "k") {
        clearInterval(intervalBullet4);
        positionBullet4 = 897;
        bullet4.style.display = "block";
        intervalBullet4 = setInterval(() => {
          positionBullet4--;
          moveBullet4(positionBullet4);
        }, delayBullet);
      }
    },
    false
  );

  var isDestroy = checkDestroy(virusId, virusPosition, positionBullet1);
  if (isDestroy) {
    clearInterval(intervalBullet1);
  }
}

function moveBullet1(yBullet1) {
  bullet1.style.top = `${yBullet1}px`;
}

function moveBullet2(yBullet2) {
  bullet2.style.top = `${yBullet2}px`;
}

function moveBullet3(yBullet3) {
  bullet3.style.top = `${yBullet3}px`;
}

function moveBullet4(yBullet4) {
  bullet4.style.top = `${yBullet4}px`;
}

function checkDestroy(id, virusPos, bullet) {
  if (virusPos - bullet >= maxHeightBullet) {
    virus[id].style.top = 0;
    bullet1.style.top = `${posBullet}px`;
    bullet1.style.display = "none";
    countScore++;
    score.innerText = `Score: ${countScore}`;
    randomVirus = Math.floor(Math.random() * virus.length);
    return;
  }
}

start()
function run() {
  setTimeout(() => {
    start();
  }, 3000);
}
