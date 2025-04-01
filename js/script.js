const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark-mode"){
    body.classList.add("dark");
}

modeToggle.addEventListener("click", () => {
    modeToggle.classList.toggle("active");
    body.classList.toggle("dark");

    if(!body.classList.contains("dark")){
        localStorage.setItem("mode", "light-mode");
    } else {
        localStorage.setItem("mode", "dark-mode");
    }
});

searchToggle.addEventListener("click", () => {
    searchToggle.classList.toggle("active");
});

sidebarOpen.addEventListener("click", () => {
    nav.classList.add("active");
});

body.addEventListener("click", (e) => {
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});

let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const buttons = document.querySelectorAll('.hero-buttons button');

function showSlide(index) {
  if (index === currentSlide) return;

  const current = slides[currentSlide];
  const next = slides[index];

  const currentVideo = current.querySelector('video');
  currentVideo.pause();
  currentVideo.currentTime = 0;

  current.classList.remove('active');
  buttons[currentSlide].classList.remove('active');

  next.classList.add('active');
  buttons[index].classList.add('active');

  const nextVideo = next.querySelector('video');
  nextVideo.currentTime = 0;
  nextVideo.play();

  currentSlide = index;
}

// Auto-advance on video end
slides.forEach((slide, index) => {
  const video = slide.querySelector('video');
  video.addEventListener('ended', () => {
    const nextIndex = (index + 1) % slides.length;
    showSlide(nextIndex);
  });
});

// Start first video
window.addEventListener('DOMContentLoaded', () => {
  const firstVideo = slides[0].querySelector('video');
  firstVideo.play();
}); 

window.addEventListener("load", () => {
    const preloader = document.getElementById("preloader");
    if (preloader) {
        setTimeout(() => {
            preloader.style.opacity = "0";
            preloader.style.pointerEvents = "none";
            setTimeout(() => preloader.style.display = "none", 600); 
        }, 1000); 
    }
});


  const tickerText = document.getElementById("tickerText");

  const tickerSets = [
    `
    <a href="#" class="ticker-item"><img src="images/icons/tesla.png" class="ticker-icon"> TSLA: $700 ↑</a>
    <a href="#" class="ticker-item"><img src="images/icons/apple.png" class="ticker-icon"> AAPL: $150 ↓</a>
    <a href="#" class="ticker-item"><img src="images/icons/amazon.png" class="ticker-icon"> AMZN: $3300 ↑</a>
    <a href="#" class="ticker-item"><img src="images/icons/meta.png" class="ticker-icon"> META: $200 ↓</a>
    <a href="#" class="ticker-item"><img src="images/icons/nflx.png" class="ticker-icon"> NFLX: $500 ↑</a>
    `,
    `
    <a href="portfolio.html#jet-fund" class="ticker-item"><img src="images/icons/jet.png" class="ticker-icon"> Gillania Jet Fund: +12% ROI 🚀</a>
    <a href="portfolio.html#realestate" class="ticker-item"><img src="images/icons/skyscrap.png" class="ticker-icon"> Dubai Tower ROI: +18% 🏙️</a>
    <a href="portfolio.html#yacht-fund" class="ticker-item"><img src="images/icons/yacht.png" class="ticker-icon"> Superyacht Charter Fund: +15% ⛵</a>
    <a href="portfolio.html#g-alpha" class="ticker-item"><img src="images/icons/stocks.png" class="ticker-icon"> Gillania Alpha Stocks: +10% 📊</a>
    `
  ];

  let currentTicker = 0;

  function rotateTicker() {
    tickerText.innerHTML = tickerSets[currentTicker];
    currentTicker = (currentTicker + 1) % tickerSets.length;
  }

  rotateTicker(); // initial load
  setInterval(rotateTicker, 12000); // change every 12 seconds


// //////////////////////////////////////////

// Contact us form PHP

// //////////////////////////////////////////

