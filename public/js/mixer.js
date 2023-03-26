var canvas = null;
var ctx = null;
var fps = 1 / 60; //60 FPS
var dt = fps * 1000; //ms
var timer = false;
var Cd = 0.47;
var rho = 1.22; //kg/m^3
var mouse = { x: 0, y: 0, isDown: false };
var ag = 9.81; //m/s^2 acceleration due to gravity on earth = 9.81 m/s^2.
var width = 0;
var height = 0;
var balls = [];
var img = new Image();
var rgbList = [];
var sumColor = 0;
var darkerRgbColor = 0;
var timer = 0;
var mixAnimationBool = false;

// gives a reference to the canvas and starts the canvas animation. If Ingredients exists in the sessionStorage load it
var setup = function () {
    canvas = document.getElementById("myCanvas");
    ctx = canvas.getContext("2d");
    width = canvas.width;
    height = canvas.height;
    timer = setInterval(loop, dt);
    if (JSON.parse(sessionStorage.getItem("ingredientsArray"))) {
        balls = JSON.parse(sessionStorage.getItem("ingredientsArray"));
    }
};

// check that all the ingredients for the composition have been selected.
function checkResult() {
    const ingredienteContentSum = ingredienteContent.reduce(
        (sum, ingredient) => sum + ingredient.qty, 0
    );
    // When all are selected, start the mixer animation
    if (ingredienteContentSum == bottle.amount && liquidContent.length == 1) {
        mixAnimation(bottle.amount);
    } else {
        var errorMessage = "";
        if (ingredienteContentSum !== bottle.amount) {
            const missingIngredients = bottle.amount - ingredienteContentSum;
            errorMessage = `Füge noch ${missingIngredients} Zutaten hinzu, um deine Zusammenstellung abzuschließen. `;
        }
        if (liquidContent.length == 0) {
            errorMessage = errorMessage + "Beachte, dass eine Flüssigkeit ausgewühlt sein muss!";
        }
        showAlertError("Nicht genug Zutaten ausgewählt!", errorMessage);
    }
}
// for each ingredient added, 3 "balls" are created on whose position the ingredient images are drawn. If an ingredient is removed, the associated 3 balls must also be removed
function removeMixerSpecificOne(image) {
    var count = 0;
    for (var i = 0; i < balls.length; i++) {
        if (balls[i].img === "../images/piece/" + image) {
            balls.splice(i, 1);
            count++;
            i--;
            if (count === 3) {
                break;
            }
        }
    }
    sessionStorage.setItem("ingredientsArray", JSON.stringify(balls));
}
// if an entire ingredient type is removed, all balls of that ingredient must be removed
function removeSpecificAll(img) {
    balls = balls.filter(function (ball) {
        return ball.img !== "../images/piece/" + img;
    });
    sessionStorage.setItem("ingredientsArray", JSON.stringify(balls));
}
// when all ingredients are removed, all balls must also be removed from the mixer
function removeAll() {
    clearLiquid();
    balls = [];
    sessionStorage.setItem("ingredientsArray", JSON.stringify(balls));
}
// object-instance representing an ingredient
function Ball(x, y, radius, e, mass, image) {
    this.position = { x: x, y: y }; //m
    this.velocity = { x: 0, y: 0 }; // m/s
    this.e = -e; // has no units
    this.mass = mass; //kg
    this.radius = radius; //m
    this.area = (Math.PI * radius * radius) / 100; //m^2
    this.img = "../images/piece/" + image;
    this.rotation = 0;
    this.rotationDegree =
        ((Math.floor(Math.random() * 11) - 5) * Math.PI) / 270;
}

// creates an instance of an ingredient
function setImg(image, count) {
    for (let i = 0; i < count * 2; i++) {
        balls.push(
            new Ball(Math.random() * (265 - 0) + 0, 50, 14, 0.7, 10, image)
        );
    }
    sessionStorage.setItem("ingredientsArray", JSON.stringify(balls));
}

// draws the list of ingredients in the canvas, calculates its position and checks for collision
function loop() {
    //create constants
    const gravity = 0.7;
    const density = 1;
    const drag = 1;
    //Clear window at the beginning of every frame
    ctx.clearRect(0, 0, width, height);
    for (let i = 0; i < balls.length; i++) {
        //physics - calculating the aerodynamic forces to drag
        let fx =
            -0.5 *
                drag *
                density *
                balls[i].area *
                balls[i].velocity.x *
                balls[i].velocity.x *
                (balls[i].velocity.x / Math.abs(balls[i].velocity.x)) || 0;
        let fy =
            -0.5 *
                drag *
                density *
                balls[i].area *
                balls[i].velocity.y *
                balls[i].velocity.y *
                (balls[i].velocity.y / Math.abs(balls[i].velocity.y)) || 0;

        //Calculating the acceleration of the ball
        let ax = fx / balls[i].mass;
        let ay = ag * gravity + fy / balls[i].mass;

        //Calculating the ball velocity
        balls[i].velocity.x += ax * fps;
        balls[i].velocity.y += ay * fps;

        //Calculating the position of the ball
        balls[i].position.x += balls[i].velocity.x * fps * 100;
        balls[i].position.y += balls[i].velocity.y * fps * 100;

        const img = new Image();
        img.src = balls[i].img;
        ctx.beginPath();

        var angleInRadians = balls[i].rotation;
        var ballX = balls[i].position.x - balls[i].radius * 1.3;
        var ballY = balls[i].position.y - balls[i].radius * 1.3;
        var ballRadius = balls[i].radius;

        ctx.translate(ballX + ballRadius, ballY + ballRadius);

        ctx.rotate(angleInRadians);

        // draws the rotation of mix animation
        if (mixAnimationBool) {
            balls[i].rotation = angleInRadians + 0.5;
        }
        if (balls[i].velocity.y > 2) {
            balls[i].rotation = angleInRadians - balls[i].rotationDegree;
        }

        ctx.drawImage(img, -ballRadius, -ballRadius, 40, 40);

        ctx.rotate(-angleInRadians);
        ctx.translate(-(ballX + ballRadius), -(ballY + ballRadius));

        //this.ctx.arc(this.balls[i].position.x, this.balls[i].position.y, this.balls[i].radius, 0, 2 * Math.PI, true);
        //this.ctx.fill();
        ctx.closePath();

        //Handling the ball collisions
        collisionBall(balls[i]);
        collisionWall(balls[i]);

    }
}
// calculates the ball positions at wall collision
function collisionWall(ball) {
    if (ball.position.x > width - ball.radius) {
        ball.velocity.x *= ball.e;
        ball.position.x = width - ball.radius;
    }
    if (ball.position.y > height - ball.radius) {
        ball.velocity.y *= ball.e;
        ball.position.y = height - ball.radius;
    }
    if (ball.position.x < ball.radius) {
        ball.velocity.x *= ball.e;
        ball.position.x = ball.radius;
    }
    if (ball.position.y < ball.radius) {
        ball.velocity.y *= ball.e;
        ball.position.y = ball.radius;
    }
}
// calculates the ball positions in mutual ball collisions
function collisionBall(b1) {
    for (var i = 0; i < balls.length; i++) {
        var b2 = balls[i];
        if (b1.position.x != b2.position.x && b1.position.y != b2.position.y) {
            if (
                b1.position.x + b1.radius + b2.radius > b2.position.x &&
                b1.position.x < b2.position.x + b1.radius + b2.radius &&
                b1.position.y + b1.radius + b2.radius > b2.position.y &&
                b1.position.y < b2.position.y + b1.radius + b2.radius
            ) {
                var distX = b1.position.x - b2.position.x;
                var distY = b1.position.y - b2.position.y;
                var d = Math.sqrt(distX * distX + distY * distY);
                 //checking circle vs circle collision
                if (d < b1.radius + b2.radius) {
                    var nx = (b2.position.x - b1.position.x) / d;
                    var ny = (b2.position.y - b1.position.y) / d;
                    var p =
                        (2 *
                            (b1.velocity.x * nx +
                                b1.velocity.y * ny -
                                b2.velocity.x * nx -
                                b2.velocity.y * ny)) /
                        (b1.mass + b2.mass);

                    // calulating the point of collision
                    var colPointX =
                        (b1.position.x * b2.radius +
                            b2.position.x * b1.radius) /
                        (b1.radius + b2.radius);
                    var colPointY =
                        (b1.position.y * b2.radius +
                            b2.position.y * b1.radius) /
                        (b1.radius + b2.radius);

                    //stop overlap
                    b1.position.x =
                        colPointX +
                        (b1.radius * (b1.position.x - b2.position.x)) / d;
                    b1.position.y =
                        colPointY +
                        (b1.radius * (b1.position.y - b2.position.y)) / d;
                    b2.position.x =
                        colPointX +
                        (b2.radius * (b2.position.x - b1.position.x)) / d;
                    b2.position.y =
                        colPointY +
                        (b2.radius * (b2.position.y - b1.position.y)) / d;

                    //updating velocity 
                    b1.velocity.x -= p * b1.mass * nx;
                    b1.velocity.y -= p * b1.mass * ny;
                    b2.velocity.x += p * b2.mass * nx;
                    b2.velocity.y += p * b2.mass * ny;
                }
            }
        }
    }
}

// saves all the main colors of the ingredient images to get the mixed color from it
function getRGBList() {
    rgbList = [];
    Promise.all(
        balls.map((ball) => {
            return new Promise((resolve) => {
                const img = new Image();
                img.crossOrigin = "Anonymous";
                img.src = ball.img;
                img.onload = () => {
                    const color = getMaxColor(img);
                    rgbList.push(color);
                    resolve(color);
                };
            });
        })
    ).then(() => {
        sumColor = getSumColor();
    });
}
// calculates the most common color pixels of the ingredient image
function getMaxColor(img) {
    const canvas = document.createElement("canvas");
    const context = canvas.getContext("2d");
    context.drawImage(img, 0, 0);
    const imageData = context.getImageData(0, 0, img.width, img.height);
    const pixels = imageData.data;
    const colorCounts = {};
    for (let i = 0; i < pixels.length; i += 4) {
        const r = pixels[i];
        const g = pixels[i + 1];
        const b = pixels[i + 2];

        // Check if the color is not black
        if (r + g + b > 0) {
            const rgb = `${r},${g},${b}`;
            if (rgb in colorCounts) {
                colorCounts[rgb] += 1;
            } else {
                colorCounts[rgb] = 1;
            }
        }
    }
    const maxCount = Math.max(...Object.values(colorCounts));
    const maxColor = Object.keys(colorCounts).find(
        (key) => colorCounts[key] === maxCount
    );
    return maxColor;
}
// the juiceAnimation is just a subtle back and forth motion to represent a liquid 
function juice() {
    const tl = gsap.timeline();
    tl.play();
    tl.to("#innerImage", { duration: 1, rotate: -1 })
        .to("#innerImage", { duration: 4, rotate: 1 })
        .to("#innerImage", { duration: 1, rotate: 0 })
        .repeat(-1);
}

// the mix animation is triggered as soon as the ingredients are complete and "buy" is clicked. The mixanimation is introduced in the CanvasAnimation by the mixAnimationBool. 
// In addition to the juice animation, a mixer shake animation is initiated
function mixAnimation(amount) {
    mixAnimationBool = true;
    const tl = gsap.timeline();

    juiceAnimation(amount);

    // mixer shake animation
    tl.play();
    tl.to(".containerMixer", { duration: 0.1, rotate: -1 })
        .to(".containerMixer", { duration: 0.1, rotate: 1 })
        .repeat(30)
        .eventCallback("onComplete", () => {
            gsap.to(".containerMixer", { duration: 0, rotate: 0 });
            juice();
            showAlertSuccess("Vielen Dank für deine Zusammenstellung!", "Klicke auf weiter um wieder zur Startseite zu gelangen!");
        });
}

// the juice animation gets the calculated total color of all ingredients and paints the svg. The SVG is faded into the mixer during animation
function juiceAnimation(amount) {
    const amountInPercent = 87 - 2.6 * amount;
    getRGBList();
    const svg = document.getElementById("innerImage");
    const svgDoc = svg.contentDocument;
    const paths = svgDoc.getElementsByTagName("path");
    setTimeout(() => {
        svg.style.backgroundColor = sumColor;
        const rgbArray = sumColor.slice(4, -1).split(",").map(Number);
        const darkerRgbArray = rgbArray.map((val) => Math.round(val * 0.6));
        darkerRgbColor = `rgb(${darkerRgbArray.join(",")})`;
        for (let i = 0; i < paths.length; i++) {
            paths[i].style.fill = darkerRgbColor;
        }
        gsap.fromTo(
            "#innerImage",
            { opacity: 1, y: "100%", transformOrigin: "bottom center" },
            {
                duration: 10,
                opacity: 1,
                y: amountInPercent + "%",
                ease: "power3.out",
            }
        );
    }, 300);
}

// almost identical to the juice animation, only here the selected liquid is animated
function liquidAnimation(image) {
    const img = new Image();
    img.crossOrigin = "Anonymous";
    img.src = "../images/piece/" + image;
    img.onload = () => {
        const svg = document.getElementById("liquidImage");
        let color = getMaxColor(img);
        const rgb = color.split(",").map(Number);
        svg.style.backgroundColor =
            "rgb(" + rgb[0] + "," + rgb[1] + "," + rgb[2] + ")";

        gsap.fromTo(
            "#liquidImage",
            { opacity: 0.8, y: "100%", transformOrigin: "bottom center" },
            { duration: 1, opacity: 0.8, y: "88%", ease: "power3.out" }
        );
    };
}
// reset the liquidAnimation
function clearLiquid() {
    gsap.set("#innerImage, #liquidImage", {
        opacity: 0,
        y: "100%",
        transformOrigin: "bottom center",
    });
}
// computes the common color
function getSumColor() {
    const numColors = rgbList.length;
    // Initialization of the sum variable for the RGB values
    let sumR = 0;
    let sumG = 0;
    let sumB = 0;

    // Loop to add up all the RGB values of the colors
    rgbList.forEach((color) => {
        const rgb = color.split(",").map(Number);
        sumR += rgb[0];
        sumG += rgb[1];
        sumB += rgb[2];
    });

    // Calculation of the average of the RGB values
    const avgR = Math.round(sumR / numColors);
    const avgG = Math.round(sumG / numColors);
    const avgB = Math.round(sumB / numColors);

    // Creation of a common color
    const commonColor = `rgb(${avgR},${avgG},${avgB})`;
    return commonColor;
}

// remove all Ingredients from the array
function removeBall() {
    balls = [];
    sessionStorage.setItem("ingredientsArray", JSON.stringify(balls));
}



