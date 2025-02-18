$(document).ready(function(){
    $(".list-group-item").click(function(){
        $(".list-group-item").removeClass("active"); // Remove active class from all
        $(this).addClass("active"); // Add active class to clicked item
        let url = $(this).data('url');

        $.ajax({
            url: url,
            type: 'GET',
            success: function (response) {
                $('#tab').html(response);
            },
            error: function (xhr, status, error) {
                $('#tab').html('<p class="text-danger">Error loading content.</p>');
            }
        });
    });

    // Handle product form submission
    $(document).on('submit', 'form', function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(),
            success: function (response) {
                alert(response.success);
                $(".list-group-item[data-url='/get-product']").click(); // Reload product tab
            },
            error: function (xhr) {
                alert("Error adding product");
            }
        });
    });
});
    