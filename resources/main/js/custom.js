function customAjaxCall({url, method = "GET", data = ""}, cb='', errCb='', bsCb='') {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    })

    xhr = $.ajax({
        url: url,
        method: method,
        data: data,
        success: function(response) {
            if (typeof cb !== "string") {
                cb(response);
            }
        },
        error: function(error) {
            if (typeof errCb !== "string") {
                errCb(error);
            }
        },
        beforeSend: function() {
            if (typeof bsCb !== "string") {
                bsCb();
            }
        }
    });
}


function modalLauncher({url, method = 'GET', data = ''}, cb='', closeCb='') {
    url = url;
    data = data;
    xhr = $.ajax({
        url: url,
        method: method ? method : 'get',
        data: data,
        success: function (response) {
            var mdl = `<div id="cModal" role="dialog" class="modal fade colored-header colored-header-primary">
                            <div class="modal-dialog" style="width:100%">
                                <div class="modal-content" role="document"></div>
                            </div>`;
            $('#modal').append(mdl);

            $('#cModal .modal-content').html(response);

            $('body #cModal').modal({backdrop: 'static', keyboard: false}).modal('show');
            if (cb && typeof cb === "function") {
                cb(res);
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
    $('body').on('hide.bs.modal', "#cModal", function () {
        $(this).remove();
        if (closeCb && typeof closeCb === "function") {
            closeCb();
        }
    });
}


$(document).on('click', '.md-close', function (e) {
    $('#cModal').modal('hide')
});
