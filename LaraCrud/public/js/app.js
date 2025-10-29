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
if (!heroVideo.getAttribute("src")) heroVideo.src = randomVideo;

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