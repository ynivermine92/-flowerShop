document.addEventListener("DOMContentLoaded", () => {
  const languageTab = () => {
    const languagesItem = document.querySelectorAll(".languages__link");
    languagesItem.forEach((item) => {
      item.addEventListener("click", () => {
        if (!item.classList.contains("active")) {
          languagesItem.forEach((item) => {
            item.classList.remove("active");
          });
          item.classList.add("active");
        }
      });
    });
  };

  languageTab();

  const burger = () => {
    const burgerBtn = document.querySelector(".burger");
    const navMenu = document.querySelector(".navCatalog");
    burgerBtn.addEventListener("click", () => {
      navMenu.classList.toggle("active");
      burgerBtn.classList.toggle("active");
      if (burgerBtn.classList.contains("active")) {
      }
    });
  };

  burger();

  const burgerBobMenu = () => {
    const sershMobBTN = document.querySelector(".burger__mobile-btn");
    const meneWrapper = document.querySelector(".burger-mobile");
    const headerDesktop = document.querySelector(".header__desktop");
    const headerMobile = document.querySelector(".header__mobile");
    const burgerClouse = document.querySelector(".header__close-btn");
    const wrapperClouse = document.querySelector(".burger-mobile__close");

    sershMobBTN.addEventListener("click", () => {
      meneWrapper.classList.add("active");
      if (meneWrapper.classList.contains("active")) {
        headerDesktop.classList.add("disabled");
        headerMobile.classList.add("disabled");
        document.body.classList.add("locked");
      }
    });

    burgerClouse.addEventListener("mouseenter", () => {
      wrapperClouse.classList.add("active");
    });

    burgerClouse.addEventListener("mouseleave", () => {
      wrapperClouse.classList.remove("active");
    });

    burgerClouse.addEventListener("click", () => {
      meneWrapper.classList.remove("active");
      if (!meneWrapper.classList.contains("active")) {
        headerDesktop.classList.remove("disabled");
        headerMobile.classList.remove("disabled");
        document.body.classList.remove("locked");
      }
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth > 1000) {
        meneWrapper.classList.remove("active");
        headerDesktop.classList.remove("disabled");
        headerMobile.classList.remove("disabled");
        document.body.classList.remove("locked");
      }
    });
  };

  burgerBobMenu();

  const burgerMenuTable = () => {
    const sershMobBtn = document.querySelector(".burger-mobile__table");
    const arrowAnimation = document.querySelector(".burger-mobile__arrow");
    const menuItem = document.querySelector(".burger-mobile__one-items");

    sershMobBtn.addEventListener("click", () => {
      if (!menuItem.classList.contains("active")) {
        arrowAnimation.classList.add("active");
        menuItem.classList.add("active");
      } else {
        arrowAnimation.classList.remove("active");
        menuItem.classList.remove("active");
      }
    });
  };

  burgerMenuTable();
});
