"use strict";

$(document).ready(function () {
  "use strict";

  var $sidebarToggle = $(".menu-toggle");
  var $sidebarLeft = $(".sidebar-left");
  var $sidebarLeftSecondary = $(".sidebar-left-secondary");
  var $sidebarOverlay = $(".sidebar-overlay");
  var $mainContentWrap = $(".main-content-wrap");
  var $sideNavItem = $(".nav-item");
  var $mobileMenu = $(".mobile-menu-icon");

  function sidebarMobileOpen() {
    $mobileMenu;
  }
  function openSidebar() {
    $sidebarLeft.addClass("open");
    $mainContentWrap.addClass("sidenav-open");
  }
  function closeSidebar() {
    $sidebarLeft.removeClass("open");
    $mainContentWrap.removeClass("sidenav-open");
  }
  function openSidebarSecondary() {
    $sidebarLeftSecondary.addClass("open");
    $sidebarOverlay.addClass("open");
  }
  function closeSidebarSecondary() {
    $sidebarLeftSecondary.removeClass("open");
    $sidebarOverlay.removeClass("open");
  }
  function openSidebarOverlay() {
    $sidebarOverlay.addClass("open");
  }
  function closeSidebarOverlay() {
    $sidebarOverlay.removeClass("open");
  }
  function navItemToggleActive($activeItem) {
    var $navItem = $(".nav-item");
    $navItem.removeClass("active");
    $activeItem.addClass("active");
  }

  function initLayout() {
    // Makes secondary menu selected on page load
    $sideNavItem.each(function (index) {
      var $item = $(this);
      if ($item.hasClass("active")) {
        var dataItem = $item.data("item");
        $sidebarLeftSecondary.find("[data-parent=\"" + dataItem + "\"]").show();
      }
    });
    if (gullUtils.isMobile()) {
      closeSidebar();
      closeSidebarSecondary();
    }
  }

  $(window).on("resize", function (event) {
    if (gullUtils.isMobile()) {
      closeSidebar();
      closeSidebarSecondary();
    }
  });

  initLayout();

  // Show Secondary menu area on hover on side menu item;
  $sidebarLeft.find(".nav-item").on("mouseenter", function (event) {
    var $navItem = $(event.currentTarget);
    var dataItem = $navItem.data("item");

    if (dataItem) {
      navItemToggleActive($navItem);
      openSidebarSecondary();
    } else {
      closeSidebarSecondary();
    }
    $sidebarLeftSecondary.find(".childNav").hide();
    $sidebarLeftSecondary.find("[data-parent=\"" + dataItem + "\"]").show();
  });

  // Prevent opeing link if has data-item
  $sidebarLeft.find(".nav-item").on("click", function (e) {

    var $navItem = $(event.currentTarget);
    var dataItem = $navItem.data("item");
    if (dataItem) {
      e.preventDefault();
    }
  });

  // Hide secondary menu on click on overlay
  $sidebarOverlay.on("mouseover", function (event) {
    if (gullUtils.isMobile()) {
      closeSidebar();
    }
    closeSidebarSecondary();
  });

  // Toggle menus on click on header toggle icon
  $sidebarToggle.on("click", function (event) {
    var isSidebarOpen = $sidebarLeft.hasClass("open");
    var isSidebarSecOpen = $sidebarLeftSecondary.hasClass("open");
    var dataItem = $(".nav-item.active").data("item");
    if (isSidebarOpen && isSidebarSecOpen && gullUtils.isMobile()) {
      closeSidebar();
      closeSidebarSecondary();
    } else if (isSidebarOpen && isSidebarSecOpen) {
      closeSidebarSecondary();
    } else if (isSidebarOpen) {
      closeSidebar();
    } else if (!isSidebarOpen && !isSidebarSecOpen && !dataItem) {
      openSidebar();
    } else if (!isSidebarOpen && !isSidebarSecOpen) {
      openSidebar();
      openSidebarSecondary();
    }
  });

  var $hoverElement = document.getElementById("btn-dashboard");
  var $hoverElement2 = document.getElementById("btn-phanquyen");
  $hoverElement.addEventListener("mouseover", () => {
    if (gullUtils.isMobile()) {
        closeSidebar();
      }
      closeSidebarSecondary();
  });
  $hoverElement.addEventListener("click", () => {
    window.location.href = "/dashboard";
  });
  $hoverElement2.addEventListener("mouseover", () => {
    if (gullUtils.isMobile()) {
        closeSidebar();
      }
      closeSidebarSecondary();
  });
  $hoverElement2.addEventListener("click", () => {
    window.location.href = "/admin/phan-quyen";
  });
});
