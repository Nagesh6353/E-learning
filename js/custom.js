$(document).ready(function() {
    // executes when HTML-Document is loaded and DOM is ready
    // Most Popular Course Card Hover Effect
    $(".card").hover(
      function() {
        $(this)
          .addClass("shadow")
          .css("cursor", "pointer");
      },
      function() {
        $(this).removeClass("shadow");
      }
    );
  
    // Change Navbar Color on Scroll
    // $(window).scrollTop() returns the position of the top of the page
    $(window).scroll(function() {
      if ($(window).scrollTop() >= 600) {
        $(".navbar").css("background-color", "#225470");
      } else {
        $(".navbar").css("background-color", "transparent");
      }
    });
  
    $(function() {
      $("#playlist li").on("click", function() {
        $("#videoarea").attr({
          src: $(this).attr("movieurl")
        });
      });
      $("#videoarea").attr({
        src: $("#playlist li")
          .eq(0)
          .attr("movieurl")
      });
    });
    
  });

  /* Index Page 3d Carousel Script
  const galleryContainer = document.querySelector('.gallery-container');
  const galleryControlsContainer = document.querySelector('.gallery-controls');
  const galleryControls = ['previous', 'next'];
  const galleryItems = document.querySelectorAll('.gallery-item');

  class Carousel{

    constructor(container, items, controls){
      this.carouselContainer = container;
      this.carouselControls = controls;
      this.carouselArray = [...items];
    }

    updateGallery(){
      this.carouselArray.forEach(el => {
        el.classList.remove('gallery-item-1');
        el.classList.remove('gallery-item-2');
        el.classList.remove('gallery-item-3');
        el.classList.remove('gallery-item-4');
        el.classList.remove('gallery-item-5');
      });

      this.carouselArray.slice(0, 5).forEach((el , i) => {
        el.classList.add(`gallery-item-${i+1}`);
      });
    }
    setCurrentState(direction){
      if(direction.className == 'gallery-controls-previous'){
        this.carouselArray.unshift(this.carouselArray.pop());
      }else{
        this.carouselArray.push(this.carouselArray.shift());
      }
      this.updateGallery();
    }

    setControls(){
      this.carouselControls.forEach(control => {
        galleryControlsContainer.appendChild(document.createElement('button')).className = `gallery-controls-${control}`;
        document.querySelector(`.gallery-controls-${control}`).innerText = control;
      });
    }

    useControls(){
      const triggers = [...galleryControlsContainer.childNodes];
      triggers.forEach(control => {
        control.addEventListener('click', e => {
          e.preventDefault();
          this.setCurrentState(control);
        });
      });
    }
  }

  const exampleCarousel = new Carousel(galleryContainer, galleryItems, galleryControls);

  exampleCarousel.setControls();
  exampleCarousel.useControls();*/

  