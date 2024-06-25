<!-- jequery plugins -->
<script src="/js/jquery.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.js"></script>
<script src="/js/wow.js"></script>
<script src="/js/validation.js"></script>
<script src="/js/jquery.fancybox.js"></script>
<script src="/js/appear.js"></script>
<script src="/js/scrollbar.js"></script>
<script src="/js/isotope.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/nav-tool.js"></script>
<script src="/js/jquery.lettering.min.js"></script>
<script src="/js/jquery.circleType.js"></script>
<script src="/js/bxslider.js"></script>

<!-- main-js -->
<script src="/js/script.js"></script>

<script>
    function truncateText(className, maxLength) {
      const elements = document.querySelectorAll(className);
      elements.forEach(element => {
        const text = element.textContent;
        if (text.length > maxLength) {
          element.innerText = text.slice(0, maxLength) + '...';
        } else {
          element.innerText = text;
        }
      });
    }

    truncateText('body > div > section:nth-child(8) > div.auto-container > div.three-item-carousel.owl-carousel.owl-theme.owl-nav-none.owl-loaded.owl-drag > div.owl-stage-outer > div > div > div > div > p', 100); // Limit to 50 characters
    truncateText('body > div > section.working-section.centred.sec-pad > div > div.inner-content > div.row.clearfix > div > div > div > div.lower-content > p', 80); // Limit to 50 characters
    truncateText('body > div > section.testimonial-section.sec-pad > div.auto-container > div > div.col-lg-6.col-md-12.col-sm-12.inner-column > div > div > div > div.bx-viewport > div > div > div > div > blockquote', 200); // Limit to 50 characters
    truncateText('body > div > section.about-section.sec-pad > div > div > div.col-lg-6.col-md-12.col-sm-12.content-column > div > div.text-box > p', 390); // Limit to 50 characters
    truncateText('.growth-block-one .inner-box p', 80); // Limit to 50 characters
    truncateText('.growth-section .growth-inner .content-box .text-box p', 94); // Limit to 50 characters
  </script>