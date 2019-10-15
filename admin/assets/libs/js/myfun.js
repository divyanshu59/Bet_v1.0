$(document).ready(function () {
    $("#sportDropdownSelect").change(function () {
        var id = $(this).val();
        console.log(id);

        $.ajax({
            type: 'POST',
            url: '../../assets/import/myfun.php',
            data: {
                'id': id
            },
            success: function (data) {
                $("#SelectTeam1").html(data);
                $("#SelectTeam2").html(data);
                console.log(data);
            }
        });


    });
});