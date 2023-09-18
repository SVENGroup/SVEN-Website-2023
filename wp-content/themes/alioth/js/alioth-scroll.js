        elementorFrontend.hooks.addAction('elementor/frontend/init', function () {
            ScrollSmoother.create({
                wrapper: "#smooth-wrapper",
                content: "#smooth-content",
                smooth: 1,
                normalizeScroll: true, // prevents address bar from showing/hiding on most devices, solves various other browser inconsistencies
                ignoreMobileResize: true, // skips ScrollTrigger.refresh() on mobile resizes from address bar showing/hiding
                effects: false,
                preventDefault: true
            });



        });
