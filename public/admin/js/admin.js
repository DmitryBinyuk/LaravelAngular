//For user delete popup
(function () {
    $('.deleteUser').click(function () {
        window.userIdForDelete = $(this).data("id");
    });

    $('.clearUserForDelete').click(function () {
        delete window.userIdForDelete;
    });

    $('.userDeleteConfirm').click(function () {
        $.ajax({
            url: '/admin/users/' + window.userIdForDelete,
            type: 'DELETE',
            success: callback || $.noop,
            error: errorCallback || $.noop
        });
    });
})();