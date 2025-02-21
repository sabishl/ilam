document.addEventListener('DOMContentLoaded', function () {
  // IntersectionObserver for Animations on Scroll
  const sections = document.querySelectorAll('.animate-on-scroll'); // Target sections with the 'animate-on-scroll' class

  if (sections.length > 0) {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Add specific animation classes when section comes into view
          entry.target.classList.add('fade-in');
          if (entry.target.classList.contains('slide-in-left')) {
            entry.target.classList.add('slide-in-left');
          } else if (entry.target.classList.contains('slide-in-right')) {
            entry.target.classList.add('slide-in-right');
          }
          observer.unobserve(entry.target); // Stop observing once animation triggers
        } else {
          // Optionally remove animation classes for re-trigger
          entry.target.classList.remove('fade-in');
          entry.target.classList.remove('slide-in-left');
          entry.target.classList.remove('slide-in-right');
        }
      });
    }, {
      threshold: 0.5 // Trigger animation when 50% of the section is in view
    });

    // Observe each section with the class 'animate-on-scroll'
    sections.forEach(section => observer.observe(section));
  }

  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      // Scroll smoothly to the targeted section
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    });
  });

  // Additional IntersectionObserver for elements requiring re-triggerable animations
  const reTriggerObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        // Add animation classes dynamically
        entry.target.classList.add('animate');
      } else {
        // Remove animation classes if re-trigger is desired on scroll
        entry.target.classList.remove('animate');
      }
    });
  });

  // Attach reTriggerObserver to elements with "animate-on-scroll" class
  sections.forEach((el) => reTriggerObserver.observe(el));

  // Image Slider Logic for Mobile (One image displayed at a time)
  let currentIndex = 0;
  const images = document.querySelectorAll('.image-slide');

  // Function to handle the image transition
  function changeImage() {
    // Hide all images
    images.forEach(image => {
      image.classList.add('hidden');
    });

    // Show the current image
    images[currentIndex].classList.remove('hidden');

    // Move to the next image, looping back to the first after the last
    currentIndex = (currentIndex + 1) % images.length;
  }

  // Set interval to automatically change images every 3 seconds
  setInterval(changeImage, 3000);

  // Initial image display
  if (images.length > 0) {
    images[currentIndex].classList.remove('hidden');
  }
});
