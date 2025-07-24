$(document).ready(function () {
    $("#role_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/role/getroles",
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "role_name", name: "role_name" },
            { data: "created_at", name: "created_at" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    $("#add_role_form").on("submit", function (e) {
        e.preventDefault();
        submitAddRoleForm($(this));
    });

    $("#addRoleModal").on("hidden.bs.modal", function () {
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
    });

    $("#addRoleModal").on("show.bs.modal", function () {
        $("#add_role_form").trigger("reset");
    });

    function submitAddRoleForm(form) {
        const id = $("#edit_role_id").val();
        const url = id ? "/role/update/" + id : form.attr("action");
        const method = form.attr("method");
        const data = form.serialize();
        const submitBtn = form.find('button[type="submit"]');
        submitBtn.prop("disabled", true);

        $.ajax({
            url: url,
            method: method,
            data: data,
            success: function (response) {
                notyf.success(response.msg);
                form.trigger("reset");
                $("#addRoleModal").modal("hide");
                $("#role_table").DataTable().ajax.reload();
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

    $(document).on("click", ".edit-role", function (e) {
        const id = $(this).data("id");

        $.ajax({
            url: "/role/edit/" + id,
            method: "GET",
            success: function (response) {
                $("#addRoleModal")
                    .off("shown.bs.modal")
                    .on("shown.bs.modal", function () {
                        $("#edit_role_id").val(response.role.id);
                        $("#roleName").val(response.role.role_name);
                        $("#addRoleModalLabel").text("Edit Role");
                        $("#add_role_form button[type='submit']").text(
                            "Update Role"
                        );
                    });

                $("#addRoleModal").modal("show");
            },
        });
    });

   $(document).on("click", ".delete-role", function (e) {
    e.preventDefault();
    const id = $(this).data("id");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "/role/delete/" + id,
                success: function (response) {
                    Swal.fire("Deleted!", response.msg, "success");
                    $("#role_table").DataTable().ajax.reload();
                },
                error: function (xhr) {
                    Swal.fire("Error", "Something went wrong!", "error");
                }
            });
        }
    });
});

});
