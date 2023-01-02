/** 
 * Etapas scripts
 * 
 * @author Estevão Rolim <ETVO@github.com>
 */

(jQuery)(
    function ($) {

        /**
         * @since 2.0
         */
        function generateEtapas() {
            $(".etapas").each(function() {

                var $items = $(this).find(".etapa-item");
                var etapasId = $(this).attr("id");
                let delay = $('#' + etapasId).attr('data-delay') ?? 700;

                try {
                    var $prev = $('.etapas-control-prev[data-target="#' + etapasId + '"]');
                    var $next = $('.etapas-control-next[data-target="#' + etapasId + '"]');
                    
                    if ($items.length <= 1) {
                        if($prev) $prev.hide();
                        if($next) $next.hide();
                    }
                    else {
                        $prev.attr('disabled', true);
                    }
                }
                catch (e) {
                    console.error(e);
                }

                for (var i = 0; i < $items.length; i++) {

                    // Get item
                    var item = $items[i];
                    // Check if it is the first one
                    var isFirst = i == 0;

                    $(item).removeClass('active');
                    if(isFirst) $(item).addClass('active');
                    $(item).animate({
                        'margin-left': '0px'
                    }, delay);

                    // Add active class to item if it is the first one
                    $(item).attr('data-target', '#' + etapasId);
                    $(item).attr('data-index', i);
                }

                $(this).attr('data-items', $items.length);
            })
        }

        /**
         * On click prev button
         */
        $('.etapas-control-prev').on('click', function() {
            let targetId = $(this).attr('data-target');
            let $etapa = $(targetId);
            let delay = $etapa.attr('data-delay') ?? 700;

            var items = $(".etapa-item[data-target='" + targetId + "']");
            
            // Get active item
            var $activeItem = $(".etapa-item.active[data-target='" + targetId + "']");
            
            // Does not work if it is last element
            if($activeItem.attr('data-index') == 0) return;
            
            // Add 'active' class to new item and remove from the previously active one
            $newItem = $activeItem.prev('.etapa-item');
            
            // Animate previous item back to its place
            newItemWidth = $newItem.width();
            $newItem.animate({
                'margin-left': '0px'
            }, delay);

            $newItem.addClass('active');
            $activeItem.removeClass('active');

            // Update buttons
            updateEtapaButtons(targetId, $newItem.attr('data-index'), items.length);
        });
    
        /**
         * On click next button
         */
        $('.etapas-control-next').on('click', function() {
            let targetId = $(this).attr('data-target');
            let $etapa = $(targetId);
            let delay = $etapa.attr('data-delay') ?? 700;

            var items = $(".etapa-item[data-target='" + targetId + "']");
            
            // Get active item
            var $activeItem = $(".etapa-item.active[data-target='" + targetId + "']");
            
            // Add 'active' class to new item and remove from the previously active one
            var $newItem = $activeItem.next('.etapa-item');
            newIndex = 0;

            // Does not work if it is last element
            if($activeItem.attr('data-index') == items.length - 1) {
                for(i = 0; i < items.length; i++) {
                    var item = items[i];
                    if(i == 0) $(item).addClass('active');
                    else $(item).removeClass('active');
                    
                    $(item).animate({
                        'margin-left': '0px'
                    }, delay);
                }
            } else {
                // Animate active item to the left
                activeItemWidth = $activeItem.width();
                $activeItem.animate({
                    'margin-left': '-' + activeItemWidth + 'px'
                }, delay);
    
                $newItem.addClass('active');
                $activeItem.removeClass('active');
                newIndex = $newItem.attr('data-index');
            }
            

            // Update buttons
            updateEtapaButtons(targetId, newIndex, items.length);
        });

        /**
         * Disable previous button if first element is active 
         * Disable next button if last element is active 
         * 
         * @param {string} targetId 
         * @param {string, int} index 
         * @param {int} length 
         */
        function updateEtapaButtons(targetId, index, length) {
            if(targetId[0] != '#') targetId = '#' + targetId;

            var $prev = $('.etapas-control-prev[data-target="' + targetId + '"]');
            var $next = $('.etapas-control-next[data-target="' + targetId + '"]');
            
            $prev.removeAttr('disabled');
            $next.removeAttr('disabled');

            if(index == 0) {
                $prev.attr('disabled', true);
            }
        }

        /**
         * Invocate functions when document.body is ready 
         */
        $(document.body).ready(function () {
            generateEtapas();
            
        });
        
        /**
         * Invocate functions when window is resized 
         */
        $(window).on('resize',function() {
            generateEtapas();
        });
    }
)