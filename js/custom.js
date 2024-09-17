$(document).ready(function () {
    $(function () {
        console.log('Worked');
        $("#playlist li").on("click", function () {
            $("#videoarea").attr({
                src: $(this).attr("movieurl")
            });
            
            document.getElementById("videotitle").innerHTML = $(this).attr("vidname");
        });

        $("#videoarea").attr({
            src: $("#playlist li").eq(0).attr("movieurl"),
        });
        
        document.getElementById("videotitle").innerHTML = $("#playlist li").eq(0).attr("vidname");
    });
});
