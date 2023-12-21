/**
* Template Name: BizLand
* Updated: Sep 18 2023 with Bootstrap v5.3.2
* Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/
(function() {
  "use strict";

  // ------- Home Slider Start ------- //
 
  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }
  
  
  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * Navbar links active state on scroll
   */
  // let navbarlinks = select('#navbar .nav-link', true)
  // const navbarlinksActive = () => {
  //   navbarlinks.forEach(navbarlink => {
  //     if (!navbarlink.hash) return
  //     let section = select(navbarlink.hash)
  //     if (!section) return
  //     if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
  //       navbarlink.classList.add('active')
  //     } else {
  //       navbarlink.classList.remove('active')
  //     }
  //   })
  // }
  // window.addEventListener('load', navbarlinksActive)
  // onscroll(document, navbarlinksActive)

  /**
   * Scrolls to an element with header offset
   */
  const scrollto = (el) => {
    let header = select('#header')
    let offset = header.offsetHeight

    if (!header.classList.contains('header-scrolled')) {
      offset -= 16
    }

    let elementPos = select(el).offsetTop
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    })
  }

  /**
   * Header fixed top on scroll
   */
  let selectHeader = select('#header')
  if (selectHeader) {
    let headerOffset = selectHeader.offsetTop
    let nextElement = selectHeader.nextElementSibling
    const headerFixed = () => {
      if ((headerOffset - window.scrollY) <= 0) {
        selectHeader.classList.add('fixed-top')
        nextElement.classList.add('scrolled-offset')
      } else {
        selectHeader.classList.remove('fixed-top')
        nextElement.classList.remove('scrolled-offset')
      }
    }
    window.addEventListener('load', headerFixed)
    onscroll(document, headerFixed)
  }

  /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
  on('click', '.mobile-nav-toggle', function(e) {
    select('#navbar').classList.toggle('navbar-mobile')
    this.classList.toggle('bi-list')
    this.classList.toggle('bi-x')
  })

  /**
   * Mobile nav dropdowns activate
   */
  on('click', '.navbar .dropdown > a', function(e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault()
      this.nextElementSibling.classList.toggle('dropdown-active')
    }
  }, true)

  /**
   * Scrool with ofset on links with a class name .scrollto
   */
  on('click', '.scrollto', function(e) {
    if (select(this.hash)) {
      e.preventDefault()

      let navbar = select('#navbar')
      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile')
        let navbarToggle = select('.mobile-nav-toggle')
        navbarToggle.classList.toggle('bi-list')
        navbarToggle.classList.toggle('bi-x')
      }
      scrollto(this.hash)
    }
  }, true)

  /**
   * Scroll with ofset on page load with hash links in the url
   */
  window.addEventListener('load', () => {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash)
      }
    }
  });

  /**
   * Preloader
   */
  let preloader = select('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove()
    });
  }

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Skills animation
   */
  let skilsContent = select('.skills-content');
  if (skilsContent) {
    new Waypoint({
      element: skilsContent,
      offset: '80%',
      handler: function(direction) {
        let progress = select('.progress .progress-bar', true);
        progress.forEach((el) => {
          el.style.width = el.getAttribute('aria-valuenow') + '%'
        });
      }
    })
  }

  /**
   * Testimonials slider
   */
  new Swiper('.slider ', {
    speed: 600,
    loop: true,
    items: 1,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    }
  });

  /**
   * Porfolio isotope and filter
   */
  window.addEventListener('load', () => {
    let portfolioContainer = select('.portfolio-container');
    if (portfolioContainer) {
      let portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item'
      });

      let portfolioFilters = select('#portfolio-flters li', true);

      on('click', '#portfolio-flters li', function(e) {
        e.preventDefault();
        portfolioFilters.forEach(function(el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');

        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function() {
          AOS.refresh()
        });
      }, true);
    }

  });

  /**
   * Initiate portfolio lightbox
   */
  const portfolioLightbox = GLightbox({
    selector: '.portfolio-lightbox'
  });

  /**
   * Portfolio details slider
   */
  new Swiper('.slider-banner ', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    }
  });

  /**
   * Animation on scroll
   */
  window.addEventListener('load', () => {
    AOS.init({
      duration: 1000,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    })
  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  const menuItems = document.querySelectorAll('.menu-item');
  const contentItems = document.querySelectorAll('.content-item');

  menuItems.forEach((menuItem, index) => {
    menuItem.addEventListener('click', () => {
      // Mengaktifkan menu yang diklik dan menonaktifkan yang lain
      menuItems.forEach((item) => {
        item.classList.remove('active');
      });
      menuItem.classList.add('active');

      // Menampilkan konten yang sesuai dengan menu yang diklik
      contentItems.forEach((contentItem) => {
        contentItem.classList.add('hidden');
      });
      contentItems[index].classList.remove('hidden');
    });
  });




function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
/* fakultas Teknik*/
$('#example').DataTable({
    responsive: true
});

$('#tabel-two').DataTable({
    responsive: true
});
$('#tabel-three').DataTable({
    responsive: true
});
$('#tabel-four').DataTable({
    responsive: true
});
$('#tabel-five').DataTable({
    responsive: true
});
$('#tabel-six').DataTable({
    responsive: true
});
$('#tabel-seven').DataTable({
    responsive: true
});

/* fakultas kesehatan*/
$('#tabel-fak-farmasi').DataTable({
    responsive: true
});
$('#tabel-fak-gizi').DataTable({
    responsive: true
});

/* fakultas Ekonomi dan bisnis*/
$('#tabel-eko-manajemen').DataTable({
    responsive: true
});
$('#tabel-eko-akuntansi').DataTable({
    responsive: true
});
$('#tabel-eko-bisnis').DataTable({
    responsive: true
});

/* fakultas ilmu budaya*/
$('#tabel-ilmu-sastra-one').DataTable({
    responsive: true
});
$('#tabel-ilmu-sastra-two').DataTable({
    responsive: true
});

/* fakultas seni dan desain*/
$('#tabel-seni-komunikasi').DataTable({
    responsive: true
});

/* fakultas hukum*/
$('#tabel-hukum').DataTable({
    responsive: true
});


$(document).ready(function(){
  $('li').on('click', function(){
      $(this).siblings().removeClass('active');
      $(this).addClass('active');

  })
})



})()

function showShareIcons() {
  document.querySelector('.share-container').style.display = 'flex';
}

function hideShareIcons() {
  document.querySelector('.share-container').style.display = 'none';
}
function shareToTwitter() {
  // Ganti URL_POST_DAN_JUDUL dengan data post yang ingin Anda bagikan
  var postUrl = '';
  
  // Buka jendela pop-up untuk melakukan share
  window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(postUrl), 'twitter-share-dialog', 'width=626,height=436');
}

function shareToFacebook() {
  // Ganti URL_POST_DAN_JUDUL dengan data post yang ingin Anda bagikan
  var postUrl = '';
  
  // Buka jendela pop-up untuk melakukan share
  window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(postUrl), 'facebook-share-dialog', 'width=626,height=436');
}


// Fungsi untuk mengubah warna dan jumlah like saat tombol hati diklik
function toggleLike(dataId) {
  const likeCountElement = document.getElementById('likeCount' + dataId);

  // Kirim permintaan AJAX ke server
  axios.post('/toggle-like', { data_id: dataId })
      .then(response => {
          const likeCount = response.data.like_count;

          // Toggle class 'clicked' untuk mengubah warna
          const heartButton = document.querySelector(`.heart[data-id="${dataId}"]`);
          heartButton.classList.toggle('clicked');

          // Update jumlah like
          likeCountElement.innerText = likeCount + ' Likes';

          // Tambahkan logika untuk menyimpan data ke server atau penyimpanan lain jika diperlukan
          console.log('Like count for Data ' + dataId + ':', likeCount);
      })
      .catch(error => {
          console.error('Error:', error);
      });
}








