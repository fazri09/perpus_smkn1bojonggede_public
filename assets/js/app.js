try {
    // Hentikan propagasi pada dropdown-menu tertentu
    var dropdownMenus = document.querySelectorAll(".dropdown-menu.stop");
    dropdownMenus.forEach(function (e) {
        e.addEventListener("click", function (e) {
            e.stopPropagation();
        });
    });
} catch (e) {}

try {
    // Inisialisasi ikon lucide
    lucide.createIcons();
} catch (e) {}

try {
    // Toggle tema light/dark + simpan ke localStorage
    var themeColorToggle = document.getElementById("light-dark-mode");

    // Terapkan tema saat halaman dimuat
    const savedTheme = localStorage.getItem("theme_mode");
    if (savedTheme) {
        document.documentElement.setAttribute("data-bs-theme", savedTheme);
    }

    // Saat diklik, ubah tema dan simpan
    themeColorToggle &&
        themeColorToggle.addEventListener("click", function () {
            const current = document.documentElement.getAttribute("data-bs-theme");
            const newTheme = current === "light" ? "dark" : "light";
            document.documentElement.setAttribute("data-bs-theme", newTheme);
            localStorage.setItem("theme_mode", newTheme);
        });
} catch (e) {}

try {
    // Sidebar collapse toggle (untuk mode mobile)
    var collapsedToggle = document.querySelector(".mobile-menu-btn");
    const overlay = document.querySelector(".startbar-overlay");

    const changeSidebarSize = () => {
        if (window.innerWidth >= 310 && window.innerWidth <= 1440) {
            document.body.setAttribute("data-sidebar-size", "collapsed");
        } else {
            document.body.setAttribute("data-sidebar-size", "default");
        }
    };

    collapsedToggle?.addEventListener("click", function () {
        const currentSize = document.body.getAttribute("data-sidebar-size");
        document.body.setAttribute("data-sidebar-size", currentSize === "collapsed" ? "default" : "collapsed");
    });

    overlay?.addEventListener("click", () => {
        document.body.setAttribute("data-sidebar-size", "collapsed");
    });

    window.addEventListener("resize", () => {
        changeSidebarSize();
    });

    changeSidebarSize();
} catch (e) {}

try {
    // Bootstrap tooltip & popover
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));

    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    const popoverList = popoverTriggerList.map(function (el) {
        return new bootstrap.Popover(el);
    });
} catch (e) {}

function windowScroll() {
    var topbar = document.getElementById("topbar-custom");
    if (topbar) {
        if (document.body.scrollTop >= 50 || document.documentElement.scrollTop >= 50) {
            topbar.classList.add("nav-sticky");
        } else {
            topbar.classList.remove("nav-sticky");
        }
    }
}

window.addEventListener("scroll", (e) => {
    e.preventDefault();
    windowScroll();
});

const initVerticalMenu = () => {
    // Collapse menu behavior
    const collapses = document.querySelectorAll(".navbar-nav li .collapse");
    document.querySelectorAll(".navbar-nav li [data-bs-toggle='collapse']").forEach(el => {
        el.addEventListener("click", function (e) {
            e.preventDefault();
        });
    });

    collapses.forEach(collapseEl => {
        collapseEl.addEventListener("show.bs.collapse", function (event) {
            const currentOpen = event.target.closest(".collapse.show");
            document.querySelectorAll(".navbar-nav .collapse.show").forEach(el => {
                if (el !== event.target && el !== currentOpen) {
                    new bootstrap.Collapse(el).hide();
                }
            });
        });
    });

    // Highlight menu aktif
    const navLinks = document.querySelectorAll(".navbar-nav a");
    navLinks.forEach(link => {
        const currentUrl = window.location.href.split(/[?#]/)[0];
        if (link.href === currentUrl) {
            link.classList.add("active");
            link.parentNode.classList.add("active");

            let parentCollapse = link.closest(".collapse");
            while (parentCollapse) {
                parentCollapse.classList.add("show");
                const toggle = parentCollapse.parentElement.children[0];
                toggle.classList.add("active");
                toggle.setAttribute("aria-expanded", "true");
                parentCollapse = parentCollapse.parentElement.closest(".collapse");
            }
        }
    });

    // Scroll ke menu aktif
    setTimeout(function () {
        const activeLink = document.querySelector(".nav-item li a.active");
        if (activeLink) {
            const container = document.querySelector(".main-nav .simplebar-content-wrapper");
            const offsetTop = activeLink.offsetTop - 300;
            if (container && offsetTop > 100) {
                let start = container.scrollTop;
                let change = offsetTop - start;
                let currentTime = 0;
                const duration = 600;

                function animateScroll() {
                    currentTime += 20;
                    const val = easeInOutQuad(currentTime, start, change, duration);
                    container.scrollTop = val;
                    if (currentTime < duration) {
                        setTimeout(animateScroll, 20);
                    }
                }

                function easeInOutQuad(t, b, c, d) {
                    t /= d / 2;
                    if (t < 1) return c / 2 * t * t + b;
                    t--;
                    return -c / 2 * (t * (t - 2) - 1) + b;
                }

                animateScroll();
            }
        }
    }, 200);
};

initVerticalMenu();
