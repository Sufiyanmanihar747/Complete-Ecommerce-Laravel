<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Error Page</title>
  <style>
    /* Converted Sass variables to CSS variables */
    :root {
      --col-sky-top: #bbcfe1;
      --col-sky-bottom: #e8f2f6;
      --col-fg: #5d7399;
      --col-blood: #dd4040;
      --col-ground: #f6f9fa;
    }

    * {
      margin: 0;
      padding: 0;
    }

    html,
    body {
      font-family: 'Dosis', sans-serif;
      color: var(--col-fg);
    }

    .content {
      height: 100vh;
      position: relative;
      z-index: 1;
      background-color: var(--col-sky-top);
      background-image: linear-gradient(to bottom, var(--col-sky-top) 0%, var(--col-sky-bottom) 80%);
      overflow: hidden;
    }

    .snow {
      position: absolute;
      top: 0;
      left: 0;
      pointer-events: none;
      z-index: 20;
    }

    .main-text {
      padding: 20vh 20px 0 20px;
      text-align: center;
      line-height: 2em;
      font-size: 5vh;
    }

    .home-link {
      font-size: 0.6em;
      font-weight: 400;
      color: inherit;
      text-decoration: none;
      opacity: 0.6;
      border-bottom: 1px dashed transparentize(var(--col-fg), 0.5);
    }

    .home-link:hover {
      opacity: 1;
    }

    .ground {
      height: 160px;
      width: 100%;
      position: absolute;
      bottom: 100px;
      left: 0;
    }

    .mound {
      margin-top: -80px;
      font-weight: 800;
      font-size: 180px;
      text-align: center;
      color: var(--col-blood);
      pointer-events: none;
    }

    .mound_text {
      transform: rotate(6deg);
    }

    .mound_spade {
      display: block;
      width: 35px;
      height: 30px;
      position: absolute;
      right: 50%;
      top: 42%;
      margin-right: -250px;
      z-index: 0;
      transform: rotate(35deg);
      background: var(--col-blood);
    }

    .mound_spade:before,
    .mound_spade:after {
      content: '';
      display: block;
      position: absolute;
    }

    .mound_spade:before {
      width: 40%;
      height: 30px;
      bottom: 98%;
      left: 50%;
      margin-left: -20%;
      background: var(--col-blood);
    }

    .mound_spade:after {
      width: 100%;
      height: 30px;
      top: -55px;
      left: 0%;
      box-sizing: border-box;
      border: 10px solid var(--col-blood);
      border-radius: 4px 4px 20px 20px;
    }
  </style>
</head>

<body>
  <div class="content">
    <canvas class="snow" id="snow"></canvas>
    <div class="main-text">
      <h1>Oops!</h1>
      <br>
      <p>Something went wrong.</p>
    </div>
    <div class="ground">
      <div class="mound">
        <div class="mound_text">404</div>
      </div>
    </div>
  </div>

  <script>
    (function() {
      function ready(fn) {
        if (document.readyState != 'loading') {
          fn();
        } else {
          document.addEventListener('DOMContentLoaded', fn);
        }
      }

      function makeSnow(el) {
        var ctx = el.getContext('2d');
        var width = 0;
        var height = 0;
        var particles = [];

        var Particle = function() {
          this.x = this.y = this.dx = this.dy = 0;
          this.reset();
        }

        Particle.prototype.reset = function() {
          this.y = Math.random() * height;
          this.x = Math.random() * width;
          this.dx = (Math.random() * 1) - 0.5;
          this.dy = (Math.random() * 0.5) + 0.5;
        }

        function createParticles(count) {
          if (count != particles.length) {
            particles = [];
            for (var i = 0; i < count; i++) {
              particles.push(new Particle());
            }
          }
        }

        function onResize() {
          width = window.innerWidth;
          height = window.innerHeight;
          el.width = width;
          el.height = height;

          createParticles((width * height) / 10000);
        }

        function updateParticles() {
          ctx.clearRect(0, 0, width, height);
          ctx.fillStyle = '#ffffff';

          particles.forEach(function(particle) {
            particle.y += particle.dy;
            particle.x += particle.dx;

            if (particle.y > height) {
              particle.y = 0;
            }

            if (particle.x > width) {
              particle.reset();
              particle.y = 0;
            }

            ctx.beginPath();
            ctx.arc(particle.x, particle.y, 5, 0, Math.PI * 2, false);
            ctx.fill();
          });

          window.requestAnimationFrame(updateParticles);
        }

        onResize();
        updateParticles();

        window.addEventListener('resize', onResize);
      }

      ready(function() {
        var canvas = document.getElementById('snow');
        makeSnow(canvas);
      });
    })();
  </script>
</body>

</html>
