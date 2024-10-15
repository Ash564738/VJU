var swiper = new Swiper(".home", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });



  function toggleTinhThanh() {
    var tinhThanhList = document.getElementById("tinhThanhList");
    if (tinhThanhList.style.display === "none") {
        tinhThanhList.style.display = "block";
    } else {
        tinhThanhList.style.display = "none";
    }
}



