$(document).ready(function () {
    $("#team_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/team/getteams",
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "team_name", name: "team_name" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    $("#add_team_form").on("submit", function (e) {
        e.preventDefault();
        submitAddTeamForm($(this));
    });

    function submitAddTeamForm(form) {
        const id = $("#edit_team_id").val();

        const url = id ? "/team/update/" + id : form.attr("action");
        const method = form.attr("method");
        const data = form.serialize();

        const submitBtn = form.find('button[type="submit"]');
        submitBtn.prop("disabled", true);

        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function (response) {
                notyf.success(response.msg);
                form.trigger("reset");
                $("#addTeamModal").modal("hide");
                $(".modal-backdrop").remove();
                $("body").removeClass("modal-open");
                $("#team_table").DataTable().ajax.reload();
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function (index, value) {
                    notyf.error(value[0]);
                });
            },
            complete: function () {
                submitBtn.prop("disabled", false);
            },
        });
    }

    $(document).on("click", ".edit-team", function (e) {
        const id = $(this).data("id");

        $.ajax({
            url: "/team/edit/" + id,
            method: "GET",
            success: function (response) {
                $("#edit_team_id").val(response.team.id);
                $("#teamName").val(response.team.team_name);
                $("#addTeamModalLabel").text("Edit Team");
                $("#add_team_form button[type='submit']").text("Update Team");
                $("#addTeamModal").modal("show");
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function (index, value) {
                    notyf.error(value[0]);
                });
            },
        });
    });

    $(document).on("click", ".delete-team", function (e) {
        const id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "/team/delete/" + id,
                    success: function (response) {
                        Swal.fire("Deleted!", response.msg, "success");
                        $("#team_table").DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function (index, value) {
                            notyf.error(value[0]);
                        });
                    },
                });
            }
        });
    });
});
