// List of your MP4 files
const videos = [
    "/storage/1.mp4",
    "/storage/2.mp4",
    "/storage/3.mp4",
    "/storage/4.mp4",
    "/storage/5.mp4",
    "/storage/6.mp4",
    "/storage/7.mp4",
    "/storage/8.mp4"
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