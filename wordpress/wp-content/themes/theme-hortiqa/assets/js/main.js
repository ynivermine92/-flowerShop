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
    const navMenu = document.querySelector(".catalog");
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
    const burgerClouse = document.querySelector(".burger-mobile__close");
    const wrapperSershMob = document.querySelector(".header__box-detals");

    sershMobBTN.addEventListener("click", () => {
      meneWrapper.classList.add("active");
      if (meneWrapper.classList.contains("active")) {
        headerDesktop.classList.add("disabled");
        headerMobile.classList.add("disabled");
        document.body.classList.add("locked");
      }
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
    const menuItem = document.querySelector(".burger-mobile__catalog-items");
    const menuItemLink = document.querySelector(".burger-mobile__link");

    sershMobBtn.addEventListener("click", () => {
      if (!menuItem.classList.contains("active")) {
        arrowAnimation.classList.add("active");
        menuItemLink.classList.add("active");
        menuItem.classList.add("active");
      } else {
        arrowAnimation.classList.remove("active");
        menuItemLink.classList.add("active");
        menuItem.classList.remove("active");
      }
    });
  };

  burgerMenuTable();

  const burgerMobMenu = () => {
    // Первый уровень
    const itemMenu = document.querySelectorAll(".menu__item-one");

    itemMenu.forEach((item) => {
      item.addEventListener("click", (e) => {
        e.preventDefault(); // отменяем переход по ссылке первого уровня
        item.classList.toggle("active");
        // Скрываем актив у всех остальных первого уровня
        itemMenu.forEach((otherItem) => {
          if (otherItem !== item) {
            otherItem.classList.remove("open");
              otherItem.classList.remove("active");
            const childLvl2 = otherItem.querySelector(".catalog__category-two");
            if (childLvl2) childLvl2.classList.remove("open");
          }
        });

        // Переключаем актив у текущего первого уровня
        item.classList.toggle("open");

        // Переключаем актив второго уровня только если он есть
        const childLvl2 = item.querySelector(".catalog__category-two");
        if (childLvl2) {
          childLvl2.classList.toggle("open");
        }
      });
    });

    // Второй уровень (открытие третьего)
    const lvl2Items = document.querySelectorAll(".catalog__category-two");

    lvl2Items.forEach((lvl2) => {
      lvl2.addEventListener("click", (e) => {
        lvl2.classList.toggle("active");
        e.stopPropagation();

        if (!e.target.closest(".catalog__category-three a")) {
          e.preventDefault();
          const lvl3 = lvl2.querySelector(".catalog__category-three");
          if (lvl3) {
            lvl3.classList.toggle("open");
          }
        }
      });
    });
  };

  burgerMobMenu();
});
