$(document).ready(function(){
    $('input[name="category"]').click(function(){
        // Get an array of all the checked categories
        var categories = $('input[name="category"]:checked').map(function(){
            return '.' + $(this).val();
        }).get();
        
        // If no checkboxes are checked, show all rows
        if (categories.length == 0) {
            $('.row').show();
        }
        else {
            // Hide all rows, then show only the rows with the selected categories
            $('.row').hide();
            $(categories.join(',')).show();
        }
    });
});
