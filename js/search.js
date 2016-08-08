   






   $( document ).ready(function() {


// Submit the form
// Variable to hold request
var request;

// Bind to the submit event of our form
$("#eventForm").submit(function(event){

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.

    // $inputs.prop("disabled", true);




    var formData = new FormData(this);
    // formData.append( 'skillsRequired', $('input[name=skillsRequired]').val());
    // formData.append( 'languages', $('input[name=languages]').val());

// $('#info').html(formData);



$('#loading').show();

    // Fire off the request to /form.php
    request = $.ajax({
        url: "search.php",
        type: "post",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(result){
        $('#loading').hide();
         $('#info').html(result);


        var list = $('#languagesSelected li').map(function(){ return $(this).text(); });

        console.log(list[1]);

    }
    });





    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});

});