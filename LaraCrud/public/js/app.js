// List of your MP4 files
const videos = [
    "/videos/11960717-uhd_3840_2160_25fps.mp4",
    "/videos/14259996_1920_1080_30fps.mp4",
    "/videos/14294696_3840_2160_24fps.mp4",
    "/videos/14299891_3840_2160_30fps.mp4",
    "/videos/15459485-uhd_3840_2160_60fps.mp4",
    "/videos/14183086_2562_1440_25fps.mp4",
    "/videos/12554614-uhd_3840_2160_25fps.mp4",
    "/videos/14000125_3840_2160_60fps.mp4"
];

// Pick a random one
const randomVideo = videos[Math.floor(Math.random() * videos.length)];

const heroVideo = document.querySelector(".hero-video");
heroVideo.src = randomVideo;

// Play only on hovers
const heroSection = document.querySelector(".hero");

heroSection.addEventListener("mouseenter", () => {
    heroVideo.play();
});

heroSection.addEventListener("mouseleave", () => {
    heroVideo.pause();
});

heroVideo.addEventListener("ended", () => {
    heroVideo.pause();
    heroVideo.currentTime = heroVideo.duration;

    setTimeout(() => {
        heroVideo.addEventListener("transitionend", () => {
            heroVideo.currentTime = 0;
            heroVideo.play();
        }, { once: true });
    }, 5000); // 3s delay
});

//image stuff

const trendingMovies = [
    { img: "imgs/pexels-aarifh-33687897.webp" },
    { img: "imgs/pexels-ahmet-kurt-2147988540-33514898.webp" },
    { img: "imgs/pexels-berkan-i-yili-2154679279-33866528.webp" },
    { img: "imgs/pexels-eceebrarr-33646740.webp" },
    { img: "imgs/pexels-cari-cinnamon-tea-2155247743-33673041.webp" }
];

// A function to inject posters into the right section
function loadPosters(sectionSelector, items) {
    const section = document.querySelector(sectionSelector);
    const cards = section.querySelectorAll(".card");
    
    cards.forEach((card) => {
        // Generate random number between 0 and 4
        const randomIndex = Math.floor(Math.random() * items.length);
        
        if (items[randomIndex]) {
            const placeholder = card.querySelector(".card-placeholder");

            // Replace placeholder text with image
            placeholder.innerHTML = `<img src="${items[randomIndex].img}" />`;
        }
    });
}

// Call function for each section
loadPosters(".section:nth-of-type(1)", trendingMovies);

// Header scroll effect
window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});