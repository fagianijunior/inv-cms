jQuery(document).ready(function($){

    var createTitleElement = true;
    var createResumeElement = true;

    var runTitleWatcher = true;
    var runResumeWatcher = true;

    // Display the number of characters in the title
    function createTitleCount() {
        var title = jQuery(".editor-post-title.editor-post-title__input");
        jQuery(".editor-post-title.editor-post-title__input").after("<div id='title-counter' class='wp-block'><span>Total de caracteres do <b>título</b>:</span> <input type='text' value='0' maxlength='3' size='3' id='title-counter-content' readonly ></div>");
    }
    function titleCountWatcher() {
        let title = jQuery(".editor-post-title.editor-post-title__input");
        jQuery("#title-counter-content").val(title.text().length);
        jQuery(".editor-post-title.editor-post-title__input").keyup( function() {
            title = jQuery(".editor-post-title.editor-post-title__input");
            jQuery("#title-counter-content").val(title.text().length);
        });
    }

    // Display the number of characters in the resume
    function createResumeCount() {
        jQuery(".components-dropdown.editor-post-excerpt__dropdown").parent().after("<div id='resume-counter' class='wp-block'><span>Total de caracteres do <b>resumo</b>:</span> <input type='text' value='0' maxlength='3' size='3' id='resume-counter-content' readonly ></div>");
    }
    function resumeCountWatcher() {
        let resume = jQuery(".editor-post-featured-image + .components-flex.components-h-stack .components-truncate.components-text");
        if (resume.length > 0) {
            jQuery("#resume-counter-content").val(resume.text().length);
        }
    
        jQuery("body").on('change keydown', function () {
            let resumeInput = jQuery(".components-textarea-control__input");
            
            if (resumeInput.length > 0) {
                let resumeUpdated = resumeInput.val();
                jQuery("#resume-counter-content").val(resumeUpdated.length);
            }
    
            if (jQuery('#resume-counter').length <= 0) {
                createResumeCount();
    
                let resumeInputAfterCreate = jQuery(".components-textarea-control__input");
                if (resumeInputAfterCreate.length > 0) {
                    let resumeUpdatedAfterCreate = resumeInputAfterCreate.val();
                    jQuery("#resume-counter-content").val(resumeUpdatedAfterCreate.length);
                }
            }
        });
    }
    


    // Creating a title counter
    function checkCreationTitle() {
        if(createTitleElement) {
            createTitleCount();
            createTitleElement = false;
        }
    }
    function checkTitleWatcher() {
        if(!createTitleElement) {
            titleCountWatcher();
            runTitleWatcher = false;
        }
    }

    // Creating a resume counter
    function checkCreationResume() {
        if(createResumeElement) {
            createResumeCount();
            createResumeElement = false;
        }
    }
    function checkResumeWatcher() {
        if(!createResumeElement) {
            resumeCountWatcher();
            runResumeWatcher = false;
        }
    }

    setTimeout(function () {
        var intervalCounters = window.setInterval(function(){
            checkCreationTitle();
            checkTitleWatcher();
    
            checkCreationResume();
            checkResumeWatcher();
        }, 1000);

        setTimeout(function () {
            clearInterval(intervalCounters);
        }, 2000);

    }, 1000);
    
});