jQuery(document).ready(function($){
    var delayTimer;
    
    function performSearch() {
        clearTimeout(delayTimer);
        
        var searchTerm = $("#search-posts").val().toLowerCase();
        $("#loading-spinner").show();
        $(".guias-list").css("opacity", "0.5");

        delayTimer = setTimeout(function() {
            $("#loading-spinner").hide();
            $(".guias-list").css("opacity", "1");

            var resultsFound = false;
            $(".guia").each(function() {
                var postTitle = $(this).text().toLowerCase();

                if (postTitle.indexOf(searchTerm) !== -1) {
                    $(this).show();
                    resultsFound = true;
                } else {
                    $(this).hide();
                }
            });

            // Format search result
            if(searchTerm != "") {
                $(".letter-group-wrap").addClass("result");
                $(".search-input").addClass("filled");
                $(".clear-form").show();
            } else {
                $(".letter-group-wrap").removeClass("result");
                $(".search-input").removeClass("filled");
                $(".clear-form").hide();
            }

            // Show posts not found message
            if (!resultsFound) {
                $(".no-results-message").show();
            } else {
                $(".no-results-message").hide();
            }

            // Hide non correspondent posts
            $("h2 + .guias-list").each(function() {
                var $h2 = $(this).prev("h2");
                var hasVisibleItems = $(this).find("li:visible").length > 0;
                if (hasVisibleItems) {
                    $h2.show();
                } else {
                    $h2.hide();
                }
            });

            markLastVisible();

        }, 400);

    }
    
    function markLastVisible() {
        // Select all '.guias-list' lists
        const listas = document.querySelectorAll(".guias-list");
        listas.forEach((lista, index) => {
            // Remove 'ultimo-visivel' class from all items in this list
            lista.querySelectorAll(".guia.ultimo-visivel").forEach(el => {
                el.classList.remove("ultimo-visivel");
            });
    
            // Get visible '.guia' items (not 'display: none')
            const visiveis = Array.from(lista.querySelectorAll(".guia")).filter(el => {
                return window.getComputedStyle(el).display !== "none";
            });
    
            // Add 'ultimo-visivel' to the last visible item if not the last list
            if (visiveis.length > 0 && index !== listas.length - 1) {
                visiveis[visiveis.length - 1].classList.add("ultimo-visivel");
            }
        });
    }
    markLastVisible();

    $(".clear-form").on("click", function(e) {
        e.preventDefault();
        $('#search-posts').val("");
        performSearch();
    });

    $("#search-posts").on("keydown", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();
            performSearch();
        }
    });

    $(".search-button").on("click", function(e) {
        e.preventDefault();
        performSearch();
    });
});
