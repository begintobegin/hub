<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
</head>
<style>
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #000; /* Black background */
        top: 0;
        left: 0;
        z-index: -1; /* To keep it behind other elements */
    }
</style>
<body>
    <div class="" id = "particles-js">
    <form action="/auth/ProcessRegister.php" method="POST">
        <input type="email" name = "email"placeholder="email">
        <input type="password" name = "password" placeholder="password" id="">
        <input type="password" name = "password-repeat" placeholder="password" id="">
        <input type="text" name = "username" placeholder="username" id="">
        <button type = "submit">Отправить</button>
    </form>
    </div>
    <script>
    particlesJS('particles-js', {
       "particles": {
    "number": {
      "value": 80,
      "density": {
        "enable": true,
        "value_area": 946.9771699587272
      }
    },
    "color": {
      "value": "#ff0000"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#0c0c0c"
      },
      "polygon": {
        "nb_sides": 3
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 3,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
    });
</script>
</body>
</html> 