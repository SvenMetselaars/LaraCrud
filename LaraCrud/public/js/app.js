// List of your MP4 files
const videos = [
    "videos/11960717-uhd_3840_2160_25fps.mp4",
    "videos/14259996_1920_1080_30fps.mp4",
    "videos/14294696_3840_2160_24fps.mp4",
    "videos/14299891_3840_2160_30fps.mp4",
    "videos/19093769-uhd_3840_2160_30fps.mp4",
    "videos/15459485-uhd_3840_2160_60fps.mp4",
    "videos/14183086_2562_1440_25fps.mp4",
    "videos/13725895_3840_2160_25fps.mp4",
    "videos/12554614-uhd_3840_2160_25fps.mp4",
    "videos/14329150_3840_2160_24fps.mp4",
    "videos/14295693_3840_2160_30fps.mp4",
    "videos/14285331_3840_2160_30fps.mp4",
    "videos/14168299_3840_2160_60fps.mp4",
    "videos/14000125_3840_2160_60fps.mp4"
];

// Pick a random one
const randomVideo = videos[Math.floor(Math.random() * videos.length)];

const heroVideo = document.querySelector(".hero-video");
heroVideo.src = randomVideo;

// Play only on hover
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
    { title: "Trending Movie 1", img: "imgs/pexels-aarifh-33687897.webp" },
    { title: "Trending Movie 2", img: "imgs/pexels-ahmet-kurt-2147988540-33514898.webp" },
    { title: "Trending Movie 3", img: "imgs/pexels-berkan-i-yili-2154679279-33866528.webp" },
    { title: "Trending Movie 4", img: "imgs/pexels-eceebrarr-33646740.webp" },
    { title: "Trending Movie 5", img: "imgs/pexels-cari-cinnamon-tea-2155247743-33673041.webp" }
];

const popularShows = [
    { title: "Popular Show 1", img: "imgs/pexels-feeblenblessed-33711799.webp" },
    { title: "Popular Show 2", img: "imgs/pexels-marija-piliskic-2155438514-33754556.webp" },
    { title: "Popular Show 3", img: "imgs/pexels-kayaartss-33560730.webp" },
    { title: "Popular Show 4", img: "imgs/pexels-pam-crane-3712506-21384273.webp" }
];

const myList = [
    { title: "Saved Movie 1", img: "imgs/pexels-rakibul-alam-khan-2154391542-33434135.webp" },
    { title: "Saved Movie 2", img: "imgs/pexels-jonathanborba-33564876.webp" },
    { title: "Saved Movie 3", img: "imgs/pexels-tr-ng-nguy-n-2154466961-33235527.webp" }
];

// A function to inject posters into the right section
function loadPosters(sectionSelector, items) {
    const section = document.querySelector(sectionSelector);
    const cards = section.querySelectorAll(".card");

    cards.forEach((card, index) => {
        if (items[index]) {
            const placeholder = card.querySelector(".card-placeholder");
            const overlayTitle = card.querySelector(".card-title");

            // Replace placeholder text with image
            placeholder.innerHTML = `<img src="${items[index].img}" alt="${items[index].title}" />`;

            // Update overlay title (optional if already correct in HTML)
            overlayTitle.textContent = items[index].title;
        }
    });
}

// Call function for each section
loadPosters(".section:nth-of-type(1)", trendingMovies);
loadPosters(".section:nth-of-type(2)", popularShows);
loadPosters(".section:nth-of-type(3)", myList);

// Header scroll effect
window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});