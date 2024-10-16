    // Initial adjustment based on initial scroll position
  var scrollPosition = window.scrollY;
  var navbar = document.getElementById("navbar");
  var newHeight = 200 - scrollPosition * 0.6; // Faster adjustment
  navbar.style.height = newHeight + "px";
  var navbarHeight = parseInt(getComputedStyle(navbar).height);
  var image = document.querySelector("#navbar img");
  image.style.height = navbarHeight + "px";
  
  // Scroll event listener
  window.addEventListener("scroll", function () {
    var scrollPosition = window.scrollY;
    var navbar = document.getElementById("navbar");
    var newHeight = 200 - scrollPosition * 0.6; // Faster adjustment
  
    if (scrollPosition > 200) {
        navbar.style.height = newHeight + "px"; // Gradually decrease height
    } else {
        navbar.style.height = 200 - scrollPosition * 0.6 + "px"; // Gradually increase height
    }
  
    var navbarHeight = parseInt(getComputedStyle(navbar).height);
    var image = document.querySelector("#navbar img"); // Select the image
    image.style.height = navbarHeight + "px";
  });
  
  // Throttle function to limit the frequency of scroll event handler execution
  function throttle(func, delay) {
    let lastCalledTime = 0;
    return function () {
        const now = new Date().getTime();
        if (now - lastCalledTime >= delay) {
            func.apply(this, arguments);
            lastCalledTime = now;
        }
    };
  }

console.log("Test");