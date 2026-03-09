// Select all elements to animate
const scrollElements = document.querySelectorAll(".animate-on-scroll");

function elementInView(el, offset = 100) {
  const elementTop = el.getBoundingClientRect().top;
  return elementTop <= (window.innerHeight - offset);
}

function displayScrollElement(el) {
  el.classList.add("visible");
}

function hideScrollElement(el) {
  el.classList.remove("visible");
}

function handleScrollAnimation() {
  scrollElements.forEach(el => {
    if (elementInView(el, 100)) {
      displayScrollElement(el);
    } // Optional: else { hideScrollElement(el); }
  });
}

// Listen for scroll
window.addEventListener("scroll", handleScrollAnimation);

// Initial trigger in case elements already in view
handleScrollAnimation();
