const bullet1 = document.getElementById("bullet1");
const bullet2 = document.getElementById("bullet2");
const bullet3 = document.getElementById("bullet3");
const bullet4 = document.getElementById("bullet4");
var speedBullet1 = 0;
var speedBullet2 = 0;
var speedBullet3 = 0;
var speedBullet4 = 0;
var intervalBullet1 = null;
var intervalBullet2 = null;
var intervalBullet3 = null;
var intervalBullet4 = null;
const delay = 10;
const maxHeight = 100;

const virus1 = document.getElementById("virus1");
const virus2 = document.getElementById("virus2");
const virus3 = document.getElementById("virus3");
const virus4 = document.getElementById("virus4");
const virus = [virus1, virus2, virus3, virus4];
var speedVirus = 0;
const startPositionVirus = "-10%";
var intervalVirus = null;

const score = document.getElementById("score");
const fail = document.getElementById("fail");
var countScore = 0;
var countFail = 0;

// Add event listener on keydown
document.addEventListener(
  "keydown",
  (event) => {
    var name = event.key;

    // if user pressed esc
    if (name === "Escape") {
      openModal();
    }

    // if user pressed d
    if (name === "d") {
      speedBullet1 = 0;
      clearInterval(intervalBullet1);
      intervalBullet1 = setInterval(moveBullet1, delay);
    }

    // // if user pressed f
    if (name === "f") {
      speedBullet2 = 0;
      clearInterval(intervalBullet2);
      intervalBullet2 = setInterval(moveBullet2, delay);
    }

    // if user pressed j
    if (name === "j") {
      speedBullet3 = 0;
      clearInterval(intervalBullet3);
      intervalBullet3 = setInterval(moveBullet3, delay);
    }
    // if user pressed k
    if (name === "k") {
      speedBullet4 = 0;
      clearInterval(intervalBullet4);
      intervalBullet4 = setInterval(moveBullet4, delay);
    }
  },
  false
);

var randomVirus = 0;
intervalVirus = setInterval(() => {
  if (speedVirus == 0) {
    randomVirus = Math.floor(Math.random() * virus.length);
  }
  start(randomVirus);
}, 100);

function restartGame() {
  stopGame();
  intervalVirus = setInterval(() => {
    if (speedVirus == 0) {
      randomVirus = Math.floor(Math.random() * virus.length);
    }
    start(randomVirus);
  }, 100);
}

function start() {
  moveVirus();
}

function moveVirus() {
  speedVirus++;
  virus[randomVirus].style.top = speedVirus + "%";
  checkScore();
  if (speedVirus >= maxHeight - 30) {
    virus[randomVirus].style.top = startPositionVirus;
    checkFail();
    speedVirus = 0;
  }
}

function checkScore() {
  if (speedVirus + speedBullet1 - 100 > 0) {
    bullet1.style.bottom = 0;
    virus[randomVirus].style.top = startPositionVirus;
    speedVirus = 0;
    randomVirus = Math.floor(Math.random() * virus.length);
    countScore++;
  }
  if (speedVirus + speedBullet2 - 100 > 0) {
    bullet2.style.bottom = 0;
    virus[randomVirus].style.top = startPositionVirus;
    speedVirus = 0;
    randomVirus = Math.floor(Math.random() * virus.length);
    countScore++;
  }
  if (speedVirus + speedBullet3 - 100 > 0) {
    bullet3.style.bottom = 0;
    virus[randomVirus].style.top = startPositionVirus;
    speedVirus = 0;
    randomVirus = Math.floor(Math.random() * virus.length);
    countScore++;
  }
  if (speedVirus + speedBullet4 - 100 > 0) {
    bullet4.style.bottom = 0;
    virus[randomVirus].style.top = startPositionVirus;
    speedVirus = 0;
    randomVirus = Math.floor(Math.random() * virus.length);
    countScore++;
  }
  score.innerText = `Score: ${countScore}`;
}

function checkFail(speedVirus) {
  // if (speedVirus >= maxHeight - 10) {
  countFail++;
  // }
  fail.innerText = `Fail: ${countFail}`;
}

function moveBullet1() {
  speedBullet1++;
  bullet1.style.bottom = speedBullet1 + "%";
  if (speedBullet1 >= maxHeight - 10) {
    speedBullet1 = 0;
    clearInterval(intervalBullet1);
    bullet1.style.bottom = 0;
  }
}

function moveBullet2() {
  speedBullet2++;
  bullet2.style.bottom = speedBullet2 + "%";
  if (speedBullet2 >= maxHeight) {
    speedBullet2 = 0;
    clearInterval(intervalBullet2);
    bullet2.style.bottom = 0;
  }
}

function moveBullet3() {
  speedBullet3++;
  bullet3.style.bottom = speedBullet3 + "%";
  if (speedBullet3 >= maxHeight) {
    speedBullet3 = 0;
    clearInterval(intervalBullet3);
    bullet3.style.bottom = 0;
  }
}

function moveBullet4() {
  speedBullet4++;
  bullet4.style.bottom = speedBullet4 + "%";
  if (speedBullet4 >= maxHeight) {
    speedBullet4 = 0;
    clearInterval(intervalBullet4);
    bullet4.style.bottom = 0;
    speedBullet4++;
  }
}

function stopGame() {
  clearInterval(intervalVirus);
  clearInterval(intervalBullet1);
  clearInterval(intervalBullet2);
  clearInterval(intervalBullet3);
  clearInterval(intervalBullet4);
  virus1.style.top = startPositionVirus;
  virus2.style.top = startPositionVirus;
  virus3.style.top = startPositionVirus;
  virus4.style.top = startPositionVirus;
  bullet1.style.bottom = 0;
  bullet2.style.bottom = 0;
  bullet3.style.bottom = 0;
  bullet4.style.bottom = 0;
  closeModal();
}

var modal = document.getElementById("pausedModal");

function openModal() {
  clearInterval(intervalBullet1);
  clearInterval(intervalBullet2);
  clearInterval(intervalBullet3);
  clearInterval(intervalBullet4);
  modal.style.display = "block";
}

function closeModal() {
  modal.style.display = "none";
}

var player = document.getElementById("player");
function closeStartModal() {
  var playerName = document.getElementById("playerName").value;
  player.innerText = `Player: ${playerName}`;
  document.getElementById("startModal").style.display = "none";
}

function continueGame() {
  
}