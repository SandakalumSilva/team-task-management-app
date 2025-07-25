$(document).ready(function () {
    $("#user_table").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/user/getusers",
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false,
            },
            { data: "name", name: "name" },
            { data: "email", name: "email" },
            { data: "role_name", name: "role_name" },
            { data: "team_name", name: "team_name" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });

    $("#add_user_form").on("submit", function (e) {
        e.preventDefault();
        submitAddUserForm($(this));
    });

    $.ajax({
        type: "GET",
        url: "/role/all-roles",
        success: function (response) {
            console.log(response);
            let select = $("#userRole");
            select.empty();
            select.append('<option value="">-- Select Role --</option>');
            $.each(response.roles, function (key, value) {
                select.append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.role_name +
                        "</option>"
                );
            });
        },
    });

    $.ajax({
        type: "GET",
        url: "/team/all-teams",
        success: function (response) {
            let select = $("#userTeam");
            select.empty();
            select.append('<option value="">--Select Team--</option>');
            $.each(response.teams, function (key, value) {
                select.append(
                    '<option value="' +
                        value.id +
                        '">' +
                        value.team_name +
                        "</option>"
                );
            });
        },
    });

    function submitAddUserForm(form) {
        const id = $("#edit_user_id").val();
        const url = id ? "/user/update/" + id : form.attr("action");
        const method = form.attr("method");
        const data = form.serialize();

        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function (response) {
                notyf.success(response.msg);
                form.trigger("reset");
                $("#addUserModal").modal("hide");
                $(".modal-backdrop").remove();
                $("body").removeClass("modal-open");
                $("#user_table").DataTable().ajax.reload();
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                $.each(errors, function (index, value) {
                    notyf.error(value[0]);
                });
            },
        });
    }

    $(document).on("click", ".edit-user", function (e) {
        const id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "/user/edit/" + id,
            success: function (response) {
                $("#edit_user_id").val(response.user.id);
                $("#userName").val(response.user.name);
                $("#userEmail").val(response.user.email);
                $("#userRole").val(response.user.role_id);
                $("#userTeam").val(response.user.team_id);
                $("#addUserLabel").text("Edit User");
                 $("#add_user_form button[type='submit']").text("Update User");
                $("#addUserModal").modal("show");
            },
            error:function(xhr){
                const errors = xhr.responseJSON.errors;
                $.each(errors, function (index, value) {
                    notyf.error(value[0]);
                });
            }
        });
    });

    $(document).on('click', '.delete-user', function (e) {
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
                    url: "/user/delete/" + id,
                    success: function (response) {
                        Swal.fire("Deleted!", response.msg, "success")
                        $("#user_table").DataTable().ajax.reload();
                    },
                    error: function (xhr) { 
                        const errors = xhr.responseJSON.errors;
                        $.each(errors, function (index, value) {
                            notyf.error(value[0]);
                        });
                    }
                });
            }
        }); 
        
    });
});
