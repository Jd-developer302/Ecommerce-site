const navbar = document.querySelector(".navbar");
document.querySelector("#menu").onclick = () => {
  navbar.classList.toggle("active");
};

var swiper = new Swiper(".cat-slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 10000,
    disableOnInteraction: true,
  },
  allowTouchMove: true,
  breakpoints: {
    300: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    350: {
      slidesPerView: 5,
      spaceBetween: 20,
    },
    400: {
      slidesPerView: 5,
      spaceBetween: 0,
    },
    420: {
      slidesPerView: 5,
      spaceBetween: 0,
    },
    500: {
      slidesPerView: 5,
      spaceBetween: 0,
    },
    550: {
      slidesPerView: 5,
      spaceBetween: 0,
    },
    680: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
    960: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
    1080: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
    1460: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
    1550: {
      slidesPerView: 6,
      spaceBetween: 50,
    },
    1750: {
      slidesPerView: 6,
      spaceBetween: 50,
    },
    1880: {
      slidesPerView: 7,
      spaceBetween: 50,
    },
  },
});

var swiper = new Swiper(".hero-slider", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  autoplay: {
    delay: 7000,
    disableOnInteraction: false,
  },
  pagination: {
    el: "swiper-pagination",
    clickable: true,
  }
});

var swiper = new Swiper(".mega-slider", {
  slidesPerView: 1,
  spaceBetween: 50,
  autoplay: {
    delay: 60000000,
    disableOnInteraction: false,
  },
  breakpoints: {
    300: {
      slidesPerView: 2,
      spaceBetween: 10,
    },

    1024: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
    2048: {
      slidesPerView: 4,
      spaceBetween: 50,
    },
    2348: {
      slidesPerView: 5,
      spaceBetween: 50,
    },
  },
});

// let hrs = document.getElementById("hrs");
// let min = document.getElementById("min");
// let sec = document.getElementById("sec");

// setInterval(() => {
//   let currentTime = new Date();
//   hrs.innerHTML = currentTime.getHours();
//   min.innerHTML = currentTime.getMinutes();
//   sec.innerHTML = currentTime.getSeconds();
// }, 1000);

function startCountdown(endTime) {
  function updateTime() {
    const now = new Date().getTime();
    const distance = endTime - now;

    if (distance <= 0) {
      clearInterval(countdownInterval);
      document.querySelectorAll(".hrs, .min, .sec").forEach(element => {
        element.innerHTML = '00';
      });
      return;
    }

    const hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
    const minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
    const seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');

    document.querySelectorAll(".hrs").forEach(element => {
      element.innerHTML = hours;
    });
    document.querySelectorAll(".min").forEach(element => {
      element.innerHTML = minutes;
    });
    document.querySelectorAll(".sec").forEach(element => {
      element.innerHTML = seconds;
    });
  }

  updateTime();
  const countdownInterval = setInterval(updateTime, 1000);
}

// Set the countdown end time
const endTime = new Date().getTime() + (60 * 60 * 1000);
startCountdown(endTime);

var swiper = new Swiper(".pro1-slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
    delay: 10000,
    disableOnInteraction: false,
  },
  breakpoints: {
    350: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1080: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    1550: {
      slidesPerView: 3,
      spaceBetween: 50,
    },
    1880: {
      slidesPerView: 4,
      spaceBetween: 50,
    },
  },
});

var swiper = new Swiper(".pro2-slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
    delay: 10000,
    disableOnInteraction: false,
  },
  allowTouchMove: true,
  breakpoints: {
    350: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    400: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    550: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 50,
    },
  },
});

var swiper = new Swiper(".big-slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
    delay: 10000,
    disableOnInteraction: false,
  },
  allowTouchMove: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    350: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    480: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    860: {
      slidesPerView: 3,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1380: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});

$(document).ready(function () {
  $("#arrow1").click(function () {
    $("#nav1").slideToggle("slow");
  });
});

$(document).ready(function () {
  $("#arrow2").click(function () {
    $("#nav2").slideToggle("slow");
  });
});

$(document).ready(function () {
  $("#arrow3").click(function () {
    $("#nav3").slideToggle("slow");
  });
});

$(document).ready(function () {
  $("#arrow4").click(function () {
    $("#nav4").slideToggle("slow");
  });
});

$(document).ready(function () {
  $("#arrow5").click(function () {
    $(".data").slideToggle("slow");
  });
});

$(document).ready(function () {
  $("#close").click(function () {
    $(".head").slideToggle("slow");
  });
});

var swiper = new Swiper(".all-slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    790: {
      slidesPerView: 1,
      spaceBetween: 20,
    },

    1080: {
      slidesPerView: 2,
      spaceBetween: 20,
    },

    1280: {
      slidesPerView: 2,
      spaceBetween: 20,
    },

    1350: {
      slidesPerView: 2,
      spaceBetween: 20,
    },

    1550: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1800: {
      slidesPerView: 2,
      spaceBetween: 50,
    },
  },
});



// product deatils

const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
  imgItem.addEventListener('click', (event) => {
    event.preventDefault();
    imgId = imgItem.dataset.id;
    slideImage();
  });
});

function slideImage() {
  const displayWidth = document.querySelector('.img-showcase').clientWidth;

  document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);




// Prevent deletion of the country code and validate input
document.getElementById("number").addEventListener("input", function () {
  // Check if value starts with country code
  if (!this.value.startsWith("")) {
    this.value = "+971" + this.value.substring(4); // Restore country code if removed
  }



  // Limit length to 9 digits including country code
  if (this.value.length > 12) {
    this.value = this.value.slice(0, 12);
  }
});


document.getElementById("contactForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent form submission

  // Simulate a delay for demonstration purposes
  setTimeout(function () {
    document.getElementById("successMessage").style.display = "block"; // Display success message
  }, 1000); // Adjust the delay time as needed
});

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

var swiper = new Swiper(".gallery-slider", {
  slidesPerView: 4,
  spaceBetween: 0,
  autoplay: {
    delay: 7000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.gallery-swiper-pagination',
    clickable: true,
  },
});