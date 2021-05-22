var CANVAS_WIDTH = 480;
var CANVAS_HEIGHT = 320;
let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
const SPACE_CODE = 32;
const ENTER_CODE = 13;
const CTRL_CODE = 17;
let FPS = 1000 / 60;

let bgImage = new Image;
bgImage.src = "img/bg.png";
let bgImage1 = new Image;
bgImage1.src = "img/bg.png";

let dinoImage = new Image;
dinoImage.src = "img/dinosprite.png";


let obstacleImage = new Image;
obstacleImage.src = "img/cactus.png";

let bg = {
  x: 0,
  y: 0,
  x1: CANVAS_WIDTH,
  speed: 2,
}

let dino = { // объявляем объект дино со свойствами...
  x: 50,
  y: 280,
  w: 40,
  h: 40,
  frames: 2,
  currentFrame: 1,
  jumpHeight: 0,
  speed: 4,
}

let obstacle = { // объявляем объект препятствие со свойствами...
  x: CANVAS_WIDTH,
  y: 285,
  color: "green",
  w: 30,
  h: 35,
  speed: 2,
}

let obstacle2 = {
  x: CANVAS_WIDTH + getRandomIntInclusive(obstacle.x + 150, obstacle.x + 250),
  y: 285,
  color: "green",
  w: 30,
  h: 35,
  speed: 2,
}

let stick = {
  x: dino.x + dino.w,
  y: dino.y + dino.h / 2,
  color: "red",
  speed: bg.speed + 1,
  w: 7,
  h: 2,
}

let score = 0;
let level = 1;
let game = null;

function start() {
  document.addEventListener("keydown", onDocumentKeydown);
  game = setInterval(play, FPS); // получаем контроль над методом сетИнтервал
}

function play() {
  draw();
  update();
}

function draw() {

  ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
  ctx.drawImage(bgImage, bg.x, bg.y, CANVAS_WIDTH, CANVAS_HEIGHT);
  ctx.drawImage(bgImage1, bg.x1, bg.y, CANVAS_WIDTH, CANVAS_HEIGHT);
  ctx.drawImage(dinoImage, 0, dino.h * dino.currentFrame, dino.w, dino.h, dino.x, dino.y, dino.w, dino.h);
  ctx.fillRect(stick.x, stick.y, stick.w, stick.h);
  ctx.drawImage(obstacleImage, obstacle.x, obstacle.y, obstacle.w, obstacle.h);
  ctx.drawImage(obstacleImage, obstacle2.x, obstacle2.y, obstacle2.w, obstacle2.h);
  ctx.textAlign = "left";
  ctx.font = "normal 14pt Verdana";
  ctx.strokeText("Score:", 20, 20, 400);
  ctx.strokeText("Level:", 20, 50, 400);
}

function update() {
  if (dino.jumpHeight > 0) {
    dino.y -= dino.speed;
    dino.jumpHeight -= dino.speed;
  } else if (dino.y + dino.h < CANVAS_HEIGHT) { // если дино в в полете, то опускаемся на землю
    dino.y += dino.speed / 2;
  }
  runDino();
  moveBg();
  changeLevel();
  obstacle.x -= obstacle.speed; // движение препятствия
  obstacle2.x -= obstacle2.speed;

  if (obstacle.x < 0) {
    obstacle.x = CANVAS_WIDTH;
  }
  if (obstacle2.x < 0) {
    obstacle2.x = CANVAS_WIDTH + getRandomIntInclusive(obstacle.x + 150, obstacle.x + 250);
  }
  countScore();
  ctx.textAlign = "left";
  ctx.font = "normal 18pt Verdana";
  ctx.strokeText(score, 120, 20, 400);
  ctx.strokeText(level, 120, 50, 400);

  let dinoHasCollision = dinoHasCollisionWithObstacle();
  if (dinoHasCollision) {
    gameOver();
  }
}

function countScore() {
  if ((dino.x - 18 > obstacle.x + obstacle.w) || (dino.x - 18 > obstacle2.x + obstacle2.w)) { // считаем очки 
    score++;
  }
}

function changeLevel() {
  switch (score) {
    case 5:
      level = 2;
      dino.speed = 5;
      obstacle2.speed = 3;
      obstacle.speed = 3;
      bg.speed = 3;
      break;
    case 10:
      level = 3;
      dino.speed = 5;
      obstacle2.speed = 4;
      obstacle.speed = 4;
      bg.speed = 4;
      break;
    case 15:
      level = 4;
      dino.speed = 6;
      obstacle2.speed = 5;
      obstacle.speed = 5;
      bg.speed = 5;
      break;
  }
}
function throwStick() {
  ctx.fillStyle = stick.color;
  ctx.fillRect(stick.x + stick.speed, stick.y, stick.w, stick.h);

}
function moveBg() {
  bg.x -= bg.speed;
  bg.x1 -= bg.speed;
  if (bg.x + CANVAS_WIDTH < 0) bg.x = CANVAS_WIDTH;
  if (bg.x1 + CANVAS_WIDTH < 0) bg.x1 = CANVAS_WIDTH;
}

function runDino() {
  if (dino.y + dino.h == CANVAS_HEIGHT) {
    if (dino.currentFrame == 1) {
      dino.currentFrame = 2;
    } else {
      dino.currentFrame = 1;
    }
  } else {
    dino.currentFrame = 0;
  }
}

function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
}

function gameOver() {
  ctx.textAlign = "center";
  ctx.font = "24pt Verdana";
  ctx.strokeText("GAME OVER", 220, 100, 400);
  ctx.font = "18pt Verdana";
  ctx.strokeText("Press ENTER to repeat", 220, 130, 400);
  obstacle.x = CANVAS_WIDTH;
  obstacle2.x = CANVAS_WIDTH + 200;
  clearInterval(game); //останавливаем сетИнтервал при столкновении
}

function dinoHasCollisionWithObstacle() {
  let xCollision = (((dino.x + dino.w >= obstacle.x) && (dino.x + dino.w <= obstacle.x + obstacle.w) && (dino.y + dino.h >= obstacle.y) && (dino.y <= obstacle.y + obstacle.h)) || ((dino.x + dino.w >= obstacle2.x) && (dino.x + dino.w <= obstacle2.x + obstacle2.w) && (dino.y + dino.h >= obstacle2.y) && (dino.y <= obstacle2.y + obstacle2.h)));
  return xCollision;
}

function onDocumentKeydown(event) {
  if ((event.keyCode == SPACE_CODE) && (dino.y + dino.h == CANVAS_HEIGHT)) {
    dino.jumpHeight = 80;
  }

  if (event.keyCode == ENTER_CODE) {
    score = 0;
    level = 0;
    start();
  }

  if (event.keyCode == CTRL_CODE) {
    throwStick();
  }
}

start();
