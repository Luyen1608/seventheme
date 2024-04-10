$(window).on('elementor/frontend/init', function () {
    if( elementorFrontend.isEditMode() ) {
        editMode = true;
    }
    
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-chart.default', exclusiveChart );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-cookie-consent.default', widgetCookieConsent );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-counter.default', exclusiveCounterUp );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-image-hotspot.default', exclusiveImageHotspot );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-instagram-feed.default', exclusiveInstagramCarousel );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-news-ticker-pro.default', exclusiveNewsTickerPRO );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-post-carousel.default', exclusivePostCarousel );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-exclusive-slider.default', exclusiveSlider );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-post-slider.default', exclusivePostSlider );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-table.default', exclusiveTable );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-team-carousel.default', exclusiveTeamCarousel );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-testimonial-carousel.default', exclusiveTestimonialCarousel );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-source-code.default', exclusiveSourceCode );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-woo-category.default', exclusiveProductCat );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-mailchimp.default', exadMailChimp );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-promo-box.default', exadMailChimp );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-promo-box.default', exadPromoBoxCountdownTimer );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-promo-box.default', exadPromoBoxAlert );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-content-switcher.default', exclusiveContentSwitcher );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-offcanvas.default', exclusiveOffCanvas );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-image-carousel.default', exclusiveImageCarousel );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-demo-previewer.default', exclusiveDemoPreviewer );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-gravity-form.default', ExadGravityForm );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-blob-maker.default', exclusiveBlob );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-navigation-menu.default', exclusiveNavMenu );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-search-form.default', exclusiveSearchForm );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-mega-menu.default', MegaMenu );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-woo-add-to-cart.default', exadWooAddToCart );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-lottie-animation.default', exadLottieAnimation );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-woo-cart.default', exadWooCart );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/section', SectionParticles);
    elementorFrontend.hooks.addAction( 'frontend/element_ready/section', ExadParallaxEffect);
    elementorFrontend.hooks.addAction( 'frontend/element_ready/exad-woo-product-carousel.default', exclusiveProductCarousel);
} );

}(jQuery));