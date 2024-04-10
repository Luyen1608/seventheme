// Parallax Effect Script Start
var ExadParallaxEffect = function($scope, $) {

    var isParallaxEffect = $scope.hasClass("exad-parallax-effect-yes");
    var parallaxType = $scope.data("parallax_type")
    var elementId = $scope.data("id");

    $(".exad-parallax-scene").each(function () {
        try {
            var elem = $(this).next(".exad-parallax-effect-yes")[0];
            $(this).prependTo(elem);
        } catch (e) {
            
        }
    });

    if ( isParallaxEffect ) {

        if ( elementorFrontend.isEditMode() ) {
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
                    if (settings.id == $scope.closest(".elementor-top-section").data("id")) {
                    $.each(settings.attributes.elements.models, function(values, objects) {
                        $.each(objects.attributes.elements.models, function(values, media) {
                        data = media.attributes.settings.attributes;
                        });
                    });
                    }
                    
                }
            });
            self.id = elementId;
            self.switch = data.exad_enable_section_parallax_effect;
            self.parallax_type = data.exad_parallax_effect_type;
            self.data_bg_image = data.exad_parallax_effect_background_image.url;
            
            if (0 !== self.length) {
                self = self;
            }

        } else {
            
            if ( 'multi-image' == parallaxType ) {
                $( "#exad-parallax-scene-" + elementId ).each(function() {
                    var id = $(this).attr('id');
                    var scene = document.getElementById(id);
                    new Parallax( scene, {
                        relativeInput: true,
                        hoverOnly: true,
                        pointerEvents: true
                    });
                });
            }
        }

        if (!elementorFrontend.isEditMode() || !self) {
            return false;
        }

        if ( 'yes' == self.switch ) {
            if ( 'background' == self.parallax_type ) {
                $( "#exad-parallax-scene-" + self.id ).each(function() {
                    $(this).parallax({imageSrc: self.data_bg_image });
                }); 
            } else if ( 'multi-image' == self.parallax_type ) {
                $( "#exad-parallax-scene-" + self.id ).each(function() {
                    
                    var id = $(this).attr('id');
                    var scene = document.getElementById(id);
                    new Parallax( scene, {
                        relativeInput: true,
                        hoverOnly: true,
                        pointerEvents: true
                    });
                });
            }
        }
    }

};
// Parallax Effect Script End
