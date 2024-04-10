

var SectionParticles = function($element, $) {
    var elementId = $element.data("id");

    var polygon = {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img\/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}
    var nasa = {"particles":{"number":{"value":160,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img\/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":true,"anim":{"enable":true,"speed":1,"opacity_min":0,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":4,"size_min":0.3,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":1,"direction":"none","random":true,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":600}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"bubble"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":250,"size":0,"duration":2,"opacity":0,"speed":3},"repulse":{"distance":400,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}
    var bubble = {"particles":{"number":{"value":6,"density":{"enable":true,"value_area":800}},"color":{"value":"#1b1e34"},"shape":{"type":"polygon","stroke":{"width":0,"color":"#000"},"polygon":{"nb_sides":6},"image":{"src":"img\/github.svg","width":100,"height":100}},"opacity":{"value":0.3,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":50,"random":false,"anim":{"enable":true,"speed":10,"size_min":40,"sync":false}},"line_linked":{"enable":false,"distance":200,"color":"#ffffff","opacity":1,"width":2},"move":{"enable":true,"speed":8,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"grab"},"onclick":{"enable":false,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}
    var snow = {"particles":{"number":{"value":400,"density":{"enable":true,"value_area":800}},"color":{"value":"#fff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img\/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":10,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":500,"color":"#ffffff","opacity":0.4,"width":2},"move":{"enable":true,"speed":6,"direction":"bottom","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"bubble"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":0.5}},"bubble":{"distance":400,"size":4,"duration":0.3,"opacity":1,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}
    var nyan_cat = {"particles":{"number":{"value":100,"density":{"enable":false,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"star","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"http:\/\/wiki.lexisnexis.com\/academic\/images\/f\/fb\/Itunes_podcast_icon_300.jpg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":4,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":14,"direction":"left","random":false,"straight":true,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"grab"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":200,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}
    
    var particleThemeName = $element.data("exad-preset-theme");
    var particleCustomStyle = $element.data("exad-custom-style");
    var particleThemeSource = $element.data("exad-ptheme-source");
    var particleColor = $element.data('exad-particle-color');
    var particleNumber = $element.data('exad-particle-number');
    var linkLineColor = $element.data('exad-line-link-color');
    var linkLineDistance = $element.data('exad-line-link-distance');
    var particleSize = $element.data('exad-particle-size');
    var moveDirection = $element.data('exad-particle-move-direction');
    var moveSpeed = $element.data('exad-particle-move-speed');
    var interactivityEnableHover = $element.data('exad-particle-interactivity-enable-hover');
    var interactivityEnableClick = $element.data('exad-particle-interactivity-enable-click');
    var interactivityHoverMode = $element.data('exad-particle-interactivity-hover-mode');
    var interactivityClickMode = $element.data('exad-particle-interactivity-click-mode');


        if ("custom" != particleThemeSource || "" != particleThemeSource) {
            
        if ( $element.addClass("exad-particles-section"), elementorFrontend.isEditMode() ) {
            var list;
            var data = {};
            var self = {};
            if (!window.elementor.hasOwnProperty("elements")) {
                return false;
            }
            if (!(list = window.elementor.elements).models) {
                return false;
            }
            $.each(list.models, function(values, settings) {
                if (elementId == settings.id) {
                    data = settings.attributes.settings.attributes;
                    
                } else {
                    if (settings.id == $element.closest(".elementor-top-section").data("id")) {
                    $.each(settings.attributes.elements.models, function(values, objects) {
                        $.each(objects.attributes.elements.models, function(values, media) {
                        data = media.attributes.settings.attributes;
                        });
                    });
                    }
                    
                }
            });
            self.switch = data.exad_particle_switch;
            self.themeSource = data.exad_particle_theme_from;
            self.color = data.exad_particle_color;
            self.number = data.exad_particle_number;
            self.line_linked = data.exad_particle_line_link_color;
            self.line_linked_distance = data.exad_particle_line_link_distance;
            self.size = data.exad_particle_size;
            self.move_direction = data.exad_particle_move_direction;
            self.move_speed = data.exad_particle_moving_speed;
            self.interactivity_enable_hover = data.exad_particle_interactivity_enable_hover;
            self.interactivity_enable_click = data.exad_particle_interactivity_enable_click;
            self.interactivity_hover_mode = data.exad_particle_interactivity_hover_mode;
            self.interactivity_click_mode = data.exad_particle_interactivity_click_mode;
            
            if ("presets" == self.themeSource) {
                self.selected_theme = data.exad_particle_preset_themes;
                
            }
            if ("custom" == self.themeSource && "" !== data.exad_particles_custom_style) {
                self.selected_theme = data.exad_particles_custom_style;
            }
            if (0 !== self.length) {
                self = self;
            }
        } else {
            $(".exad-section-particles-" + elementId).each(function() {
                particleThemeSource = $(this).data("exad-theme-source");

                polygon.particles.color.value = nasa.particles.color.value = bubble.particles.color.value = snow.particles.color.value = nyan_cat.particles.color.value = particleColor;
                polygon.particles.number.value = nasa.particles.number.value = bubble.particles.number.value = snow.particles.number.value = nyan_cat.particles.number.value = particleNumber;
                polygon.particles.line_linked.color = nasa.particles.line_linked.color = bubble.particles.line_linked.color = snow.particles.line_linked.color = nyan_cat.particles.line_linked.color = linkLineColor;
                polygon.particles.line_linked.distance = nasa.particles.line_linked.distance = bubble.particles.line_linked.distance = snow.particles.line_linked.distance = nyan_cat.particles.line_linked.distance = linkLineDistance;
                polygon.particles.size.value = nasa.particles.size.value = bubble.particles.size.value = snow.particles.size.value = nyan_cat.particles.size.value = particleSize;
                polygon.particles.move.direction = nasa.particles.move.direction = bubble.particles.move.direction = snow.particles.move.direction = nyan_cat.particles.move.direction = moveDirection;
                polygon.particles.move.speed = nasa.particles.move.speed = bubble.particles.move.speed = snow.particles.move.speed = nyan_cat.particles.move.speed = moveSpeed;
                polygon.interactivity.events.onhover.enable = nasa.interactivity.events.onhover.enable = bubble.interactivity.events.onhover.enable = snow.interactivity.events.onhover.enable = nyan_cat.interactivity.events.onhover.enable = interactivityEnableHover;
                polygon.interactivity.events.onclick.enable = nasa.interactivity.events.onclick.enable = bubble.interactivity.events.onclick.enable = snow.interactivity.events.onclick.enable = nyan_cat.interactivity.events.onclick.enable = interactivityEnableClick;
                polygon.interactivity.events.onhover.mode = nasa.interactivity.events.onhover.mode = bubble.interactivity.events.onhover.mode = snow.interactivity.events.onhover.mode = nyan_cat.interactivity.events.onhover.mode = interactivityHoverMode;
                polygon.interactivity.events.onclick.mode = nasa.interactivity.events.onclick.mode = bubble.interactivity.events.onclick.mode = snow.interactivity.events.onclick.mode = nyan_cat.interactivity.events.onclick.mode = interactivityClickMode;
                
                var themes = "presets" == particleThemeSource ? particleThemeName : "" != particleCustomStyle ? particleCustomStyle : void 0;
                var particleParentId = $(this).attr("id");
                if (null == particleParentId) {
                    $(this).attr("id", "exad-section-particles-" + elementId);
                    particleParentId = $(this).attr("id");
                }
                
                particlesJS(particleParentId, eval(themes));
            });
        }
        if (!elementorFrontend.isEditMode() || !self) {
            return false;
        }
        if ( "yes" == self.switch ) {
            if ( ("presets" === self.themeSource || "custom" === self.themeSource && "" !== self.selected_theme) && "undefined" != typeof particlesJS && $.isFunction(particlesJS) ) {
                $element.attr("id", "exad-section-particles-" + elementId);
                polygon.particles.color.value = nasa.particles.color.value = bubble.particles.color.value = snow.particles.color.value = nyan_cat.particles.color.value = self.color;
                polygon.particles.number.value = nasa.particles.number.value = bubble.particles.number.value = snow.particles.number.value = nyan_cat.particles.number.value = self.number;
                polygon.particles.line_linked.color = nasa.particles.line_linked.color = bubble.particles.line_linked.color = snow.particles.line_linked.color = nyan_cat.particles.line_linked.color = self.line_linked;
                polygon.particles.line_linked.distance = nasa.particles.line_linked.distance = bubble.particles.line_linked.distance = snow.particles.line_linked.distance = nyan_cat.particles.line_linked.distance = self.line_linked_distance;
                polygon.particles.size.value = nasa.particles.size.value = bubble.particles.size.value = snow.particles.size.value = nyan_cat.particles.size.value = self.size;
                polygon.particles.move.direction = nasa.particles.move.direction = bubble.particles.move.direction = snow.particles.move.direction = nyan_cat.particles.move.direction = self.move_direction;
                polygon.particles.move.speed = nasa.particles.move.speed = bubble.particles.move.speed = snow.particles.move.speed = nyan_cat.particles.move.speed = self.move_speed;
                polygon.interactivity.events.onhover.enable = nasa.interactivity.events.onhover.enable = bubble.interactivity.events.onhover.enable = snow.interactivity.events.onhover.enable = nyan_cat.interactivity.events.onhover.enable = self.interactivity_enable_hover;
                polygon.interactivity.events.onclick.enable = nasa.interactivity.events.onclick.enable = bubble.interactivity.events.onclick.enable = snow.interactivity.events.onclick.enable = nyan_cat.interactivity.events.onclick.enable = self.interactivity_enable_click;
                polygon.interactivity.events.onhover.mode = nasa.interactivity.events.onhover.mode = bubble.interactivity.events.onhover.mode = snow.interactivity.events.onhover.mode = nyan_cat.interactivity.events.onhover.mode = self.interactivity_hover_mode;
                polygon.interactivity.events.onclick.mode = nasa.interactivity.events.onclick.mode = bubble.interactivity.events.onclick.mode = snow.interactivity.events.onclick.mode = nyan_cat.interactivity.events.onclick.mode = self.interactivity_click_mode;
                
                particlesJS("exad-section-particles-" + elementId, eval(self.selected_theme));
                $element.children("canvas.particles-js-canvas-el").css({
                    position : "absolute",
                    top : 0
                });
            }
        } else {
            $element.removeClass("exad-particles-section");
        }
    }
};

/* Section Particles End here */

